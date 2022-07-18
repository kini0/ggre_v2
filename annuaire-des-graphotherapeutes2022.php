<?php
session_start();
require_once('connexion.php');
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Annuaire des graphothérapeutes - GGRE</title>
<link rel="icon" type="image/x-icon" href="images/ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/ggre-favicon.ico" /><![endif]-->
<meta name="robots" content="index, follow" />
<meta name="keywords" content="Annuaire des graphothérapeutes">
	
<meta name="description" content="Accédez à l’annuaire des graphothérapeutes en France et contactez le praticien de votre choix. Professionnel de la rééducation de l’écriture.">
	
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/design.css" />
	
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/js/ajax.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Verdana, sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url(images/GGRE-V3-fond31c.jpg);
  min-height: 80%;
}

.w3-bar .w3-button {
  padding: 16px;
}
	
input[type=text] {
            width: 100%;
            padding: 6px 12px;
            box-sizing: border-box;
            border: 1px solid #f59331;
            border-radius: 4px;
        }
	
#titre {
  font-family: Verdana, Geneva, sans-serif;
  color: #FFFFFF;
  font-weight: bold;
  text-shadow: 1px 1px 15px #021748;
}
	
@media screen and (min-width: 601px) {
  #titre {
    font-size: 60px;
	line-height: 80px;
  }
}

@media screen and (max-width: 600px) {
  #titre {
    font-size: 27px;
	line-height: 38px;
  }
}
	
div#lightbox {
	display: block; position: fixed; background-color: rgba(100,100,100,.8); padding-top: 50px; z-index: 2200;
	top: 0; left: 0; right: 0; bottom: 0;
}
div#lightbox-content {
	margin: 0 auto; 
	background: url("images/close.png") no-repeat right 0 white;
	padding: 30px;
	width: 600px;
	z-index: 2200;
	color: #050c1c;
	font-family: arial;
}
div#lightbox-content .resultatBold
	{ font-weight:bold;}

#resultatRecherche a:hover {
	color: #f59331;
	cursor: pointer;
}
	
</style>

<script type="text/javascript">
	
$(function() {
            $("#lightbox").hide();
            $('#lightbox').click (function () {
                $("#lightbox").fadeOut(400);
            });
        });

        function afficheLightbox() {
            $("#lightbox").fadeIn(400);
        }
	
