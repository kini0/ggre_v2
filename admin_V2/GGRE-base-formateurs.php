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
	
#table_formateur {
  height: 400px;
  background-color: #ffffff;
  overflow-y: scroll; /* Add the ability to scroll */
}

/* Hide scrollbar for Chrome, Safari and Opera */
#table_formateur::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#table_formateur {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
	
#table_formateur th {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: bold;
	        color: #fff;
	        padding:10;
        }
	
#table_formateur td {
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
	
<em class="fa fa-graduation-cap" style="font-size:26px; color:#133090;"></em> <span class="Style210">Base Formateurs GGRE</span>
	
<!-- zone Boutons création fiches -->
<div class="w3-display-topmiddle" style="top:6px; width: 550px;">
		
	<div class="w3-half w3-right-align">
	<a onclick="document.getElementById('crea_fiche_formateur_ggre').style.display='block'"><button class="buttonNav2b"><i class="fa fa-edit" style="font-size:12px;"></i> Créer une fiche Formateur</button></a></div>
	
	</div>
	
<div class="w3-display-topright" style="top:20px; right:32px">
<a href="GGRE-admin-sommaire.php"><em class="fa fa-arrow-left" style="font-size:18px;"></em> Retour Sommaire Administration</a>
</div>
	
	
<!-- table formateurs GGRE -->
<div id="table_formateur" class="w3-border w3-margin">
	<table class="w3-table w3-striped w3-bordered w3-hoverable w3-tiny">
    <thead>
      <tr class="w3-blue">
        <th>Nom Prénom <i class="fa fa-sort"></i></th>
        <th>Profession <i class="fa fa-sort"></i></th>
		<th>Trésorerie <i class="fa fa-sort"></i></th>
		<th>Région <i class="fa fa-sort"></i></th>
		<th class="w3-right-align">Action</th>
      </tr>
    </thead>
    <tr>
	  <td><span class="Style211">Noémie Maitre</span></td>
      <td><i class="fa fa-graduation-cap" style="font-size:12px; color:green"></i> Sophrologue</td>
	  <td><i class="fa fa-check" style="font-size:12px; color:green"></i> Facture acquittée année 1</td>
	  <td><i class="fa fa-location-arrow" style="font-size:12px; color:gray"></i> Lyon</td>
	  <td class="w3-right-align"><a onclick="document.getElementById('fiche_adherent_ggre').style.display='block'"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></a></td>
    </tr>
    <tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
    <tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"></span></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
  </table>
</div>
	
	
<!-- popup formulaire création fiche formateur ggre -->	
  <div id="crea_fiche_formateur_ggre" class="w3-modal" style="z-index: 1110; top: 75px;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:850px">

	 <div class="w3-left-align w3-small">
      <header class="w3-container w3-orange w3-padding-large w3-center w3-round-medium"><span onClick="document.getElementById('crea_fiche_formateur_ggre').style.display='none'" class="w3-button w3-display-topright w3-large w3-orange w3-hover-blue w3-round-medium">&times;</span>
	  <em class="fa fa-graduation-cap" style="font-size:24px; color:#ffffff;"></em>
		  <span class="Style210"> Fiche Création Formateur GGRE</span></header>
		 
<form action="/action_page.php" target="_blank">
	
<!-- zone onglets -->	
<div class="w3-bar w3-border-bottom w3-white w3-padding">
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_formateur1')">Fiche principale</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_formateur2')">Situation</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_factures')">Factures</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_contrats')">Contrats</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'crea_docs')">Autres documents</button>
 </div>
		
<!-- onglet fiche principale -->
 <div id="crea_formateur1" class="w3-container w3-padding-small city w3-border-bottom" style="background-color: #e5e7fe">

<!-- ligne 1 -->	
	    <div class="w3-row-padding">
			
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Maitre" name="nom" required>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="Noémie" name="prenom" required>
        </div>
        </div><br>
	 
		
<!-- ligne 2 -->
		<div class="w3-row-padding">
			
		<div class="w3-half">
        <label class="Style211">Statut</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Formateur interne</option>
        <option value="2">Formateur externe</option>
        </select>
        </div>
			
		<div class="w3-half">
        <label class="Style211">Site Formation</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un lieu</option>
        <option value="1">Paris</option>
        <option value="2">Lyon</option>
        </select>
        </div>
			
        </div><br>
	 
		
