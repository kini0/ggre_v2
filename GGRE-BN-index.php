<?php
  session_start();

  if(empty($_SESSION['user'])) {
    header('location: GGRE-connect-BN.php'); exit;
  }
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" type="image/x-icon" href="images/ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/ggre-favicon.ico" /><![endif]-->
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design_BN.css" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<title>Extranet B.N. G.G.R.E</title>
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Scripts/script.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="css/jquery.lightbox-0.5.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
	
<script type="text/javascript">
	function goto(id, t){	
	//animate to the div id.
	$(".contentbox-wrapper").animate({"left": -($(id).position().left)}, 700);
	
	// remove "active" class from all links inside #nav
    $('#nav a').removeClass('active');
	
	// add active class to the current link
    $(t).addClass('active');	
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
	
<style type="text/css">
<!--
html { overflow: hidden; } 
body {
		background-color: #fff; 
        margin:0; 
        padding:0; 
        background: url(images/GGRE-V2-fond5b.jpg) no-repeat center center fixed;
        -webkit-background-size: cover; 
        -moz-background-size: cover; 
        -o-background-size: cover; 
        background-size: cover; 
}

#logo {
	position: absolute;
	left: 20px;
	width: 130px;
	height: 150px;
	z-index: 1100;
	top: 20px;
}
	
a:active {
	text-decoration: none;
}
	
#Titre table {
    border: 1px solid #ddd;
	border-radius: 3px;
    width: 720px;
	text-align: right;
}
#Titre tr, #Titre th, #Titre td {
   padding: 1px;
}

#Contenu {
	position: relative;
	width: 690px;
	height: 360px;
	z-index: 1013;
	left: 0px;
	top: 0px;
}
	
#Contenu table {
    border-collapse: collapse;
    width: 100%;
	padding: 6px;
}

#Contenu td {
    text-align: left;
    background-color: #fff;
    color: black;
}
	
#Contenu tr, #Contenu td {
   padding: 5px;
   border-bottom: 1px solid #ddd;
}
	
#Contenu th {
	padding: 5px;
    text-align: left;
    background-color: #233087;
    color: white;
}
	
#Contenu tr:hover {background-color:#ccc;}
#Contenu td:hover {background-color:#ccc;}

	
#content{
	position: absolute;
	width: 700px;
	height: 500px;
	z-index: 1024;
	left: 160px;
	top: 210px;
	overflow: hidden;
}
 
.contentbox-wrapper{
	position:relative;
	left:0;
	width:5000px;
	height:100%;
}
 
.contentbox{
    width:705px;
    height:500px;
    float:left;
    padding:10px;
}
-->
</style>
</head>

<body>
<div id="Layer_global" style="position:relative; margin: 0 auto; width:900px; height:800px;">
  <div id="Tete_BN">
	<div id="logo"><a href="GGRE-connect-BN.php"><img src="images/GGRE-V2-logo.png" width="130" title="retour accueil" /></a></div>
	  <div id="Titre"><span class="Style300">Extranet Membres Bureau National GGRE</span><br />
	<table>
      <tr>
        <td width="110" align="left">Bienvenue :</td>
        <td align="left"><strong>Membres du Bureau</strong></td>
      </tr>
    </table>
    <br />
		<a class="active" href="#" onClick="goto('#mur', this); return false"><button class="buttonNav1">Mur</button></a> 
		<a class="active" href="#" onClick="goto('#inscriptions', this); return false"><button class="buttonNav1">Demandes Inscriptions</button></a>
	    <a class="active" href="#" onClick="goto('#general', this); return false"><button class="buttonNav1">Général</button></a>
	    <a class="active" href="#" onClick="goto('#docs', this); return false"><button class="buttonNav1">Documents Stagiaires</button></a>
	    <a class="active" href="#" onClick="goto('#prises', this); return false"><button class="buttonNav1">Prises en charge</button></a>
		<a class="active" href="#" onClick="goto('#notes', this); return false"><button class="buttonNav1">Notes</button></a>
		

	  </div>
  </div>
	
