<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" type="image/x-icon" href="images/ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/ggre-favicon.ico" /><![endif]-->
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<title>Administration site G.G.R.E</title>
	
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Scripts/script.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
	
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/design_ADMIN.css" />
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
        background: url("images/GGRE-V2-fond1b.jpg") no-repeat center center fixed;
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
	
#table_adherent {
  height: 400px;
  background-color: #ffffff;
  overflow-y: scroll; /* Add the ability to scroll */
}

/* Hide scrollbar for Chrome, Safari and Opera */
#table_adherent::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#table_adherent {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
	
#table_adherent th {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: bold;
	        color: #fff;
	        padding:10;
        }
	
#table_adherent td {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: normal;
	        color: #000;
	        padding:10;
        }
	
a:link {
            color: #575dad;
            text-decoration: none;
        }
a:visited {
            color: #575dad;
            text-decoration: none;
        }
a:hover {
            color: #000;
            text-decoration: none;
        }
a:active {
            text-decoration: none;
        }
	
.dropdown {
  position: absolute;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  border-radius: 5px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 8px 12px;
  text-decoration: none;
  display: block;
  border-radius: 5px;
}

.dropdown-content a:hover {background-color: #f59331; color: #fff;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #f59331;}

</style>
</head>

<body>
<!-- début layer global -->
<div id="Layer_global" style="position:relative; margin: 0 auto; width:1307px; height:800px;">
	
<!-- zone Header -->
<div id="Tete_BN" class="w3-container w3-center">
	<div id="logo"><a href="GGRE-admin-sommaire.php"><img src="images/GGRE-V2-logo.png" width="130" title="retour accueil" /></a></div>
	<div id="Titre"><span class="Style500">Administration site et annuaire GGRE</span><br />
		
<!-- Bloc Administrateur -->
	<table>
      <tr>
        <td width="110" align="left">Bienvenue :</td>
        <td align="left"><strong>Membres du Bureau</strong></td>
      </tr>
    </table><br />
		
<!-- zone Boutons fonctions-->
		<a href="GGRE-base-adherents.php"><button class="buttonNav1">Base Adhérents</button></a>
		<a href="GGRE-base-formateurs.php"><button class="buttonNav1">Base Formateurs</button></a>
	    <button class="buttonNav1">Actualités Extranet </button>
	    <button class="buttonNav1">La Lettre & La Plume</button>
	    <button class="buttonNav1">Infos et Docs</button>
		<button class="buttonNav1">Administrateurs</button>
		
	  </div>
</div>
	
	
<!-- zone Adhérents GGRE -->
<div id="Base_Adherents" class="w3-container w3-padding-large">
	
<em class="fa fa-user-circle" style="font-size:26px; color:#133090;"></em> <span class="Style210">Base Adhérents GGRE</span>
	
<!-- zone Boutons création fiches -->
<div class="w3-display-topmiddle" style="top:6px; width: 550px;">
		
	<div class="w3-half w3-right-align">
	<a onclick="document.getElementById('crea_fiche_adherent_ggre').style.display='block'"><button class="buttonNav2b"><i class="fa fa-edit" style="font-size:12px;"></i> Créer une fiche Adhérent</button></a></div>
		
	<div class="w3-half w3-right-align">
	<a onclick="document.getElementById('crea_fiche_stagiaire_ggre').style.display='block'"><button class="buttonNav2b"><i class="fa fa-edit" style="font-size:12px;"></i> Créer une fiche Stagiaire</button></a></div>
	
	</div>
	
<div class="w3-display-topright" style="top:20px; right:32px">
<a href="GGRE-admin-sommaire.php"><em class="fa fa-arrow-left" style="font-size:18px;"></em> Retour Sommaire Administration</a>
</div>
	
	
<!-- table Adhérents GGRE -->
<div id="table_adherent" class="w3-border w3-margin">
	<table class="w3-table w3-striped w3-bordered w3-hoverable w3-tiny">
    <thead>
      <tr class="w3-blue">
        <th>Nom Prénom <i class="fa fa-sort"></i></th>
        <th>Etat <i class="fa fa-sort"></i></th>
		<th>Statut <i class="fa fa-sort"></i></th>
		<th>Région <i class="fa fa-sort"></i></th>
		<th class="w3-right-align">Action</th>
      </tr>
    </thead>
    <tr>
	  <td><span class="Style211">Caroline Baguenault de Puchesse</span></td>
      <td><i class="fa fa-check" style="font-size:12px; color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><a onclick="document.getElementById('fiche_adherent_ggre').style.display='block'"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></a></td>
    </tr>
    <tr>
      <td><span class="Style211">Dominique Andrieu-Moutard</span></td>
      <td><i class="fa fa-check" style="font-size:12px; color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Odeline Phion</span></td>
      <td><i class="fa fa-exclamation-triangle" style="font-size:12px; color:red"></i> Non membre</td>
	  <td><i class="fa fa-mortar-board" style="font-size:12px; color:red"></i> Stagiaire</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><a onclick="document.getElementById('fiche_stagiaire_ggre').style.display='block'"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></a></td>
    </tr>
    <tr>
      <td><span class="Style211">Elisabeth Lambert</span></td>
      <td><i class="fa fa-times" style="font-size:12px; color:red"></i> Inactif</td>
	   <td><i class="fa fa-times" style="font-size:12px; color:red"></i> Sans activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Caroline Massyn</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Céline Péron</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Anne de Labouret</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Anne-Marie Rebut</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Caroline Chamorel</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Valérie Brachet</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td><i class="fa fa-pencil" style="font-size:12px; color:green"></i> En activité</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> IDF</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
  </table>
</div>
	
	
<!-- popup formulaire création fiche adherent ggre -->	
  <div id="crea_fiche_adherent_ggre" class="w3-modal" style="z-index: 1110; top: 75px;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:850px">

	 <div class="w3-left-align w3-small">
      <header class="w3-container w3-orange w3-padding-large w3-center w3-round-medium"><span onClick="document.getElementById('crea_fiche_adherent_ggre').style.display='none'" class="w3-button w3-display-topright w3-large w3-orange w3-hover-blue w3-round-medium">&times;</span>
	  <em class="fa fa-user-circle" style="font-size:24px; color:#ffffff;"></em>
		  <span class="Style210"> Fiche Création Adhérent GGRE</span></header>
		 
<form action="/action_page.php" target="_blank">
	
<!-- zone onglets -->	
<div class="w3-bar w3-border-bottom w3-white w3-padding">
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_adherent1')">Fiche principale</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_adherent2')">Situation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_archives')">Archives stagiaire</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_docs')">Documents</button>
 </div>
		
