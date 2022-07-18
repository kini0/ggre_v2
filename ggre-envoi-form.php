<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

///Path to 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php';

// Load Composer's autoloader
//require 'vendor/autoload.php';


try {
    $mailer = new PHPMailer();                                          //Server settings
    $mailer->SMTPDebug = 0;                    			 				//Enable verbose debug output
    $mailer->isSMTP();                                                  //Send using SMTP
    $mailer->Host       = 'ggre-asso.fr';			                    //Set the SMTP server to send through
    $mailer->SMTPAuth   = true;                                         //Enable SMTP authentication
    $mailer->Username   = 'secretariat.association@ggre-asso.fr';       //SMTP username
    $mailer->Password   = 'Mardi_22@Decembre2020';                       //SMTP password
    $mailer->SMTPSecure = 'tls';                                        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mailer->Port       = 587;                                          //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	$mailer->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
		);


//Recipients
    $mailer->setFrom('info@ggre-asso.fr', 'demande contact');
    $mailer->addAddress('secretariat.association@ggre-asso.fr', 'Contact');     //Add a recipient
    // $mailer->addReplyTo('info@ggre-asso.fr', 'Information');
    // $mailer->addCC('info@ggre-asso.fr');
    // $mailer->addBCC('info@ggre-asso.fr');
	

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$telephone=$_POST['telephone'];
$mail=$_POST['mail'];
$theme=$_POST['theme'];
$sujet=$_POST['sujet'];
$message=$_POST['message'];
	
$subject = "Demande de renseignements :\t$nom\n";

 $msg = "Nom :\t$nom\n<br/>";
 $msg .= "Prenom :\t$prenom\n<br/>";
 $msg .= "Telephone :\t$telephone\n<br/>";
 $msg .= "Mail :\t$mail\n<br/>";
 $msg .= "Theme :\t$theme\n<br/>";
 $msg .= "Sujet :\t$sujet\n<br/>";
 $msg .= "Message :\t$message\n";
 $msg = strtr($msg,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜ¯àâãäåçèéêëìíîï©£òóôõöùúûü~ÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaceeeeiiiioooooouuuuyyy');
	
	
$mailer->isHTML(false);
$mailer->Subject = $subject;
$mailer->Body    = $msg;
$mailer->AltBody = $msg;

    $mailer->send();
}   catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Message d'erreur : {$mailer->ErrorInfo}";
    exit;
}
 
 
 ?>


<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contact graphothérapeute - GGRE</title>
<link rel="icon" type="image/x-icon" href="images/ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/ggre-favicon.ico" /><![endif]-->
<meta name="robots" content="index, follow" />
<meta name="keywords" content="Annuaire des graphothérapeutes">
	
<meta name="description" content="Prenez contact avec un graphothérapeute ou contactez le GGRE, Groupement des Graphothérapeutes-Rééducateurs de l’écriture en France et à l’étranger">
	
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/design.css" />
	
	
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
  background-image: url(images/GGRE-V3-fond17c.jpg);
  min-height: 80%;
}

.w3-bar .w3-button {
  padding: 16px;
}
	
#titre {
  font-family: Verdana, Geneva, sans-serif;
  color: #FFFFFF;
  font-weight: bold;
  text-shadow: 1px 1px 15px #021748;
  width: 100%;
}
	
@media screen and (min-width: 601px) {
  #titre {
    font-size: 55px;
	line-height: 70px;
  }
}

@media screen and (max-width: 600px) {
  #titre {
    font-size: 27px;
	line-height: 38px;
  }
}
</style>
	

<script type="text/javascript">
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
<header class="bgimg-1 w3-display-container" style="max-width: 1307px; margin: auto;" id="home">
  <div class="w3-display-middle w3-text-white w3-center" style="padding:5px">
    <div id="titre">Votre demande<br>a bien été prise<br>en compte ...</div>
  </div> 
</header>


<!-- Section Contacts-->
<div class="w3-container" style="padding:15px 16px; max-width: 1307px; margin: auto;" id="actus">
  <p class="w3-center w3-large">Le service compétent va prendre contact avec vous très prochainement.<br />Merci pour votre intérêt et à très bientôt !</p>
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

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
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