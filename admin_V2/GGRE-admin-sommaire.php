<?php 
    session_start();
    require_once 'db.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['username'])){
        header('Location: GGRE-connect-ADMIN.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM users WHERE username = ?');
    $req->execute(array($_SESSION['username']));
    $data = $req->fetch();
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" type="image/x-icon" href="images/ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/ggre-favicon.ico" /><![endif]-->
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

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
	        padding:16;
        }
	
#table_adherent td {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: normal;
	        color: #000;
	        padding:16;
        }
	
#table_activites {
  height: 400px;
  overflow-y: scroll; /* Add the ability to scroll */
}

/* Hide scrollbar for Chrome, Safari and Opera */
#table_activites::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#table_activites {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
	
#activites table th {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: bold;
	        color: #fff;
	        padding:16;
        }
	
#activites  table td {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: normal;
	        color: #000;
	        padding:16;
        }
	
#lettre table th {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: bold;
	        color: #fff;
	        padding:16;
        }
	
#lettre table td {
            font-family: "Verdana", Helvetica, Arial, sans-serif;
	        font-size:12px;
	        font-weight: normal;
	        color: #000;
	        padding:16;
        }
	
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

</style>
</head>

<body>
<div id="Layer_global" style="position:relative; margin: 0 auto; width:1307px; height:800px;">
	
<!-- zone Header -->
<div id="Tete_BN" class="w3-container w3-center">
	<div id="logo"><a href="GGRE-connect-BN.php"><img src="images/GGRE-V2-logo.png" width="130" title="retour accueil" /></a></div>
	<div id="Titre"><span class="Style500">Administration site et annuaire GGRE</span><br />
		
<!-- Bloc Administrateur -->
	<table>
      <tr>
        <td width="110" align="left">Bienvenue :</td>
        <td align="left">
            <strong>
                <?php echo $data['username']; ?> Membres du Bureau !
            </strong>
        </td>
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
	

<!-- zone Contenu -->
<div id="Base_Contenu" class="w3-container w3-padding-large">
	
<!-- zone Adhérents GGRE -->
<div id="adherent" class="w3-col w3-container w3-margin w3-white w3-center w3-padding w3-round w3-card-4" style="width:35%; height: 460px;"><em class="fa fa-user-circle" style="font-size:24px; color:#f59331;"></em> <span class="Style210">Adhérents GGRE</span>
	
	<div id="table_adherent" class="w3-border">
	<table class="w3-table w3-striped w3-hoverable" style="height: 450px">
    <thead>
      <tr class="w3-blue">
        <th>Nom <i class="fa fa-sort"></i></th>
        <th>Etat <i class="fa fa-sort"></i></th>
		<th class="w3-right-align">Action</th>
      </tr>
    </thead>
    <tr>
		<td><span class="Style211">Caroline Baguenault<br />de Puchesse</span></td>
      <td><i class="fa fa-check" style="font-size:12px; color:green"></i> Actif</td>
	  <td class="w3-right-align"><a onclick="document.getElementById('fiche_adherent_ggre').style.display='block'"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></a></td>
    </tr>
    <tr>
      <td><span class="Style211">Dominique<br />Andrieu-Moutard</span></td>
      <td><i class="fa fa-check" style="font-size:12px; color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Odeline Phion</span></td>
      <td><i class="fa fa-exclamation-triangle" style="font-size:12px; color:red"></i> Stagiaire</td>
	  <td class="w3-right-align"><a onclick="document.getElementById('fiche_stagiaire_ggre').style.display='block'"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></a></td>
    </tr>
    <tr>
      <td><span class="Style211">Elisabeth Lambert</span></td>
      <td><i class="fa fa-times" style="font-size:12px; color:red"></i> Inactif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Caroline Massyn</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Céline Péron</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Anne de Labouret</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Anne-Marie Rebut</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Caroline Chamorel</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211">Valérie Brachet</span></td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
  </table>
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
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'adherent2')">Complément</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'archives')">Archives</button>
 </div>
		
<!-- onglet fiche principale -->
 <div id="adherent1" class="w3-container w3-padding-small w3-light-grey city">