<!-- onglet fiche principale -->
 <div id="crea_adherent1" class="w3-container w3-padding-small w3-light-grey city">

<!-- ligne 1 -->	
	    <div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom d'usage" name="nom" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="prénom" name="prenom" required>
        </div>
        </div><br>
		
<!-- ligne 2 -->
		<div class="w3-row-padding">
			
		<div class="w3-third">
        <label class="Style211">Statut</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">MA</option>
        <option value="2">MH</option>
		<option value="3">MNA</option>
		<option value="4">MHA</option>
        </select>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Annuaire</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Abonnement LP</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
			
        </div><br>
		
<!-- ligne 3 -->
		<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Adresse annuaire</label>
        <input class="w3-input w3-border" type="text" placeholder="Numéro + rue" name="adresse" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="code postal" name="code" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="commune" name="ville" required>
        </div>
			
        </div><br>
		
<!-- ligne adresse 2 -->
	   <div class="w3-row w3-margin-bottom">
				
			<div class="w3-col w3-container" style="width:25%">
	        <input class="w3-check" type="checkbox"><label> Même adresse pour LP</label>
	        </div>
				
			<div class="w3-col w3-container" style="width:75%">
		    <button class="buttonNav3 w3-margin-left" onclick="myFunction('adresse2')"><i class="fa fa-edit" style="font-size:12px;"></i> Adresse 2</button><br />
			</div>
				
			<div id="adresse2" class="w3-row-padding w3-hide w3-margin-bottom w3-margin-top">
				
			<div class="w3-third">
            <label class="Style211">Adresse 2</label>
            <input class="w3-input w3-border" type="text" placeholder="Numéro + rue" name="adresse" required>
            </div>
				
		    <div class="w3-third">
            <label class="Style211">Code postal</label>
            <input class="w3-input w3-border" type="text" placeholder="code postale" name="code" required>
            </div>
				
		    <div class="w3-third">
            <label class="Style211">Commune</label>
            <input class="w3-input w3-border" type="text" placeholder="commune" name="ville" required>
            </div>
				
			</div><br>
			</div>
	 
<!-- ligne 4 -->
	    <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="Pays" name="pays" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="10 chiffres" name="phone" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="nom@operateur.com" name="mail" required>
        </div>
			
        </div><br>
	 
 <!-- ligne 5 -->
	    <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Site Internet</label>
        <input class="w3-input w3-border" type="text" placeholder="www.nomdusite.com" name="phone" required>
        </div>
			
		<div class="w3-third">
         <label class="Style211">AFEHP</label>
         <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
         </select>
         </div>
			
		<div class="w3-third">
         <label class="Style211">Inscription Forum</label>
         <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
	    <option value="1">Oui avec alerte</option>
        <option value="2">Non</option>
         </select>
        </div>
        </div><br>
	 
<!-- ligne 6 -->
	    <div class="w3-row-padding">
			
	    <div class="w3-container">
         <label class="Style211">Divers</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="divers" required></textarea>
        </div>
			
		</div><br />
		
</div>
	 
<!-- onglet fiche complément -->
<div id="crea_adherent2" class="w3-container w3-padding-small w3-light-grey city">
	
		
<!-- ligne 5 -->
		<div class="w3-row-padding">
        <div class="w3-quarter">
        <label class="Style211">Activité Pro.</label>
        <select class="w3-select w3-border" name="activite">
        <option value="activ_pro" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Oui mais non renseigné</option>
	    <option value="3">Oui étranger</option>
        <option value="4">Suspension</option>
		<option value="5">Arrêt activité</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Date début d'activité</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_activ" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Numéro SIRET</label>
        <input class="w3-input w3-border" type="text" placeholder="7 chiffres" name="siret" required>
        </div>
		<div class="w3-quarter">
         <label class="Style211">Date arrêt d'activité</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_arret" required>
        </div>
        </div><br>
	
<!-- ligne 6 -->
		<div class="w3-row-padding">
        <div class="w3-third">
        <label class="Style211">Formation continue</label>
        <select class="w3-select w3-border" name="formateur">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">GGRE</option>
        <option value="2">Autre</option>
        </select>
        </div>
		<div class="w3-third">
        <label class="Style211">Formateur interne</label>
        <select class="w3-select w3-border" name="formateur">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-third">
         <label class="Style211">Autres activités pro.</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="autre_activite" required></textarea>
        </div>
        </div><br>
		
<!-- ligne 7 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">Région</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir une région</option>
        <option value="1">Hauts-de-France</option>
        <option value="2">Ile-de-France</option>
		<option value="3">Normandie</option>
        <option value="4">Centre-Val-de-Loire</option>
	    <option value="5">Grand-Est</option>
        <option value="6">Nouvelle-Aquitaine</option>
		<option value="7">Bretagne</option>
        <option value="8">Occitanie</option>
		<option value="9">Pays-de-la-Loire</option>
	    <option value="10">PACA</option>
        <option value="11">Corse</option>
		<option value="12">Bourgogne-Franche-Comté</option>
        <option value="13">Auvergne-Rhône-Alpes</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Découpage GGRE</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir une zone</option>
        <option value="1">R1</option>
        <option value="2">R2</option>
		<option value="1">R3</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Diplôme</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un Diplôme</option>
        <option value="1">SFDG</option>
        <option value="2">AGA</option>
		<option value="1">ALG</option>
        <option value="2">AGBLP</option>
		<option value="2">AGNP</option>
		<option value="2">Autres</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année Certif. GGRE</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir une année</option>
        <option value="1">Antérieur à 2009</option>
        <option value="2">2009</option>
	    <option value="2">2010</option>
		<option value="2">2011</option>
		<option value="2">2012</option>
		<option value="2">2013</option>
		<option value="2">2014</option>
		<option value="2">2015</option>
		<option value="2">2016</option>
		<option value="2">2017</option>
		<option value="2">2018</option>
		<option value="2">2019</option>
		<option value="2">2020</option>
		<option value="2">2021</option>
		<option value="2">2022</option>
        </select>
        </div>
        </div><br>
		
<!-- ligne 8 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">ID Extranet</label>
        <input class="w3-input w3-border" type="text" placeholder="Utilisateur extranet" name="ID_extranet" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">MdP Extranet</label>
        <input class="w3-input w3-border" type="text" placeholder="Mot de passe extranet" name="MdP_extranet" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">ID Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="Utilisateur Forum" name="ID_forum" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">MdP Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="Mot de passe Forum" name="MdP_forum" required>
        </div>
        </div><br>
	