<!-- ligne 3 -->
		<div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Adresse</label>
        <input class="w3-input w3-border" type="text" placeholder="334 route de pommier de beaurepaire" name="adresse" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="38270" name="code postal" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="Pisieu" name="commune" required>
        </div>
			
        </div><br>
		
	 
<!-- ligne 4 -->
	    <div class="w3-row-padding">
			
        <div class="w3-third">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="France" name="pays" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="06 16 97 57 24" name="phone" required>
        </div>
			
		<div class="w3-third">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="turquoise.emeraude@free.fr" name="mail" required>
        </div>
			
        </div><br>
	 
		
</div>
	 
<!-- onglet fiche complément -->
<div id="crea_formateur2" class="w3-container w3-padding-small city w3-border-bottom" style="background-color: #e5e7fe">
	
		
<!-- ligne 5 -->
		<div class="w3-row-padding">
        <div class="w3-half">
         <label class="Style211">Activité Pro.</label>
        <select class="w3-select w3-border" name="activite_pro" style="background-color: #bfc3f4">
        <option value="activ_pro" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-half">
        <label class="Style211">Profession</label>
        <input class="w3-input w3-border" type="text" placeholder="Ecrire la profession" name="profession" required>
        </div>
        </div><br>
				
<!-- ligne 6 -->
		<div class="w3-row-padding w3-margin-top w3-border-top"><br />
		<span class="Style30">Trésorerie :</span><br /><br />
        <div class="w3-third">
        <label class="Style211">Honoraires année 1 semestre 1</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_hon1" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Honoraires année 1 semestre 2</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_hon2" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Facture acquittée année 1</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
        </div><br>
	
<!-- ligne 7 -->
		<div class="w3-row-padding">

        <div class="w3-third">
        <label class="Style211">Honoraires année 2 semestre 1</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_hon1" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Honoraires année 2 semestre 2</label>
        <input class="w3-input w3-border" type="text" placeholder="00€" name="montant_hon2" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Facture acquittée année 2</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
        </div><br>
	
</div>
	
<!-- onglet factures -->
<div id="crea_factures" class="w3-container w3-padding-small city w3-border-bottom" style="background-color: #e5e7fe">
	 
<!-- ligne 1 dépôt facture -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
		<div class="w3-col" style="width: 70%">
        <label class="Style211"><i class="fa fa-download" style="font-size:12px;"></i> Facture à déposer <em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
		<span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format jpg ou Pdf obligatoire</span></em>
		</label><br /><input type="file" class="w3-input w3-border w3-white" id="myFile" name="filename">
		</div>
			
		<div class="w3-col" style="width: 30%"><br />
		<button class="buttonNav1" style="width:100%"><i class="fa fa-download" style="font-size:18px;"></i> Importer</button>
        </div>
</div>
	
<!-- ligne 2 liste facture -->
<div class="w3-padding-small w3-margin-top">
	<label class="Style211"><i class="fa fa-file" style="font-size:12px;"></i> Factures disponibles :</label>
			
<table id="facture_formateur" class="w3-table-all w3-tiny">
    <tr class="w3-blue">
      <th>Désignation</th>
      <th>Date de dépôt</th>
	  <th class="w3-right-align">Action</th>
    </tr>
    <tr>
      <td><span class="Style29">Facture février 2022</span></td>
      <td>02/02/2022</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Facture octobre 2021</span></td>
      <td>03/10/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Facture avril 2021</span></td>
      <td>02/04/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
  </table>
<br />
</div>
	
</div>
	
<!-- onglet contrats -->
<div id="crea_contrats" class="w3-container w3-padding-small city w3-border-bottom" style="background-color: #e5e7fe">
	 
<!-- ligne 1 dépôt contrats -->
<div class="w3-row-padding w3-margin-top w3-margin-bottom">
			
		<div class="w3-col" style="width: 70%">
        <label class="Style211"><i class="fa fa-download" style="font-size:12px;"></i> Contrat à déposer <em class="fa fa-info-circle w3-tooltip" style="color:#f59331">
		<span style="position: absolute;left: 10px;bottom: 0px; width: 100px" class="w3-text w3-tag w3-orange w3-round w3-padding-small style19">Format jpg ou Pdf obligatoire</span></em>
		</label><br /><input type="file" class="w3-input w3-border w3-white" id="myFile" name="filename">
		</div>
			
		<div class="w3-col" style="width: 30%"><br />
		<button class="buttonNav1" style="width:100%"><i class="fa fa-download" style="font-size:18px;"></i> Importer</button>
        </div>
	
