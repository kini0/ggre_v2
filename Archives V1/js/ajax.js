function dept(){
    var dpt=$('#departement').attr('value');
	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {dpt:dpt},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function code_postal(){
    var dpt=$('#code_postal').attr('value');
	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {dpt:dpt},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function region(select,nomname,reg){
	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {reg:reg},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function rechercheNom(){
    var name=$('#listeNoms').attr('value');
	$.ajax({
	  url: "/listeAnnuaire.php",
	  data: {name:name},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#resultatRecherche').html(data);
	   }
  });
}

function infosLightBox(id){
	$.ajax({
	  url: "/infosAnnuaire.php",
	  data: {id:id},
	  type: 'post',
	  dataType:'html',
	  success:function(data){
		$('#lightbox-content').html(data);
		afficheLightbox();
	   }
  });
}