<!-- ligne 9 -->
		<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Trésorerie :</span><br /><br />
        <div class="w3-quarter">
        <label class="Style211">Cotisation GGRE</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Montant cotisation</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_cotis" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Assurance</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">OMNES GGRE</option>
        <option value="2">Autre assurance</option>
		<option value="3">Sans assurance</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Montant assurance</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_assurance" required>
        </div>
        </div><br>
	
<!-- ligne 10 -->
		<div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Acompte FC</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div>
		<div class="w3-half">
        <label class="Style211">Solde FC</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div><br>
	
</div><br />
	</div>
	 
<!-- onglet archives stagaire-->
<div id="crea_archives" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 archives -->
<div class="w3-row-padding w3-margin-top">
		<span class="Style30">Pré Inscription :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Diplômes obtenus</label>
        <select class="w3-select w3-border" name="diplome">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">BAC</option>
        <option value="2">BAC+1</option>
		<option value="3">BAC+2</option>
        <option value="4">BAC+3</option>
		<option value="5">BAC+4</option>
        <option value="6">BAC+5</option>
		<option value="7">Equivalent</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date d'obtention</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_valid" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Prérequis Graph.</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">SFDG</option>
		<option value="2">CNPG</option>
        <option value="3">MLCN</option>
		<option value="4">AGBLP</option>
        <option value="5">AGMP</option>
		<option value="6">AGNP</option>
        <option value="7">ALG</option>
		<option value="8">Autres</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date prérequis</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_valid" required>
        </div>
        </div><br>
		
<!-- ligne 2 archives -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
        <div class="w3-col">
         <label class="Style211">Situation professionnelle avant la formation</label>
         <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
		</div>
        </div><br>
		
<!-- ligne 3 archives -->
<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Inscription :</span><br /><br />
			
        <div class="w3-third">
         <label class="Style211">Réception dossier</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Date validation entretien</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="val_entretien" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°1 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_1" required>
        </div>
        </div><br>
		
<!-- ligne 4 archives-->
<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Procédure N°1 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_2" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_recep2" required>
        </div>
			
        </div><br>
	
<!-- ligne 5 archives-->
<div class="w3-row-padding">
			
        <div class="w3-col" style="width:30%">
         <label class="Style211">Situation de handicap</label>
        <select class="w3-select w3-border" name="handicap">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
		</select>
        </div>
			
		<div class="w3-col" style="width:70%">
         <label class="Style211">Aménagements requis</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
        </div>
			
        </div><br>
		
<!-- ligne 6 archives -->
<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Formation :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Année Promo GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="promo_GGRE" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Effectif de la promotion</label>
        <input class="w3-input w3-border" type="text" placeholder="nombre" name="effectif" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Tuteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom tuteur" name="tuteur" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Correcteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom correcteur" name="correcteur" required>
        </div>
			
        </div><br>
	
<!-- ligne 7 archives -->
<div class="w3-row-padding">
	
	    <div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note théorique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_theorique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note pratique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_pratique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Mémoire écrit</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_memoire" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Oral soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_orale" required>
        </div>
	
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Date diplôme</label>
        <input class="w3-input w3-border" type="text" placeholder="mm/aaaa" name="date_diplome" required>
        </div>
			
        </div><br>
	 
	 </div>
	
<!-- onglet documents -->
<div id="crea_docs" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 docs -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
		<div class="w3-col" style="width: 70%">
        <label class="Style211"><i class="fa fa-download" style="font-size:12px;"></i> Document à déposer <em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
		<span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format jpg ou Pdf obligatoire</span></em>
		</label><br /><input type="file" class="w3-input w3-border w3-white" id="myFile" name="filename">
		</div>
			
		<div class="w3-col" style="width: 30%"><br />
		<button class="buttonNav1" style="width:100%"><i class="fa fa-download" style="font-size:18px;"></i> Importer</button>
        </div>
</div>
	
<!-- ligne 2 liste docs -->
<div class="w3-padding-small w3-margin-top">
	<label class="Style211"><i class="fa fa-file" style="font-size:12px;"></i> Documents disponibles :</label>
			
<table id="doc_formateur" class="w3-table-all w3-tiny">
    <tr class="w3-blue">
      <th>Désignation</th>
      <th>Date de dépôt</th>
	  <th class="w3-right-align">Action</th>
    </tr>
    <tr>
      <td><span class="Style29">CV Stéphanie Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Dîplome SFDG S. Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
  </table>
<br />
</div>
	
</div>

<!-- zone Footer -->
<footer class="w3-container w3-round-large w3-margin-top">
		  
		  <div class="w3-half">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-remove" style="font-size:20px;"></i> Annuler la création</button></a>
		  </div>
		  
		  <div class="w3-half">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large w3-right" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-check" style="font-size:20px;"></i> Enregistrer la création</button></a>
		  </div>
		  
</footer></form>
	
	
    </div>
	</div>
 </div>
	
<!-- popup formulaire création fiche stagiaire ggre -->	
  <div id="crea_fiche_stagiaire_ggre" class="w3-modal" style="z-index: 1110; top: 75px;">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:900px">

<div class="w3-left-align w3-small">
  <header class="w3-container w3-orange w3-padding-large w3-center w3-round-medium"><span onClick="document.getElementById('crea_fiche_stagiaire_ggre').style.display='none'" class="w3-button w3-display-topright w3-large w3-orange w3-hover-blue w3-round-medium">&times;</span>
	  <em class="fa fa-user-circle" style="font-size:24px; color:#ffffff;"></em>
		  <span class="Style210"> Fiche création Stagiaire GGRE</span></header>
		 
<form action="/action_page.php" target="_blank">
	
<!-- zone onglets -->	
<div class="w3-bar w3-border-bottom w3-white w3-padding">
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_stagiaire1')">Fiche principale</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_stagiaire2')">Situation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_stagiaire3')">Formation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_stagiaire4')">Documents</button>
 </div>
		
<!-- onglet fiche principale -->
 <div id="crea_stagiaire1" class="w3-container w3-padding-small w3-light-grey city">

<!-- ligne 1 fiche principale -->	
	    <div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom d'usage" name="nom" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="prénom" name="prenom" required>
        </div>
			
        </div><br>
		