<!-- ligne 1 -->	
	    <div class="w3-row-padding">
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Baguenault de Puchesse" name="nom" required>
        </div>
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="Caroline" name="prenom" required>
        </div>
        </div><br>
		
<!-- ligne 2 -->
		<div class="w3-row-padding">
        <div class="w3-third">
        <label class="Style211">Numéro adhérent</label>
        <input class="w3-input w3-border" type="text" placeholder="10" name="num" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Statut</label>
        <input class="w3-input w3-border" type="text" placeholder="Membre actif" name="statut" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Annuaire</label>
        <input class="w3-input w3-border" type="text" placeholder="Oui" name="annuaire" required>
        </div>
        </div><br>
		
<!-- ligne 3 -->
		<div class="w3-row-padding">
        <div class="w3-third">
         <label class="Style211">Adresse 1</label>
        <input class="w3-input w3-border" type="text" placeholder="Domaine de Puchesse" name="adresse" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="45640" name="code" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="SANDILLON" name="ville" required>
        </div>
        </div><br>
		
<!-- ligne adresse 2 -->
		    <button class="buttonNav3 w3-margin-left" onclick="myFunction('adresse2')"><i class="fa fa-edit" style="font-size:12px;"></i> Saisir adresse 2</button><br />
			<div id="adresse2" class="w3-row-padding w3-hide">
			<div class="w3-third">
            <label class="Style211">Adresse 2</label>
            <input class="w3-input w3-border" type="text" placeholder="Domaine de Puchesse" name="adresse" required>
            </div>
		    <div class="w3-third">
            <label class="Style211">Code postal</label>
            <input class="w3-input w3-border" type="text" placeholder="45640" name="code" required>
            </div>
		    <div class="w3-third">
            <label class="Style211">Commune</label>
            <input class="w3-input w3-border" type="text" placeholder="SANDILLON" name="ville" required>
            </div>
			</div><br>
	 
<!-- ligne 4 -->
	    <div class="w3-row-padding">
        <div class="w3-third">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="France" name="phone" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="06 09 86 45 66" name="prix" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="carolinebaguenault@gmail.com" name="stock" required>
        </div>
        </div><br>
	 
 <!-- ligne 5 -->
	    <div class="w3-row-padding">
        <div class="w3-third">
         <label class="Style211">Site Internet</label>
        <input class="w3-input w3-border" type="text" placeholder="www.nomdusite.com" name="phone" required>
        </div>
			
		<div class="w3-third">
         <label class="Style211">AFEP</label>
        <input class="w3-input w3-border" type="text" placeholder="Oui" name="phone" required>
        </div>
			
		<div class="w3-third">
         <label class="Style211">Alerte Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="Oui" name="phone" required>
        </div>
        </div><br>
		
</div>
	 
<!-- onglet fiche complément -->
<div id="adherent2" class="w3-container w3-padding-small w3-light-grey city">
	
		
<!-- ligne 5 -->
		<div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">Cotisation GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="14/01/2021" name="cotisation" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Assurance GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="Oui" name="assurance" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Situation Pro.</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Actif</option>
        <option value="2">Inactif</option>
		<option value="1">Retraité</option>
        <option value="2">Membre d'honneur</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année Promo GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="1999" name="promo" required>
        </div>
        </div><br>
		
<!-- ligne 6 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">Région</label>
        <input class="w3-input w3-border" type="text" placeholder="Centre Val-de-Loire" name="region" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Découpage GGRE</label>
        <input class="w3-input w3-border" type="text" placeholder="2" name="decoupage" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Diplôme</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un Diplôme</option>
        <option value="1">SFPG</option>
        <option value="2">AGA</option>
		<option value="1">ALG</option>
        <option value="2">AGBLP</option>
		<option value="2">AGNP</option>
		<option value="2">Autres</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Certification</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
        </div><br>
		