</div>
	
<!-- ligne 2 liste contrats -->
<div class="w3-padding-small w3-margin-top">
	<label class="Style211"><i class="fa fa-file" style="font-size:12px;"></i> Contrats disponibles :</label>
			
<table id="contrat_formateur" class="w3-table-all w3-tiny">
    <tr class="w3-blue">
      <th>Désignation</th>
      <th>Date de dépôt</th>
	  <th class="w3-right-align">Action</th>
    </tr>
    <tr>
      <td><span class="Style29">Contrat Janvier 2022</span></td>
      <td>02/01/2022</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Contrat Septembre 2021</span></td>
      <td>03/09/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
    <tr>
      <td><span class="Style29">Contrat Mars 2021</span></td>
      <td>01/03/2021</td>
	  <td class="w3-right-align"><button class="buttonNav3b"><i class="fa fa-file-pdf-o" style="font-size:11px;"></i> Ouvrir</button></td>
    </tr>
  </table>
<br />
</div>
	
</div>
	 	
<!-- onglet documents -->
<div id="crea_docs" class="w3-container w3-padding-small city w3-border-bottom" style="background-color: #e5e7fe">
	 
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
	
	
<!-- Bouton Export -->
<div class="w3-display-bottomright" style="bottom:20px; right:32px">
<a onclick="document.getElementById('export_formateurs').style.display='block'">
<button class="buttonNav1" style="width:300px"><i class="fa fa-upload" style="font-size:18px;"></i> Exporter la base formateurs</button></a>
</div>
	
	
<!-- Bouton filtration affichage -->
<div class="w3-display-bottomleft dropdown" style="bottom:20px; left:32px">
	<button class="buttonNav1" style="width:200px"><i class="fa fa-eye" style="font-size:18px;"></i> Filtrer l'affichage</button>
	
	<div class="dropdown-content w3-small" style="width:200px">
	<a href="#">Formateurs INT Paris</a>
    <a href="#">Formateurs INT Lyon</a>
	<a href="#">Formateurs EXT Paris</a>
    <a href="#">Formateurs EXT Lyon</a>
  </div>

</div>
	
<!-- popup export Formateurs -->	
<div id="export_formateurs" class="w3-modal" style="z-index: 1110; top: 100px;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:500px">

		<div class="w3-left-align">
      <header class="w3-container w3-orange w3-padding w3-center w3-text-white"> 
        <span onclick="document.getElementById('export_formateurs').style.display='none'" 
        class="w3-button w3-orange w3-hover-blue w3-display-topright">&times;</span>
		  <span class="Style600"><i class="fa fa-user-circle-o"></i> Exporter la base formateurs</span></header>
      <div class="w3-container w3-padding-small"><br>

	<select class="w3-select" name="option">
    <option value="" disabled selected>Filtrer par critères :</option>
	<option value="1">Formateurs internes</option>
	<option value="2">Formateurs externes</option>
    <option value="3">Région Paris</option>
    <option value="4">Région Lyon</option>
          </select>
    <br><br>
      </div>
      <footer class="w3-container w3-round-large w3-center"><a href=""><button class="buttonNav1" style="width:300px"><i class="fa fa-upload" style="font-size:18px;"></i> Exporter au format CSV</button></a><br /><br /></footer>
    </div>
  </div>

    </div>
	
	
	
	
</div>
	
	
<!-- fin layer global -->
</div>
	
<!-- Sidebar Filtration -->
<div id="Sidebar_filtration">
	
<div class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-card-2 w3-round-medium" style="display:none; height:300px; width:300px" id="mySidebar">
<div class="w3-container w3-blue w3-padding"><i class="fa fa-search"></i> Recherche Formateurs
  <button class="w3-button w3-blue w3-hover-orange w3-display-topright" onclick="w3_close()">&times;</button></div>

	
<div class="w3-container">
 <p><label>Nom :</label>
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