<!-- ligne 2 fiche principale -->
		<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Adresse</label>
        <input class="w3-input w3-border" type="text" placeholder="Numéro + rue" name="adresse" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="code postal" name="code" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="commune" name="ville" required>
        </div>
			
        </div><br>
	 
<!-- ligne 3 fiche principale -->
	    <div class="w3-row-padding">
			
        <div class="w3-half">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="Pays" name="pays" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="10 chiffres" name="phone" required>
        </div>
			
        </div><br>
	 
<!-- ligne 4 fiche principale -->
	    <div class="w3-row-padding">
			
		<div class="w3-half">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="nom@operateur.com" name="mail" required>
        </div>
			
		<div class="w3-half">
         <label class="Style211">Nationalité</label>
         <input class="w3-input w3-border" type="text" placeholder="intitulé pays" name="nationalite" required>
         </div>
			
        </div><br>
		
</div>
	 
<!-- onglet situation stagiaire-->
<div id="crea_stagiaire2" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 situation -->
        <div class="w3-row-padding w3-margin-top">
		<span class="Style30">Pré Inscription :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Diplômes obtenus</label>
        <select class="w3-select w3-border" name="diplome">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">BAC</option>
        <option value="2">BAC+1</option>
		<option value="3">BAC+2</option>
        <option value="4">BAC+3</option>
		<option value="5">BAC+4</option>
        <option value="6">BAC+5</option>
		<option value="7">Equivalent</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date d'obtention</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_valid" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Prérequis Graph.</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">SFDG</option>
		<option value="2">CNPG</option>
        <option value="3">MLCN</option>
		<option value="4">AGBLP</option>
        <option value="5">AGMP</option>
		<option value="6">AGNP</option>
        <option value="7">ALG</option>
		<option value="8">Autres</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date prérequis</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_valid" required>
        </div>
			
        </div><br>
		
<!-- ligne 2 situation -->
		<div class="w3-row-padding w3-margin-top w3-margin-bottom">
        <div class="w3-col">
         <label class="Style211">Situation professionnelle avant la formation</label>
         <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
		</div>
        </div><br>
		
<!-- ligne 3 situation -->
        <div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Inscription :</span><br /><br />
			
        <div class="w3-third">
         <label class="Style211">Réception dossier</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Date validation entretien</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="val_entretien" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°1 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_1" required>
        </div>
			
        </div><br>
		
<!-- ligne 4 situation -->
        <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Procédure N°1 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_2" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_recep2" required>
        </div>
			
        </div><br>
	
<!-- ligne 5 situation -->
        <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Situation de handicap</label>
        <select class="w3-select w3-border" name="handicap">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
		</select>
        </div>
			
		<div class="w3-third">
         <label class="Style211">Aménagements requis</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Pôle de formation</label>
        <select class="w3-select w3-border" name="handicap">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Paris</option>
        <option value="2">Lyon</option>
		</select>
        </div>
			
        </div><br>
		
</div>
	
<!-- onglet formation stagiaire-->
<div id="crea_stagiaire3" class="w3-container w3-padding-small w3-light-grey city">
	 		
<!-- ligne 1 formation -->
<div class="w3-row-padding w3-margin-top">
		<span class="Style30">Formation :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Année Promo GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="promo_GGRE" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Effectif de la promotion</label>
        <input class="w3-input w3-border" type="text" placeholder="nombre" name="effectif" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Tuteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom tuteur" name="tuteur" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Correcteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom correcteur" name="correcteur" required>
        </div>
			
        </div><br>
	
<!-- ligne 2 formation -->
<div class="w3-row-padding">
	
	    <div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note théorique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_theorique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note pratique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_pratique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Mémoire écrit</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_memoire" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Oral soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_orale" required>
        </div>
	
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Résultat final</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Diplômé(e)</option>
		<option value="2">Abandon</option>
        <option value="3">Redoublement</option>
		<option value="4">Ajournement</option>
        </select>
        </div>
			
        </div><br>
	
<!-- ligne 1 trésorerie -->
<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Trésorerie :</span><br /><br />
			
        <div class="w3-half">
        <label class="Style211">Acompte inscription</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prise en charge</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
		<option value="2">En cours</option>
        </select>
        </div>

        </div><br>
	
<!-- ligne 2 trésorerie -->
<div class="w3-row-padding">
			
		<div class="w3-quarter">
        <label class="Style211">Année 1 versement 1</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_1" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année 1 versement 2</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_2" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année 1 versement 3</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_3" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année 2 versement 4</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_3" required>
        </div>
        </div><br>
	 
</div>
	
<!-- onglet documents stagiaire-->
<div id="crea_stagiaire4" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 docs -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
		<div class="w3-col" style="width: 70%">
        <label class="Style211"><i class="fa fa-download" style="font-size:12px;"></i> Document à déposer <em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
		<span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format jpg ou Pdf obligatoire</span></em>
		</label><br /><input type="file" class="w3-input w3-border w3-white" id="myFile" name="filename">
		</div>
			
		<div class="w3-col" style="width: 30%"><br />
		<button class="buttonNav1" style="width:100%"><i class="fa fa-download" style="font-size:18px;"></i> Importer</button>
        </div>
</div>
	
<!-- ligne 2 liste docs -->
<div class="w3-padding-small w3-margin-top">
	<label class="Style211"><i class="fa fa-file" style="font-size:12px;"></i> Documents disponibles :</label>
			
<table id="doc_formateur" class="w3-table-all w3-tiny">
    <tr class="w3-blue">
      <th>Désignation</th>
      <th>Date de dépôt</th>
	  <th class="w3-right-align">Action</th>
    </tr>
    <tr>
      <td><span class="Style29">CV Stéphanie Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Dîplome SFDG S. Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
  </table>
<br />
</div>
	
</div>

<!-- zone Footer -->
 <footer class="w3-container w3-round-large w3-margin-top">
		
		  <div class="w3-half">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-remove" style="font-size:20px;"></i> Annuler la modification</button></a>
		  </div>
		
		  <div class="w3-half">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large w3-right" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-check" style="font-size:20px;"></i> Enregistrer la modification</button></a>
		  </div>
		
</footer></form>
	</div>
		 
	</div>
	</div>
	
	
	