<!-- ligne 7 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">ID Extranet</label>
        <input class="w3-input w3-border" type="text" placeholder="Presidence" name="ID_extranet" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">MdP Extranet</label>
        <input class="w3-input w3-border" type="text" placeholder="toto" name="MdP_extranet" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">ID Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="Baguenault" name="ID_forum" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">MdP Forum</label>
        <input class="w3-input w3-border" type="text" placeholder="titi" name="MdP_forum" required>
        </div>
        </div><br>
	
</div>
	 
<!-- onglet archives -->
<div id="archives" class="w3-container w3-padding-small w3-light-grey city">
	 
<!-- ligne 1 archives -->
        <div class="w3-row-padding w3-margin-top">
        <div class="w3-quarter">
         <label class="Style211">Réception dossier</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Date validation</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_valid" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Prise en charge</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Prérequis</label>
        <select class="w3-select w3-border" name="prerequis">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">MLC</option>
        <option value="2">Autres</option>
        </select>
        </div>
        </div><br>
		
<!-- ligne 2 archives -->
		<div class="w3-row-padding w3-margin-top w3-border-top">
        <div class="w3-quarter">
         <label class="Style211">Inscription envoi</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="inscription" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Inscription réception</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="reception" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Acompte réception</label>
        <select class="w3-select w3-border" name="acompte">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Cotisation réception</label>
        <select class="w3-select w3-border" name="cotisation">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
        </div><br>
		
<!-- ligne 3 archives -->
        <div class="w3-row-padding w3-margin-top w3-border-top">
        <div class="w3-quarter">
         <label class="Style211">Divers inscription</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="divers" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année de promotion</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="annee_promotion" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">QS année 1</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="QS1" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Qs année 2</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="QS2" required>
        </div>
        </div><br>
		
<!-- ligne 4 archives-->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">Note examen théorique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="exam_theo" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Note examen pratique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="exam_prat" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Tuteur</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom"name="tuteur" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Correcteur</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom" name="correcteur" required>
        </div>
        </div><br>
		
<!-- ligne 5 archives -->
		<div class="w3-row-padding">
        <div class="w3-quarter">
        <label class="Style211">Date soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_soutenance" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Note mémoire</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_memoire" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Note soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_soutenance" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Mention soutenance</label>
        <select class="w3-select w3-border" name="mention">
        <option value="" disabled selected>Choisir une mention</option>
        <option value="1">Passable</option>
        <option value="2">Assez bien</option>
		<option value="3">Bien</option>
        <option value="4">Très bien</option>
		</select>
        </div>
        </div><br>
	 
	 </div>

<!-- zone Footer -->
      <footer class="w3-container w3-round-large">
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
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'stagiaire1')">Fiche stagiaire principale</button>
   <button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'stagiaire2')">Fiche stagiaire complémentaire</button>
	<button class="tablink w3-bar-item buttonNav1" onclick="openCity(event, 'commentaire')">Commentaires et divers</button>
 </div>
		
<!-- onglet fiche stagiaire 1 -->
 <div id="stagiaire1" class="w3-container w3-padding-small w3-light-grey city">
<!-- ligne 1 -->	
	    <div class="w3-row-padding">
        <div class="w3-half">
        <label class="Style211">Nom</label>
        <input class="w3-input w3-border" type="text" placeholder="Phion" name="nom" required>
        </div>
		<div class="w3-half">
        <label class="Style211">Prénom</label>
        <input class="w3-input w3-border" type="text" placeholder="Odeline" name="prenom" required>
        </div>
        </div><br>

<!-- ligne 2 -->
		<div class="w3-row-padding">
        <div class="w3-third">
         <label class="Style211">Adresse</label>
        <input class="w3-input w3-border" type="text" placeholder="numéro + rue" name="adresse" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Code postal</label>
        <input class="w3-input w3-border" type="text" placeholder="00000" name="code" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Commune</label>
        <input class="w3-input w3-border" type="text" placeholder="ville" name="ville" required>
        </div>
        </div><br>
		