function afficheLightbox() {
            $("#lightbox").fadeIn(400);
        }
        function open_window(page, hauteur, largeur)
        {
            var hauteur_popup=screen.height;
            var H = (screen.height - hauteur) / 2;
            var largeur_popup=screen.width;
            var L = (screen.width - largeur) / 2;
            pop_up = window.open
            (page,"Popup","toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height="+hauteur+",width="+largeur+",top="+H+",left="+L);
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
	
<body>

<!-- Navbar (sit on top) -->
<div id="top" class="w3-top">
  <div class="w3-bar w3-white w3-card w3-display-container" id="myNavbar">
    <a href="index.php" class="w3-bar-item"><img src="images/logo-GGRE-V3-LONG.png" width="190" alt="Logo GGRE"/></a>
    <!-- Right-sided navbar links -->
<div id="Top_navbar" class="w3-right w3-hide-small w3-display-bottomright">
	  <a href="association-de-graphotherapeutes.php" class="w3-bar-item w3-center button1">Le GGRE</a>
		
	<div id="dropdown" class="w3-dropdown-hover">
      <a href="graphotherapie.php" class="w3-bar-item w3-center button1">La Graphothérapie <i class="fa fa-caret-down"></i></a><br>
      <div id="dropdown-content" class="w3-dropdown-content w3-small w3-round" style="background-color: #f59331">
        <a href="graphotherapie.php#definition" class="w3-bar-item Style24">Définition</a>
		<a href="graphotherapie.php#bilan" class="w3-bar-item Style24">Bilan graphomoteur</a>
		<a href="graphotherapie.php#faqs" class="w3-bar-item Style24">Faqs</a>
		<a href="graphotherapie.php#dysgraphie" class="w3-bar-item Style24">Dysgraphie</a>
      </div>
    </div>
		
      <div id="dropdown" class="w3-dropdown-hover">
      <button class="w3-bar-item w3-center button1">Notre Formation <i class="fa fa-caret-down"></i></button><br>
      <div id="dropdown-content" class="w3-dropdown-content w3-small w3-round" style="background-color: #f59331">
        <a href="formation-graphotherapie.php" class="w3-bar-item Style24">L'organisme</a>
		<a href="objectif-et-organisation.php" class="w3-bar-item Style24">Objectifs et Organisation</a>
        <a href="programme-de-formation-a-la-graphotherapie.php" class="w3-bar-item Style24">Modalités</a>
        <a href="inscription-formation-graphotherapie.php" class="w3-bar-item Style24">Inscription</a>
      </div>
    </div>
		
	  <a href="annuaire-des-graphotherapeutes.php" class="w3-bar-item w3-center button1">Trouver un Graphothérapeute</a>
      <a href="actualites-graphotherapie.php" class="w3-bar-item w3-center button1">Actualités</a>
	  <a href="contact-graphotherapeute.php" class="w3-bar-item w3-center button1">Contacts</a>
    </div>
	  
	  
<!-- Hide right-floated links on small screens and replace them with a menu icon -->
<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-blue w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <br><br><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-24 w3-border-bottom w3-orange w3-text-white w3-margin-top"><strong>Fermer ×</strong></a>
  <a href="association-de-graphotherapeutes.php" onclick="w3_close()" class="w3-bar-item w3-button">Le GGRE</a>
  <a href="graphotherapie.php" onclick="w3_close()" class="w3-bar-item w3-button w3-margin-top">La graphothérapie</a>
	
<!-- Sous menu graphothérapie -->
		<button class="w3-button w3-block w3-left-align w3-hover-orange w3-hover-text-white" onclick="myAccFunc2()">La graphothérapie <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc2" class="w3-hide w3-orange w3-card">
	<a href="graphotherapie.php" class="w3-bar-item w3-button">Introduction</a>
    <a href="graphotherapie.php#definition" class="w3-bar-item w3-button">Définition</a>
    <a href="graphotherapie.php#bilan" class="w3-bar-item w3-button">Bilan graphomoteur</a>
	<a href="graphotherapie.php#faqs" class="w3-bar-item w3-button">Faqs</a>
    <a href="graphotherapie.php#dysgraphie" class="w3-bar-item w3-button w3-margin-bottom">Dysgraphie</a>
  </div>
	
<!-- Sous menu formation -->
	<button class="w3-button w3-block w3-left-align w3-hover-orange w3-hover-text-white" onclick="myAccFunc()">Notre formation <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc" class="w3-hide w3-orange w3-card">
    <a href="formation-graphotherapie.php" class="w3-bar-item w3-button">L'organisme</a>
    <a href="objectif-et-organisation.php" class="w3-bar-item w3-button">Objectifs et Organisation</a>
	<a href="programme-de-formation-a-la-graphotherapie.php" class="w3-bar-item w3-button">Modalités</a>
    <a href="inscription-formation-graphotherapie.php" class="w3-bar-item w3-button w3-margin-bottom">Inscription</a>
  </div>
	
  <a href="annuaire-des-graphotherapeutes.php" onclick="w3_close()" class="w3-bar-item w3-button">Trouver un graphothérapeute</a>
  <a href="actualites-graphotherapie.php" onclick="w3_close()" class="w3-bar-item w3-button">Actualités</a>
  <a href="contact-graphotherapeute.php" onclick="w3_close()" class="w3-bar-item w3-button">Contacts</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container" style="padding:0px 5px; max-width: 1307px; margin: auto;" id="home">
  <div class="w3-display-middle w3-text-white w3-center" style="padding:40px">
   <div id="titre">L’annuaire des graphothérapeutes</div> 
  </div> 
</header>


<!-- Intro Annuaire-->
<div class="w3-container w3-white" style="padding:0px 5px; max-width: 1307px; margin: auto;">	
<div class="w3-row w3-padding">
  <p class="w3-center w3-large">Contactez le professionnel le plus proche de chez vous. Actifs en France et à l’étranger, nous sommes à votre disposition pour toute information complémentaire sur <strong><a href="graphotherapie.php">les séances de graphothérapie</a></strong> et <strong><a href="formation-graphotherapie.php">notre organisme de formation.</a></strong></p>
</div>
</div>
	
<!-- Section ANNUAIRE -->
<div id="annuaire" class="w3-container w3-row w3-center w3-orange" style="padding:0px 5px; max-width: 1307px; margin: auto;">
 <h2 class="w3-xxlarge Style400">Consulter l’annuaire des graphothérapeutes</h2>
	
	
<div class="w3-row">
<!-- Carte de France -->
<div class="w3-display-container w3-center"><img src="images/GGRE-Carte-france-13regions.svg" alt="carte de france des graphotherapeutes" width="75%"/>
	
<div class="w3-dropdown-hover w3-display-topmiddle"><br><br>
    <em class="fa fa-map-marker" style="font-size:42px;color:orange"></em>
     <div class="w3-dropdown-content w3-centered w3-card-4 w3-border w3-round" style="width:400px; border:#ca2245; left:-200px;">
      <div class="w3-container">
		  
      <span class="w3-center Style5000">Région Hauts-de-France :</span><br>
      <ul class="w3-ul w3-hoverable w3-left-align">
      <li><span class="Style200">•</span> Mme Martin - Sains du Nord 59</li>
      <li><span class="Style200">•</span> Mme Martin - Sains du Nord 59</li>
      <li><span class="Style200">•</span> Mme Martin - Sains du Nord 59</li>
      </ul>
      </div>
    </div>
  </div>
	
</div>
	
<!-- Moteur de recherche -->
<div class="w3-container w3-margin w3-blue w3-padding-24 w3-round-large">
	
<!-- Menus dédiés -->
<div class="w3-row-padding">
	  <div class="w3-half">
	  <label class="Style41"><i class="w3-xlarge fa fa-map"></i> Recherche par département</label>
      <select class="w3-select w3-border w3-round" name="theme" id="select" required="required">
    <option style="color:#ccc">Choisir un département</option>
    <option>Ain</option>
    <option>Allier</option>
    <option>Béarn</option>
	<option>Etc...</option>
  </select>
	  </div>
	  <div class="w3-half">
      <label class="Style41"><i class="w3-xlarge fa fa-user-circle"></i> Recherche par Nom</label>
      <select class="w3-select w3-border w3-round" name="sujet" id="select" required="required">
    <option style="color:#ccc">Choisir un nom de praticien</option>
    <option>Achoury</option>
    <option>André</option>
    <option>Andrieux-Moutard</option>
	<option>etc...</option>
  </select>
	  </div>
</div><br>
<!-- Recherche libre-->
<div class="w3-row w3-padding">
	  <label class="Style41"><i class="w3-xlarge fa fa-edit"></i> Recherche par écriture libre</label>
      <input class="w3-input w3-border w3-round-medium" type="text" style="width:100%; height: 100px"  placeholder="Saisir un nom, une ville ou un code postal." name="message" required="required" >
</div>
<!-- Bourton recherche -->
<div class="w3-row w3-padding w3-center">
	<a onclick="myFunction('resultat1')" class="button button_form w3-round w3-padding">
<span class="Style4000"><i class="fa fa-search"></i> RECHERCHER</span></a>
</div>
	
<!-- Section Résultats -->
<div id="resultat1" class="w3-hide w3-container w3-animate-top w3-white w3-padding-24 w3-round-large">
<span class="w3-center Style300">Résultats :</span><br>
<ul class="w3-ul w3-hoverable w3-left-align">
<li><span class="Style200">•</span> Mme Achoury Drifa - Hannonay 07100</li>
<li><span class="Style200">•</span> Mme André Nathalie - Rueil-Malmaison 92500</li>
<li><span class="Style200">•</span> Mme Andrieux-Moutard Dominique - Sainte Egrève 38120</li>
</ul>
  </div>
	
</div>
<br><br>

</div>
</div>




	
<!-- Footer -->
<footer class="w3-center w3-blue w3-padding">
<h3 class="w3-center Style400"><i class="fa fa-list-ul"></i> Plan du site</h3>
	
<div class="w3-row w3-container w3-border w3-border-orange w3-round-large" style="max-width: 1307px; margin: auto;">
	
<div class="w3-third w3-padding-large">
<ul class="w3-ul w3-left-align">
  <li><span class="Style200">•</span> <a href="index.php">Accueil</a></li>
  <li><span class="Style200">•</span> <a href="association-de-graphotherapeutes.php">Le GGRE</a></li>
  <li><span class="Style200">•</span> <a href="graphotherapie.php">La Graphothérapie</a></li>
  <li><span class="Style200">•</span> <a href="annuaire-des-graphotherapeutes.php">Trouver un Graphothérapeute</a></li>
  <li></li>
</ul>
</div>
	
  <div class="w3-third w3-padding-large">
<ul class="w3-ul w3-left-align">
  <li><span class="Style200">•</span> <a href="formation-graphotherapie.php">Organisme de formation</a></li>
  <li><span class="Style200">•</span> <a href="objectif-et-organisation.php">Objectifs et Organisation</a></li>
  <li><span class="Style200">•</span> <a href="programme-de-formation-a-la-graphotherapie.php">Modalités</a></li>
  <li><span class="Style200">•</span> <a href="inscription-formation-graphotherapie.php">Inscription</a></li>
  <li></li>
</ul>
  </div>
	
  <div class="w3-third w3-padding-large">
<ul class="w3-ul w3-left-align">
  <li><span class="Style200">•</span> <a href="actualites-graphotherapie.php">Actualités</a></li>
  <li><span class="Style200">•</span> <a href="contact-graphotherapeute.php">Contacts</a></li>
  <li><span class="Style200">•</span> <a href="mentions-legales-GGRE.php"> Mentions légales</a></li>
  <li><span class="Style200">•</span> <a href="liens-utiles.php">Liens utiles</a></li>
  <li></li>
</ul>
  </div>
	
	
</div>
	
  <p><a href="https://www.bmvo-capnet.com" title="BMVO Capnet" target="_blank" class="w3-hover-text-orange">Création BMVO Capnet <img src="images/Logo-BMVO-intro.png" width="50" height="50" alt="BMVO Capnet"/></a></p>
</footer>
	
	
<!-- Liens sociaux -->
<div id="SociaLink">
<a href="GGRE-connect-extranet.php" target="_blank" class="fa fa-group" title="Accès Extranet"></a>
<a href="https://www.linkedin.com/company/ggre-groupement-des-graphoth%C3%A9rapeutes-r%C3%A9%C3%A9ducateurs-de-l%E2%80%99%C3%A9criture/" target="_blank" class="fa fa-linkedin" alt="linkedin"></a>
<a href="https://www.facebook.com/ggregraphotherapie" target="_blank" class="fa fa-facebook" alt="facebook"></a>
</div>
	
<!-- Bouton retour top -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
 
<script>
	
// Question/reponse accordeon
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
	
function myAccFunc2() {
  var x = document.getElementById("demoAcc2");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-orange";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-orange", "");
  }
}
	
	
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
	
		
// accordeon sidebar mobile
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-orange";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-orange", "");
  }
}
	
function myAccFunc2() {
  var x = document.getElementById("demoAcc2");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-orange";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-orange", "");
  }
}
	
// When the user scrolls down 200px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
	
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

</body>
</html>