<!-- popup fiche adherent ggre -->	
  <div id="fiche_adherent_ggre" class="w3-modal" style="z-index: 1110; top: 75px;">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:850px">

  <div class="w3-left-align w3-small">
      <header class="w3-container w3-orange w3-padding-large w3-center w3-round-medium"><span onClick="document.getElementById('fiche_adherent_ggre').style.display='none'" class="w3-button w3-display-topright w3-large w3-orange w3-hover-blue w3-round-medium">&times;</span>
	  <em class="fa fa-user-circle" style="font-size:24px; color:#ffffff;"></em>
		  <span class="Style210"> Fiche adhérent GGRE</span></header>
		 
<form action="/action_page.php" target="_blank">
	
<!-- zone onglets -->	
<div class="w3-bar w3-border-bottom w3-white w3-padding">
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'adherent1')">Fiche principale</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'adherent2')">Situation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'archives')">Archives stagiaire</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'docs')">Documents</button>
 </div>
		
<!-- onglet fiche principale -->
 <div id="adherent1" class="w3-container w3-padding-small w3-light-grey city">

<!-- ligne 1 -->	
	    <div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom d'usage" name="nom" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="prénom" name="prenom" required>
        </div>
        </div><br>
		
<!-- ligne 2 -->
		<div class="w3-row-padding">
			
		<div class="w3-third">
        <label class="Style211">Statut</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">MA</option>
        <option value="2">MH</option>
		<option value="3">MNA</option>
		<option value="4">MHA</option>
        </select>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Annuaire</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Abonnement LP</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
			
        </div><br>
		
<!-- ligne 3 -->
		<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Adresse annuaire</label>
        <input class="w3-input w3-border" type="text" placeholder="Numéro + rue" name="adresse" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="code postal" name="code" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="commune" name="ville" required>
        </div>
			
        </div><br>
		
<!-- ligne adresse 2 -->
	   <div class="w3-row w3-margin-bottom">
				
			<div class="w3-col w3-container" style="width:25%">
	        <input class="w3-check" type="checkbox"><label> Même adresse pour LP</label>
	        </div>
				
			<div class="w3-col w3-container" style="width:75%">
		    <button class="buttonNav3 w3-margin-left" onclick="myFunction('adresse2')"><i class="fa fa-edit" style="font-size:12px;"></i> Adresse 2</button><br />
			</div>
				
			<div id="adresse2" class="w3-row-padding w3-hide w3-margin-bottom w3-margin-top">
				
			<div class="w3-third">
            <label class="Style211">Adresse 2</label>
            <input class="w3-input w3-border" type="text" placeholder="Numéro + rue" name="adresse" required>
            </div>
				
		    <div class="w3-third">
            <label class="Style211">Code postal</label>
            <input class="w3-input w3-border" type="text" placeholder="code postale" name="code" required>
            </div>
				
		    <div class="w3-third">
            <label class="Style211">Commune</label>
            <input class="w3-input w3-border" type="text" placeholder="commune" name="ville" required>
            </div>
				
			</div><br>
			</div>
	 
<!-- ligne 4 -->
	    <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="Pays" name="pays" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="10 chiffres" name="phone" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="nom@operateur.com" name="mail" required>
        </div>
			
        </div><br>
	 
 <!-- ligne 5 -->
	    <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Site Internet</label>
        <input class="w3-input w3-border" type="text" placeholder="www.nomdusite.com" name="phone" required>
        </div>
			
		<div class="w3-third">
         <label class="Style211">AFEHP</label>
         <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
         </select>
         </div>
			
		<div class="w3-third">
         <label class="Style211">Inscription Forum</label>
         <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
	    <option value="1">Oui avec alerte</option>
        <option value="2">Non</option>
         </select>
        </div>
        </div><br>
	 
<!-- ligne 6 -->
	    <div class="w3-row-padding">
			
	    <div class="w3-container">
         <label class="Style211">Divers</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="divers" required></textarea>
        </div>
			
		</div><br />
		
</div>
	 
<!-- onglet fiche complément -->
<div id="adherent2" class="w3-container w3-padding-small w3-light-grey city">
	
				
<!-- ligne 5 -->
		<div class="w3-row-padding">
        <div class="w3-quarter">
        <label class="Style211">Activité Pro.</label>
        <select class="w3-select w3-border" name="activite">
        <option value="activ_pro" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Oui mais non renseigné</option>
	    <option value="3">Oui étranger</option>
        <option value="4">Suspension</option>
		<option value="5">Arrêt activité</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Date début d'activité</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_activ" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Numéro SIRET</label>
        <input class="w3-input w3-border" type="text" placeholder="7 chiffres" name="siret" required>
        </div>
		<div class="w3-quarter">
         <label class="Style211">Date arrêt d'activité</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_arret" required>
        </div>
        </div><br>
	
<!-- ligne 6 -->
		<div class="w3-row-padding">
        <div class="w3-third">
        <label class="Style211">Formation continue</label>
        <select class="w3-select w3-border" name="formateur">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">GGRE</option>
        <option value="2">Autre</option>
        </select>
        </div>
		<div class="w3-third">
        <label class="Style211">Formateur interne</label>
        <select class="w3-select w3-border" name="formateur">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-third">
         <label class="Style211">Autres activités pro.</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="autre_activite" required></textarea>
        </div>
        </div><br>
		
<!-- ligne 7 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">Région</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir une région</option>
        <option value="1">Hauts-de-France</option>
        <option value="2">Ile-de-France</option>
		<option value="3">Normandie</option>
        <option value="4">Centre-Val-de-Loire</option>
	    <option value="5">Grand-Est</option>
        <option value="6">Nouvelle-Aquitaine</option>
		<option value="7">Bretagne</option>
        <option value="8">Occitanie</option>
		<option value="9">Pays-de-la-Loire</option>
	    <option value="10">PACA</option>
        <option value="11">Corse</option>
		<option value="12">Bourgogne-Franche-Comté</option>
        <option value="13">Auvergne-Rhône-Alpes</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Découpage GGRE</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir une zone</option>
        <option value="1">R1</option>
        <option value="2">R2</option>
		<option value="1">R3</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Diplôme</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un Diplôme</option>
        <option value="1">SFDG</option>
        <option value="2">AGA</option>
		<option value="1">ALG</option>
        <option value="2">AGBLP</option>
		<option value="2">AGNP</option>
		<option value="2">Autres</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année Certif. GGRE</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir une année</option>
        <option value="1">Antérieur à 2009</option>
        <option value="2">2009</option>
	    <option value="2">2010</option>
		<option value="2">2011</option>
		<option value="2">2012</option>
		<option value="2">2013</option>
		<option value="2">2014</option>
		<option value="2">2015</option>
		<option value="2">2016</option>
		<option value="2">2017</option>
		<option value="2">2018</option>
		<option value="2">2019</option>
		<option value="2">2020</option>
		<option value="2">2021</option>
		<option value="2">2022</option>
        </select>
        </div>
        </div><br>
		