<div id="Bt_fonction">
	<button class="buttonNav2" onclick="document.getElementById('depot').style.display='block'"><i class="fas fa-download"></i><br />Déposer<br />un document</button><br />
	<button class="buttonNav2" onclick="document.getElementById('modif').style.display='block'"><i class="fas fa-edit"></i><br />Modifier<br />un document</button><br />
	<button class="buttonNav2" onclick="document.getElementById('supprim').style.display='block'"><i class="fas fa-eraser"></i><br />Supprimer<br />un document</button>
	
	<form id="depot" class="w3-modal" method="post" enctype="multipart/form-data">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-padding-large" style="background-color: #f59331; color: white"> 
        <span onclick="document.getElementById('depot').style.display='none'"class="w3-button w3-display-topright">&times;</span>
        <span class="Style400"><i class="fas fa-download"></i> Déposer un document</span> 
      </header>
      <div class="w3-container w3-padding-large">
        <span class="Style25"> Sélectionner la rubrique de votre choix avant de télécharger votre document :</span>
        <div class="w3-row w3-border-bottom">
          <div class="w3-col w3-container" style="width:21%"><p><label><input class="w3-radio" type="radio" name="type" value="inscript" required><strong>Inscriptions</strong></label></p></div>
          <div class="w3-col w3-container" style="width:17%"><p><label><input class="w3-radio" type="radio" name="type" value="general" required><strong>Général</strong></label></p></div>
          <div class="w3-col w3-container" style="width:23%"><p><label><input class="w3-radio" type="radio" name="type" value="doc_stage" required><strong>Docs Stagiaire</strong></label></p></div>
          <div class="w3-col w3-container" style="width:24%"><p><label><input class="w3-radio" type="radio" name="type" value="charge" required><strong>Prise en charge</strong></label></p></div>
          <div class="w3-col w3-container" style="width:15%"><p><label><input class="w3-radio" type="radio" name="type" value="notes" required><strong>Notes</strong></label></p></div>
        </div><br /><br />
        
        <div class="w3-row-padding">
          <div class="w3-third"><label>Nom du document</label><input class="w3-input w3-border" name="nom" type="text" placeholder="Document" required></div>
          <div class="w3-third"><label>Nom de l'auteur</label><input class="w3-input w3-border" name="auteur" type="text" placeholder="Auteur" required></div>
          <div class="w3-third"><label>Télécharger le document</label><input class="w3-input w3-border" name="fichier" type="file" placeholder="Téléchargement..." required></div>
        </div><br /><br />
        
      </div>
      <footer class="w3-container w3-padding" style="background-color: #233087; color: white; text-align: right">
        <button class="buttonNav3" type="submit"><i class="fas fa-save"></i> Enregistrer</button>
      </footer>
    </div>
  </form>
	
	
	<form id="modif" class="w3-modal" method="post"  enctype="multipart/form-data">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-padding-large" style="background-color: #f59331; color: white"> 
        <span onclick="document.getElementById('modif').style.display='none'"class="w3-button w3-display-topright">&times;</span>
        <span class="Style400"><i class="fas fa-edit"></i> Modifier un document</span> </header>
      <div class="w3-container w3-padding-large">
		 <span class="Style25"> Sélectionner la rubrique de votre choix pour trouver le document à modifier :</span>
