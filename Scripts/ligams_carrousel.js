var ligams = {};

var Carrousel_Settings = 
{
	radiusX : 300,
	radiusY : 10,
	centerX : 300,
	centerY : 50,
	minScale : 0.20,
	speed : 0.01,
	perspective : 20,
	thumbWidth : 200,
	thumbHeight : 200,
	interval : 50
};

ligams.carrousel = function(idElem)
{
	this.el = document.getElementById(idElem);
	this.items = this.getItems();
	this.itemWidth = this.items[0].style.width;
	this.itemHeight = this.items[0].style.height;
	this.angles = new Array();
	this.images = new Array();
	this.timer;
	this.timerName = "moving";
	this.initItems();
}

ligams.carrousel.prototype =
{
    initItems:function()
    {
		var angles = new Array();
        for(var i=0;i<this.items.length;i++)
		{
			
			var item = this.items[i];
			var angle = i * ((Math.PI * 2) / this.items.length);
			this.angles.push(angle);
			var left = Math.cos(angle) * Carrousel_Settings.radiusX + Carrousel_Settings.centerX;
			var top = Math.sin(angle) * Carrousel_Settings.radiusY + Carrousel_Settings.centerY;
			item.style.left = left+'px';
			item.style.top = top+'px';
			
			var scale = (top - Carrousel_Settings.perspective) / (Carrousel_Settings.centerY + Carrousel_Settings.radiusY - Carrousel_Settings.perspective);
			
			var img = item.getElementsByTagName('img')[0];
			img.style.width = (Carrousel_Settings.thumbWidth*scale)+'px';
			img.style.height = (Carrousel_Settings.thumbHeight*scale)+'px';
			this.images.push(img);
		}
		this.launch();
	},
	getItems : function()
	{
		var t = new Array();
		var nodes = this.el.childNodes;
		for(var i=0;i<nodes.length;i++)
		{
			if(nodes[i].nodeName && nodes[i].nodeName.toLowerCase()=='div' && nodes[i].className=='Carrousel_ligams_item')
				t.push(nodes[i])
		}
		return t;
	},
	moveItems : function(evt)
	{
		if(evt==undefined || evt==null)
			evt = ligams.timer.instance.objects.moving.params;
		
		var str = ";";
		for(var i=0;i<evt.items.length;i++)
		{
			var item = evt.items[i];
			evt.angles[i] = evt.angles[i] + Carrousel_Settings.speed;
			var angle = evt.angles[i];
			
			var left = Math.cos(angle) * Carrousel_Settings.radiusX + Carrousel_Settings.centerX;
			var top = Math.sin(angle) * Carrousel_Settings.radiusY + Carrousel_Settings.centerY;
			
			item.style.left = left+'px';
			item.style.top = top+'px';
			
			var scale1 = (top - Carrousel_Settings.perspective) / (Carrousel_Settings.centerY + Carrousel_Settings.radiusY - Carrousel_Settings.perspective);
			var scale = Math.max(scale1,Carrousel_Settings.minScale);
			
			var img = evt.images[i];
			var h = Math.round(Carrousel_Settings.thumbHeight*scale);
			img.style.width = Math.round(Carrousel_Settings.thumbWidth*scale)+'px';
			img.style.height = h+'px';
			evt.items[i].style.zIndex = h*1000;
			str += h + ";";
		}
		//alert(str);
		
	},
	launch : function()
	{
		this.timer = new ligams.timer();
		this.timer.setTimer(this.timerName,this.moveItems,Carrousel_Settings.interval,this,this);
	}
};
ligams.timer = function()
{
	this.objects = new Object();
	ligams.timer.instance = this;		
}

ligams.timer.prototype = 
{
	setTimer : function(_name,_delegate,_duration,_object,_params)
	{
		if(_params==null) this.params = new Array();
		else this.params = _params;
		this.objects[_name] = {};
		this.objects[_name].params = this.params;
		var id = setInterval(_delegate,_duration,_object);
		this.objects[_name].id = id;
	},
	killTimer : function(_name)
	{
		clearInterval(this.objects[_name].id);
	}
}