<!-- ligne 3 -->
	    <div class="w3-row-padding">
        <div class="w3-third">
         <label class="Style211">Pays</label>
        <input class="w3-input w3-border" type="text" placeholder="pays" name="pays" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Téléphone</label>
        <input class="w3-input w3-border" type="text" placeholder="00 00 00 00 00" name="phone" required>
        </div>
		<div class="w3-third">
        <label class="Style211">Mail</label>
        <input class="w3-input w3-border" type="text" placeholder="xx@xx" name="mail" required>
        </div>
        </div><br>
		
<!-- ligne 4 -->
        <div class="w3-row-padding w3-margin-top w3-border-top">
        <div class="w3-quarter">
         <label class="Style211">Réception dossier</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="recep_dossier" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Date validation</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_valid" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Prise en charge</label>
        <select class="w3-select w3-border" name="charge">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Prérequis</label>
        <select class="w3-select w3-border" name="prerequis">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">MLC</option>
        <option value="2">Autres</option>
        </select>
        </div>
        </div><br>
</div>
		
<!-- onglet fiche stagiaire 2 -->
 <div id="stagiaire2" class="w3-container w3-padding-small w3-light-grey city">
		
<!-- ligne 5 -->
		<div class="w3-row-padding w3-margin-top">
        <div class="w3-quarter">
         <label class="Style211">Inscription envoi</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="inscription" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Inscription réception</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="reception" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Acompte réception</label>
        <select class="w3-select w3-border" name="acompte">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Cotisation réception</label>
        <select class="w3-select w3-border" name="cotisation">
        <option value="" disabled selected>Choisir un cas</option>
        <option value="1">Oui</option>
        <option value="2">Non</option>
        </select>
        </div>
        </div><br>
		
<!-- ligne 6 -->
        <div class="w3-row-padding w3-margin-top w3-border-top">
        <div class="w3-quarter">
         <label class="Style211">Divers inscription</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="divers" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Année de promotion</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="annee_promotion" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">QS année 1</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="QS1" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Qs année 2</label>
        <input class="w3-input w3-border" type="text" placeholder="aaaa" name="QS2" required>
        </div>
        </div><br>
		
<!-- ligne 7 -->
        <div class="w3-row-padding">
        <div class="w3-quarter">
         <label class="Style211">Note examen théorique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="exam_theo" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Note examen pratique</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="exam_prat" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Tuteur</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom"name="tuteur" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Correcteur</label>
        <input class="w3-input w3-border" type="text" placeholder="Nom" name="correcteur" required>
        </div>
        </div><br>
		
<!-- ligne 8 -->
		<div class="w3-row-padding">
        <div class="w3-quarter">
        <label class="Style211">Date soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="jj/mm/aaaa" name="date_soutenance" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Note mémoire</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_memoire" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Note soutenance</label>
        <input class="w3-input w3-border" type="text" placeholder="XX/20" name="note_soutenance" required>
        </div>
		<div class="w3-quarter">
        <label class="Style211">Mention soutenance</label>
        <select class="w3-select w3-border" name="mention">
        <option value="" disabled selected>Choisir une mention</option>
        <option value="1">Passable</option>
        <option value="2">Assez bien</option>
		<option value="3">Bien</option>
        <option value="4">Très bien</option>
		</select>
        </div>
        </div><br>
</div>
		
<!-- onglet fiche commentaires -->
 <div id="commentaire" class="w3-container w3-padding-small w3-light-grey city">
		
<!-- ligne commentaires -->
		<div class="w3-row-padding w3-margin-top">
        <label class="Style211">Commentaires et divers</label><br /><br />
        <textarea id="subject" class="w3-round-small" name="subject" placeholder="Commentaires au sujet du stagiaire..." style="height:200px, width:850px,"></textarea><br /><br />
        </div>
        </div><br>


<!-- zone Footer -->
      <footer class="w3-container w3-round-large">
		  <div class="w3-third">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-remove" style="font-size:20px;"></i> Annuler la création</button></a>
		  </div>
		  <div class="w3-third">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-edit" style="font-size:20px;"></i> Transformer en membre</button></a>
		  </div>
		  <div class="w3-third">
		  <a href="#"><button class="buttonNav1 w3-section w3-block w3-round-large w3-right" style="width: 90%; color:#fff" type="submit"> <i class="fa fa-check" style="font-size:20px;"></i> Enregistrer la création</button></a>
		  </div>
		</footer></form>

    </div>
    </div>
  </div>
	
	