<div class="w3-row w3-border-bottom">
  <div class="w3-col w3-container" style="width:21%"><p><label><input v-model="modifType" class="w3-radio" type="radio" name="type_modif" value="inscript" required><strong>Inscriptions</strong></label></p></div>
  <div class="w3-col w3-container" style="width:17%"><p><label><input v-model="modifType" class="w3-radio" type="radio" name="type_modif" value="general" required><strong>Général</strong></label></p></div>
  <div class="w3-col w3-container" style="width:23%"><p><label><input v-model="modifType" class="w3-radio" type="radio" name="type_modif" value="doc_stage" required><strong>Docs Stagiaire</strong></label></p></div>
  <div class="w3-col w3-container" style="width:24%"><p><label><input v-model="modifType" class="w3-radio" type="radio" name="type_modif" value="charge" required><strong>Prise en charge</strong></label></p></div>
  <div class="w3-col w3-container" style="width:15%"><p><label><input v-model="modifType" class="w3-radio" type="radio" name="type_modif" value="notes" required><strong>Notes</strong></label></p></div>
        </div><br /><br />
		  
        <div class="w3-container">
        <select class="w3-select" v-model="updateDoc" name="id" onchange="onSelectModif(this)">
          <option value="" disabled selected>Sélectionnez le document à modifier</option>
          <option v-for="(doc, i) in docsModif" :value="doc.id" :no="i">{{ doc.nom }}</option>
        </select></div><br /><br />
		  
		<div class="w3-row-padding">
        <div class="w3-third"><label>Modifier le nom du document</label><input class="w3-input w3-border" id="modifNom" name="nom" type="text" placeholder="Document"></div>
		<div class="w3-third"><label>Modifier le nom de l'auteur</label><input class="w3-input w3-border" id="modifAuteur" name="auteur" type="text" placeholder="Auteur"></div>
        <div class="w3-third"><label>Remplacer le document</label><input class="w3-input w3-border" name="fichier" type="file" placeholder="Téléchargement..."></div>
        </div><br /><br />
		  
      </div>
      <footer class="w3-container w3-padding" style="background-color: #233087; color: white; text-align: right">
        <button class="buttonNav3"><i class="fas fa-edit"></i> Modifier</button>
      </footer>
    </div>
  </form>
	
	<form id="supprim" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-padding-large" style="background-color: #f59331; color: white"> 
        <span onclick="document.getElementById('supprim').style.display='none'"class="w3-button w3-display-topright">&times;</span>
        <span class="Style400"><i class="fas fa-eraser"></i> Supprimer un document</span> </header>
      <div class="w3-container w3-padding-large">
		  <span class="Style25"> Sélectionner la rubrique de votre choix pour trouver le document à supprimer :</span>
      <div class="w3-row w3-border-bottom">
        <div class="w3-col w3-container" style="width:21%"><p><label><input v-model="supprType" class="w3-radio suppr" type="radio" name="type_suppr" value="inscript" required><strong>Inscriptions</strong></label></p></div>
        <div class="w3-col w3-container" style="width:17%"><p><label><input v-model="supprType" class="w3-radio suppr" type="radio" name="type_suppr" value="general" required><strong>Général</strong></label></p></div>
        <div class="w3-col w3-container" style="width:23%"><p><label><input v-model="supprType" class="w3-radio suppr" type="radio" name="type_suppr" value="doc_stage" required><strong>Docs Stagiaire</strong></label></p></div>
        <div class="w3-col w3-container" style="width:24%"><p><label><input v-model="supprType" class="w3-radio suppr" type="radio" name="type_suppr" value="charge" required><strong>Prise en charge</strong></label></p></div>
        <div class="w3-col w3-container" style="width:15%"><p><label><input v-model="supprType" class="w3-radio suppr" type="radio" name="type_suppr" value="notes" required><strong>Notes</strong></label></p></div>
      </div><br /><br />
		 
		    <div class="w3-container">
          <select class="w3-select" name="id">
            <option value="" disabled selected>Sélectionnez le document à supprimer</option>
            <option v-for="doc in docsSuppr" :value="doc.id">{{ doc.nom }}</option>
          </select>
        </div><br /><br />
		  
        <div class="w3-row-padding">
          <div class="w3-third"><label>Nom du document</label><input v-model="supprNom" class="w3-input w3-border" type="text" placeholder="Document"></div>
          <div class="w3-third"><label>Nom de l'auteur</label><input v-model="supprAuteur" class="w3-input w3-border" type="text" placeholder="Auteur"></div>
          <!-- div class="w3-third"><label>type de document</label><input  class="w3-input w3-border" type="text" placeholder="Type"></div -->
        </div><br /><br />
		  
      </div>
      <footer class="w3-container w3-padding" style="background-color: #233087; color: white; text-align: right">
        <button class="buttonNav3"><i class="fas fa-eraser"></i> Supprimer</button>
      </footer>
    </div>
  </form>
	
	