<!-- ligne 8 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">ID Extranet</label>
        <input class="w3-input w3-border" type="text" placeholder="Utilisateur extranet" name="ID_extranet" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">MdP Extranet</label>
        <input class="w3-input w3-border" type="text" placeholder="Mot de passe extranet" name="MdP_extranet" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">ID Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="Utilisateur Forum" name="ID_forum" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">MdP Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="Mot de passe Forum" name="MdP_forum" required>
        </div>
        </div><br>
	
<!-- ligne 9 -->
		<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Trésorerie :</span><br /><br />
        <div class="w3-quarter">
        <label class="Style211">Cotisation GGRE</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Montant cotisation</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_cotis" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Assurance</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">OMNES GGRE</option>
        <option value="2">Autre assurance</option>
		<option value="3">Sans assurance</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Montant assurance</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_assurance" required>
        </div>
        </div><br>
	
<!-- ligne 10 -->
		<div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Acompte FC</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div>
		<div class="w3-half">
        <label class="Style211">Solde FC</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div><br>
	
</div><br />
	
</div>
	 
<!-- onglet archives stagaire-->
<div id="archives" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 archives -->
<div class="w3-row-padding w3-margin-top">
		<span class="Style30">Pré Inscription :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Diplômes obtenus</label>
        <select class="w3-select w3-border" name="diplome">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">BAC</option>
        <option value="2">BAC+1</option>
		<option value="3">BAC+2</option>
        <option value="4">BAC+3</option>
		<option value="5">BAC+4</option>
        <option value="6">BAC+5</option>
		<option value="7">Equivalent</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date d'obtention</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_valid" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Prérequis Graph.</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">SFDG</option>
		<option value="2">CNPG</option>
        <option value="3">MLCN</option>
		<option value="4">AGBLP</option>
        <option value="5">AGMP</option>
		<option value="6">AGNP</option>
        <option value="7">ALG</option>
		<option value="8">Autres</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date prérequis</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_valid" required>
        </div>
        </div><br>
		
<!-- ligne 2 archives -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
        <div class="w3-col">
         <label class="Style211">Situation professionnelle avant la formation</label>
         <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
		</div>
        </div><br>
		
<!-- ligne 3 archives -->
<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Inscription :</span><br /><br />
			
        <div class="w3-third">
         <label class="Style211">Réception dossier</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Date validation entretien</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="val_entretien" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°1 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_1" required>
        </div>
        </div><br>
		
<!-- ligne 4 archives-->
<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Procédure N°1 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_2" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_recep2" required>
        </div>
			
        </div><br>
	
<!-- ligne 5 archives-->
<div class="w3-row-padding">
			
        <div class="w3-col" style="width:30%">
         <label class="Style211">Situation de handicap</label>
        <select class="w3-select w3-border" name="handicap">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
		</select>
        </div>
			
		<div class="w3-col" style="width:70%">
         <label class="Style211">Aménagements requis</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
        </div>
			
        </div><br>
		
<!-- ligne 6 archives -->
<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Formation :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Année Promo GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="promo_GGRE" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Effectif de la promotion</label>
        <input class="w3-input w3-border" type="text" placeholder="nombre" name="effectif" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Tuteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom tuteur" name="tuteur" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Correcteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom correcteur" name="correcteur" required>
        </div>
			
        </div><br>
	
<!-- ligne 7 archives -->
<div class="w3-row-padding">
	
	    <div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note théorique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_theorique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note pratique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_pratique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Mémoire écrit</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_memoire" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Oral soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_orale" required>
        </div>
	
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Date diplôme</label>
        <input class="w3-input w3-border" type="text" placeholder="mm/aaaa" name="date_diplome" required>
        </div>
			
        </div><br>
	 
	 </div>
	
<!-- onglet documents -->
<div id="docs" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 docs -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
		<div class="w3-col" style="width: 70%">
        <label class="Style211"><i class="fa fa-download" style="font-size:12px;"></i> Document à déposer <em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
		<span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format jpg ou Pdf obligatoire</span></em>
		</label><br /><input type="file" class="w3-input w3-border w3-white" id="myFile" name="filename">
		</div>
			
		<div class="w3-col" style="width: 30%"><br />
		<button class="buttonNav1" style="width:100%"><i class="fa fa-download" style="font-size:18px;"></i> Importer</button>
        </div>
</div>
	
<!-- ligne 2 liste docs -->
<div class="w3-padding-small w3-margin-top">
	<label class="Style211"><i class="fa fa-file" style="font-size:12px;"></i> Documents disponibles :</label>
			
<table id="doc_formateur" class="w3-table-all w3-tiny">
    <tr class="w3-blue">
      <th>Désignation</th>
      <th>Date de dépôt</th>
	  <th class="w3-right-align">Action</th>
    </tr>
    <tr>
      <td><span class="Style29">CV Stéphanie Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Dîplome SFDG S. Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
  </table>
<br />
</div>
	
</div>

<!-- zone Footer -->
<footer class="w3-container w3-round-large">
		  
		  <div class="w3-half">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-remove" style="font-size:20px;"></i> Annuler la modification</button></a>
		  </div>
		  
		  <div class="w3-half">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large w3-right" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-check" style="font-size:20px;"></i> Enregistrer la modification</button></a>
		  </div>
		  
</footer></form>
  </div>
  </div>
  </div>
	
	
<!-- popup fiche stagiaire ggre -->	
  <div id="fiche_stagiaire_ggre" class="w3-modal" style="z-index: 1110; top: 75px;">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large w3-small" style="max-width:900px">

	<div class="w3-left-align">
    <header class="w3-container w3-orange w3-padding-large w3-center w3-round-medium"><span onClick="document.getElementById('fiche_stagiaire_ggre').style.display='none'" class="w3-button w3-display-topright w3-large w3-orange w3-hover-blue w3-round-medium">&times;</span>
	<em class="fa fa-user-circle" style="font-size:24px; color:#ffffff;"></em>
	<span class="Style210"> Fiche stagiaire GGRE</span></header>


<form action="/action_page.php" target="_blank">
	
<!-- zone onglets -->	
<div class="w3-bar w3-border-bottom w3-white w3-padding">
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'stagiaire1')">Fiche principale</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'stagiaire2')">Situation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'stagiaire3')">Formation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'stagiaire4')">Documents</button>
 </div>
		