</div>
	
<!-- zone Journal des activités -->
<div id="activites" class="w3-col w3-container w3-margin w3-white w3-center w3-padding w3-round w3-card-4"
  style="width:31%; height: 460px;"><em class="fa fa-newspaper-o" style="font-size:24px; color:#f59331;"></em> <span class="Style210">Journal des activités</span>
	
	<div id="table_activites" class="w3-border">
	<table class="w3-table w3-striped w3-hoverable" style="height: 450px">
    <thead>
      <tr class="w3-blue">
        <th>Auteur et sujet <i class="fa fa-sort"></i></th>
        <th>Date <i class="fa fa-sort"></i></th>
		<th class="w3-right-align">Action</th>
      </tr>
    </thead>
    <tr>
	  <td>Baguenault<br /><span class="Style29">Adhérent Rebut</span></td>
      <td>19/05/2022<br />12h30</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
    <tr>
	  <td>Massin<br /><span class="Style29">Adhérent Péron</span></td>
      <td>11/05/2022<br />22h09</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
	<tr>
	  <td>Andrieu-Moutard<br /><span class="Style29">Stagiaire Pichon</span></td>
      <td>09/05/2022<br />08h15</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
	<tr>
	  <td>Diotallevi<br /><span class="Style29">Formateur Chamorel</span></td>
      <td>08/05/2022<br />11h30</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
	<tr>
	  <td>Baguenault<br /><span class="Style29">Adhérent de Labouret</span></td>
      <td>05/05/2022<br />09h03</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
	<tr>
	  <td>Baguenault<br /><span class="Style29">Adhérent Durant</span></td>
      <td>03/05/2022<br />10h00</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
	<tr>
	  <td>Massin<br /><span class="Style29">Adhérent Durant</span></td>
      <td>03/05/2022<br />09h30</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-eye" style="font-size:12px;"></i> Voir</button></td>
    </tr>
		
  </table>
	</div>
	
	
	
	
	
	</div>
	
<!-- zone Lettre & plume -->
<div id="lettre" class="w3-col w3-container w3-margin w3-white w3-center w3-padding w3-round w3-card-4"
  style="width:30%; height: 460px;"><em class="fa fa-edit" style="font-size:24px; color:#f59331;"></em> <span class="Style210">La Lettre & La Plume</span>
	<table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-blue">
        <th>Numéro LP <i class="fa fa-sort"></i></th>
        <th>Etat <i class="fa fa-sort"></i></th>
		<th class="w3-right-align">Action</th>
      </tr>
    </thead>
    <tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 45</span> Janvier 2021</td>
      <td><i class="fa fa-check" style="font-size:12px; color:green"></i> Actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
    <tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 44</span> Juillet 2020</td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
    
	<tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 43</span> Janvier 2020</td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
    <tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 42</span> Juillet 2019</td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 41</span> Janvier 2019</td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
	<tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 40</span> Juillet 2018</td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
		<tr>
      <td><span class="Style211"><i class="fa fa-file-pdf-o"></i> LP 39</span> Janvier 2018</td>
      <td><i class="fa fa-check" style="font-size:12px;color:green"></i> actif</td>
	  <td class="w3-right-align"><button class="buttonNav3"><i class="fa fa-edit" style="font-size:12px;"></i> Gérer</button></td>
    </tr>
  </table>
	
	
	
	
	
	</div>
	
	
</div>
	    </div>
	
	
	
<div id="mySidenav" class="sidenav">
  <a href="/admin_V2/auth/deconnexion.php" id="Back_home" title="Déconnexion"><i class="fa fa-sign-out"></i></a>
  <a href="https://forum.ggre-asso.fr/" id="Forum" target="_blank" title="Accès Forum"><i class="fa fa-comments"></i></a>
</div>
<div id="bandeausup"></div>
	
<script>
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

</body>
</html>