</div>
	
	
<div id="content">
	<div class="contentbox-wrapper">
  
<div id="mur" class="contentbox">
<span class="Style210">Mur d'Informations :</span>
<div id="Contenu">
  <table id="table">
  <tr>
    <th>Derniers documents déposés :</th>
    <th>Auteur</th>
    <th>Date</th>
  </tr>
  <tr v-for="(doc, i) in docs" :key="doc.id" v-if="i < 10">
    <td><a :href="'docs/' + doc.fichier" target="_blank"><i class="fas fa-file-alt"></i> {{ doc.nom }}</a></td>
    <td>{{ doc.auteur }}</td>
	  <td>{{ doc.created_on | moment("DD/MM/YYYY") }}</td>
  </tr>
</table>
</div>
</div>
		
<div id="inscriptions" class="contentbox">
	<span class="Style210">Demandes Inscriptions :</span>
<div id="Contenu">
	<table id="table">
  <tr>
    <th>Derniers documents déposés :</th>
    <th>Auteur</th>
    <th>Date</th>
  </tr>
  <tr v-for="(doc, i) in docs" :key="doc.id" v-if="doc.type == 'inscript'">
    <td><a :href="'docs/' + doc.fichier" target="_blank"><i class="fas fa-file-alt"></i> {{ doc.nom }}</a></td>
    <td>{{ doc.auteur }}</td>
	  <td>{{ doc.created_on | moment("DD/MM/YYYY") }}</td>
  </tr>
</table>
</div>
</div>
		
<div id="general" class="contentbox">
	<span class="Style210">Général :</span>
<div id="Contenu">
	<table id="table">
  <tr>
    <th>Derniers documents déposés :</th>
    <th>Auteur</th>
    <th>Date</th>
  </tr>
  <tr v-for="(doc, i) in docs" :key="doc.id" v-if="doc.type == 'general'">
    <td><a :href="'docs/' + doc.fichier" target="_blank"><i class="fas fa-file-alt"></i> {{ doc.nom }}</a></td>
    <td>{{ doc.auteur }}</td>
	  <td>{{ doc.created_on | moment("DD/MM/YYYY") }}</td>
  </tr>
  </tr>
</table>
</div>
		</div>
		
<div id="docs" class="contentbox">
	<span class="Style210">Documents Stagiaires :</span>
	<div id="Contenu">
	<table id="table">
  <tr>
    <th>Derniers documents déposés :</th>
    <th>Auteur</th>
    <th>Date</th>
  </tr>
  <tr v-for="(doc, i) in docs" :key="doc.id" v-if="doc.type == 'doc_stage'">
    <td><a :href="'docs/' + doc.fichier" target="_blank"><i class="fas fa-file-alt"></i> {{ doc.nom }}</a></td>
    <td>{{ doc.auteur }}</td>
	  <td>{{ doc.created_on | moment("DD/MM/YYYY") }}</td>
  </tr>
</table>
</div>
		</div>
		
		<div id="prises" class="contentbox">
			<span class="Style210">Prises en charge :</span>
			<div id="Contenu">
	<table id="table">
  <tr>
    <th>Derniers documents déposés :</th>
    <th>Auteur</th>
    <th>Date</th>
  </tr>
  <tr v-for="(doc, i) in docs" :key="doc.id" v-if="doc.type == 'charge'">
    <td><a :href="'docs/' + doc.fichier" target="_blank"><i class="fas fa-file-alt"></i> {{ doc.nom }}</a></td>
    <td>{{ doc.auteur }}</td>
	  <td>{{ doc.created_on | moment("DD/MM/YYYY") }}</td>
  </tr>