<!-- onglet fiche principale -->
 <div id="stagiaire1" class="w3-container w3-padding-small w3-light-grey city">

<!-- ligne 1 fiche principale -->	
	    <div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom d'usage" name="nom" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="prénom" name="prenom" required>
        </div>
			
        </div><br>
		
<!-- ligne 2 fiche principale -->
		<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Adresse</label>
        <input class="w3-input w3-border" type="text" placeholder="Numéro + rue" name="adresse" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="code postal" name="code" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="commune" name="ville" required>
        </div>
			
        </div><br>
	 
<!-- ligne 3 fiche principale -->
	    <div class="w3-row-padding">
			
        <div class="w3-half">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="Pays" name="pays" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="10 chiffres" name="phone" required>
        </div>
			
        </div><br>
	 
<!-- ligne 4 fiche principale -->
	    <div class="w3-row-padding">
			
		<div class="w3-half">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="nom@operateur.com" name="mail" required>
        </div>
			
		<div class="w3-half">
         <label class="Style211">Nationalité</label>
         <input class="w3-input w3-border" type="text" placeholder="intitulé pays" name="nationalite" required>
         </div>
			
        </div><br>
		
</div>
	 
<!-- onglet situation stagiaire-->
<div id="stagiaire2" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 situation -->
        <div class="w3-row-padding w3-margin-top">
		<span class="Style30">Pré Inscription :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Diplômes obtenus</label>
        <select class="w3-select w3-border" name="diplome">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">BAC</option>
        <option value="2">BAC+1</option>
		<option value="3">BAC+2</option>
        <option value="4">BAC+3</option>
		<option value="5">BAC+4</option>
        <option value="6">BAC+5</option>
		<option value="7">Equivalent</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date d'obtention</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_valid" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Prérequis Graph.</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">SFDG</option>
		<option value="2">CNPG</option>
        <option value="3">MLCN</option>
		<option value="4">AGBLP</option>
        <option value="5">AGMP</option>
		<option value="6">AGNP</option>
        <option value="7">ALG</option>
		<option value="8">Autres</option>
        </select>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Date prérequis</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="date_valid" required>
        </div>
			
        </div><br>
		
<!-- ligne 2 situation -->
		<div class="w3-row-padding w3-margin-top w3-margin-bottom">
        <div class="w3-col">
         <label class="Style211">Situation professionnelle avant la formation</label>
         <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
		</div>
        </div><br>
		
<!-- ligne 3 situation -->
        <div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Inscription :</span><br /><br />
			
        <div class="w3-third">
         <label class="Style211">Réception dossier</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Date validation entretien</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="val_entretien" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°1 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_1" required>
        </div>
			
        </div><br>
		
<!-- ligne 4 situation -->
        <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Procédure N°1 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 ENVOI</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_2" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Procédure N°2 RECEPTION</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="Proced_recep2" required>
        </div>
			
        </div><br>
	
<!-- ligne 5 situation -->
        <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Situation de handicap</label>
        <select class="w3-select w3-border" name="handicap">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
		</select>
        </div>
			
		<div class="w3-third">
         <label class="Style211">Aménagements requis</label>
        <textarea class="w3-input w3-border w3-white" style="width:100%; height:75px" placeholder="3 lignes maximum" type="text" name="form_continue" required></textarea>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Pôle de formation</label>
        <select class="w3-select w3-border" name="handicap">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Paris</option>
        <option value="2">Lyon</option>
		</select>
        </div>
			
        </div><br>
	 
</div>
	
<!-- onglet formation stagiaire-->
<div id="stagiaire3" class="w3-container w3-padding-small w3-light-grey city">
	 		
<!-- ligne 1 formation -->
<div class="w3-row-padding w3-margin-top">
		<span class="Style30">Formation :</span><br /><br />
			
        <div class="w3-quarter">
        <label class="Style211">Année Promo GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="promo_GGRE" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Effectif de la promotion</label>
        <input class="w3-input w3-border" type="text" placeholder="nombre" name="effectif" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Tuteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom tuteur" name="tuteur" required>
        </div>
			
		<div class="w3-quarter">
        <label class="Style211">Correcteur</label>
        <input class="w3-input w3-border" type="text" placeholder="nom correcteur" name="correcteur" required>
        </div>
			
        </div><br>
	
<!-- ligne 2 formation -->
<div class="w3-row-padding">
	
	    <div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note théorique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_theorique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Note pratique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_pratique" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Mémoire écrit</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_memoire" required>
        </div>
			
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Oral soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/40" name="note_orale" required>
        </div>
	
		<div class="w3-col w3-container" style="width:20%">
        <label class="Style211">Résultat final</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Diplômé(e)</option>
		<option value="2">Abandon</option>
        <option value="3">Redoublement</option>
		<option value="4">Ajournement</option>
        </select>
        </div>
			
        </div><br>
	
<!-- ligne 1 trésorerie -->
<div class="w3-row-padding w3-margin-top w3-border-top">
		<span class="Style30">Trésorerie :</span><br /><br />
			
        <div class="w3-half">
        <label class="Style211">Acompte inscription</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Payée</option>
        <option value="2">Non payée</option>
        </select>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prise en charge</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
		<option value="2">En cours</option>
        </select>
        </div>

        </div><br>
	
<!-- ligne 2 trésorerie -->
<div class="w3-row-padding">
			
		<div class="w3-quarter">
        <label class="Style211">Année 1 versement 1</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_1" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année 1 versement 2</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_2" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année 1 versement 3</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_3" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année 2 versement 4</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_3" required>
        </div>
        </div><br>
	 
</div>
	
<!-- onglet documents stagiaire-->
<div id="stagiaire4" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 docs -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
		<div class="w3-col" style="width: 70%">
        <label class="Style211"><i class="fa fa-download" style="font-size:12px;"></i> Document à déposer <em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
		<span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format jpg ou Pdf obligatoire</span></em>
		</label><br /><input type="file" class="w3-input w3-border w3-white" id="myFile" name="filename">
		</div>
			
		<div class="w3-col" style="width: 30%"><br />
		<button class="buttonNav1" style="width:100%"><i class="fa fa-download" style="font-size:18px;"></i> Importer</button>
        </div>
</div>
	
<!-- ligne 2 liste docs -->
<div class="w3-padding-small w3-margin-top">
	<label class="Style211"><i class="fa fa-file" style="font-size:12px;"></i> Documents disponibles :</label>
			