</table>
</div>
		</div>
		
		<div id="notes" class="contentbox">
			<span class="Style210">Notes :</span>
			<div id="Contenu">
	<table id="table">
  <tr>
    <th>Derniers documents déposés :</th>
    <th>Auteur</th>
    <th>Date</th>
  </tr>
  <tr v-for="(doc, i) in docs" :key="doc.id" v-if="doc.type == 'notes'">
    <td><a :href="'docs/' + doc.fichier" target="_blank"><i class="fas fa-file-alt"></i> {{ doc.nom }}</a></td>
    <td>{{ doc.auteur }}</td>
	  <td>{{ doc.created_on | moment("DD/MM/YYYY") }}</td>
  </tr>
</table>
</div>
		</div>
		
</div>
</div>
	
<div id="Base_Contenu"></div>
</div>
</div>
<div id="mySidenav" class="sidenav">
  <a href="GGRE-connect-BN.php" id="Back_home" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></a>
  <a href="https://forum.ggre-asso.fr/" id="Forum" target="_blank" title="Accès Forum"><i class="fa fa-comments"></i></a>
</div>
<div id="bandeausup"></div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
<script src="https://cdn.jsdelivr.net/npm/vue-moment@4.0.0/dist/vue-moment.min.js"></script>
<script>
function onSelectModif(el) {
  let doc = vApp.docsModif[$(el).find(":selected").attr('no')];
  $('#modifNom').val(doc.nom);
  $('#modifAuteur').val(doc.auteur);
}

Vue.use(vueMoment);
var vApp = new Vue({
  el: '#Layer_global',
  data: function() {
    return {
      docs: [],
      modifType: 'inscript',
      supprType: 'inscript',
      supprAuteur: '',
      supprNom: '',
      updateDoc: null
    }
  },
  computed: {
    docsModif: function () {
      $('#modifNom').val('');
      $('#modifAuteur').val('');

      // Filter results
      return this.docs.filter( doc => {
        return doc.type == this.modifType;
      });
    },
    docsSuppr: function () {
      // Filter results
      return this.docs.filter( doc => {
        let ok = doc.type == this.supprType;

        if(this.supprNom.length > 0) {
          ok = ok && doc.nom.toLowerCase() == this.supprNom.toLowerCase();
        }

        if(this.supprAuteur.length > 0) {
          ok = ok && doc.auteur.toLowerCase() == this.supprAuteur.toLowerCase();
        }

        return ok;
      });
    }
  },
  methods: {
    dataLoad: function () {
      let vueApp = this;
      $.ajax({                           
          url: 'dbajax/db.php?task=list_bn_document',
          method: "GET",
          beforeSend : function() {},
          dataType: "json", 
          success: function(response){
              vueApp.docs = response.data;
          }
      });
    }
  },
  mounted: function () {
    this.dataLoad();
  }
});

$(function(){
  $('#depot,#modif').submit(function(e){
    e.preventDefault();

    let $form = $(this);
    
    $.ajax({                           
        url: 'dbajax/db.php?task=save_bn_document',
        method: "POST",
        data:  new FormData($(this)[0]),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend : function() {},
        dataType: "json", 
        success: function(response){
            if(response.success) {
                vApp.dataLoad();
                $form.hide();
            } else {
                alert(response.msg);
            }
        }
    });
  });

  $('#supprim').submit(function(e){
    e.preventDefault();

    let $form = $(this);
    
    $.ajax({                           
        url: 'dbajax/db.php?task=delete_bn_document',
        method: "POST",
        data:  $(this).serialize(),
        beforeSend : function() {},
        dataType: "json", 
        success: function(response){
            if(response.success) {
                vApp.dataLoad();
                $form.hide();
            } else {
                alert(response.msg);
            }
        }
    });
  });

})
</script>
</body>
</html>