<table id="doc_formateur" class="w3-table-all w3-tiny">
    <tr class="w3-blue">
      <th>Désignation</th>
      <th>Date de dépôt</th>
	  <th class="w3-right-align">Action</th>
    </tr>
    <tr>
      <td><span class="Style29">CV Stéphanie Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Dîplome SFDG S. Durand</span></td>
      <td>23/01/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
  </table>
<br />
</div>
</div>


<!-- zone Footer -->
<footer class="w3-container w3-round-large">
	  
		  <div class="w3-third">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-remove" style="font-size:20px;"></i> Annuler la modification</button></a>
		  </div>
	  
		  <div class="w3-third">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-edit" style="font-size:20px;"></i> Transformer en membre</button></a>
		  </div>
	  
		  <div class="w3-third">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large w3-right" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-check" style="font-size:20px;"></i> Enregistrer la modification</button></a>
		  </div>
	  
</footer></form>

    </div>
    </div>
  </div>
	
	
	
<!-- Bouton Export -->
<div class="w3-display-bottomright" style="bottom:20px; right:32px">
<a onclick="document.getElementById('export_adherent').style.display='block'">
<button class="buttonNav1" style="width:300px"><i class="fa fa-upload" style="font-size:18px;"></i> Exporter la base Adherents</button></a>
</div>
	
<!-- Bouton Import -->
<div class="w3-display-bottommiddle" style="bottom:20px;">
<a onclick="document.getElementById('import_adherent').style.display='block'">
<button class="buttonNav1" style="width:300px"><i class="fa fa-download" style="font-size:18px;"></i> Importer une base Adherents</button></a>
</div>
	
<!-- Bouton filtration affichage -->
<div class="w3-display-bottomleft dropdown" style="bottom:20px; left:32px">
	<button class="buttonNav1" style="width:200px"><i class="fa fa-eye" style="font-size:18px;"></i> Filtrer l'affichage</button>
	
	<div class="dropdown-content w3-small" style="width:200px">
    <a href="#">Adhérents actifs</a>
    <a href="#">Adhérents inactifs</a>
    <a href="#">Stagiaires</a>
	<a href="#">Région 1</a>
    <a href="#">Région 2</a>
    <a href="#">Région 3</a>
  </div>

</div>
	
<!-- popup export Adherent -->	
<div id="export_adherent" class="w3-modal" style="z-index: 1110; top: 100px;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:500px">

		<div class="w3-left-align">
      <header class="w3-container w3-orange w3-padding w3-center w3-text-white"> 
        <span onclick="document.getElementById('export_adherent').style.display='none'" 
        class="w3-button w3-orange w3-hover-blue w3-display-topright">&times;</span>
		  <span class="Style600"><i class="fa fa-user-circle-o"></i> Exporter la base adhérents</span></header>
      <div class="w3-container w3-padding-small"><br>

	<select class="w3-select" name="option">
    <option value="" disabled selected>Filtrer par critères :</option>
    <option value="1">Adhérents actifs</option>
	<option value="1">Adhérents inactifs</option>
	<option value="1">Stagiaires</option>
    <option value="2">Région 1</option>
    <option value="3">Région 2</option>
	<option value="3">Région 3</option>
          </select>
    <br><br>
      </div>
      <footer class="w3-container w3-round-large w3-center"><a href=""><button class="buttonNav1" style="width:300px"><i class="fa fa-upload" style="font-size:18px;"></i> Exporter au format CSV</button></a><br /><br /></footer>
    </div>
  </div>

    </div>
	
<!-- popup import Adherent -->	
<div id="import_adherent" class="w3-modal" style="z-index: 1110; top: 100px;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:550px">

	<div class="w3-left-align">
    <header class="w3-container w3-orange w3-padding w3-center w3-text-white"> 
        <span onclick="document.getElementById('import_adherent').style.display='none'" 
        class="w3-button w3-orange w3-hover-blue w3-display-topright">&times;</span>
		  <span class="Style600"><i class="fa fa-user-circle-o"></i> Importer une base adhérents</span
	</header>
		
    <div class="w3-container w3-padding-large"><br>
	<label class="style40">Sélectionner un fichier : 
	<em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
    <span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format CSV obligatoire</span></em></label>
	<br><input type="file" class="w3-input w3-border style1" id="myFile" name="filename">
	</div>
		
    <footer class="w3-container w3-round-large w3-center"><a href=""><button class="buttonNav1" style="width:300px"><i class="fa fa-download" style="font-size:18px;"></i> Importer au format CSV</button></a><br /><br /></footer>
    </div>
  </div>

    </div>
	
	
	
</div>
	
	
<!-- fin layer global -->
</div>
	
<!-- Sidebar Filtration -->
<div id="Sidebar_filtration">
	
<div class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-card-2 w3-round-medium" style="display:none; height:300px; width:300px" id="mySidebar">
<div class="w3-container w3-blue w3-padding"><i class="fa fa-search"></i> Recherche Adhérent
  <button class="w3-button w3-blue w3-hover-orange w3-display-topright" onclick="w3_close()">&times;</button></div>

	
<div class="w3-container">
 <p><label>Adhérent :</label>
  <input class="w3-input w3-border w3-round" name="date_start" type="text" placeholder="Nom"></p>
   <p><label>Région :</label>
  <input class="w3-input w3-border w3-round" name="date_end" type="text" placeholder="Code postal"></p>
</div><br>
	
<footer class="w3-container w3-border-top w3-light-grey w3-padding">
<button class="buttonNav2b" style="width:45%"><i class="fa fa-upload" style="font-size:14px;"></i> Exporter</button>
<button class="buttonNav2b" style="width:45%"><i class="fa fa-eye" style="font-size:14px;"></i> Afficher</button><br>
</footer>
</div>
	
  <button class="w3-button w3-orange w3-xlarge w3-hover-blue w3-round-medium" onclick="w3_open()"><i class="fa fa-search"></i></button>
</div>
	
	
<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
	
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
	
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-orange");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-orange");
}
</script>
	
	
<div id="mySidenav" class="sidenav">
  <a href="GGRE-connect-ADMIN.php" id="Back_home" title="Déconnexion"><i class="fa fa-sign-out"></i></a>
  <a href="https://forum.ggre-asso.fr/" id="Forum" target="_blank" title="Accès Forum"><i class="fa fa-comments"></i></a>
</div>
<div id="bandeausup"></div>

</body>
</html>
