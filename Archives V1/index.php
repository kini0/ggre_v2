<?php
 
$mobile = true;
 
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipod   = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$SAMSUNG   = strpos($_SERVER['HTTP_USER_AGENT'],"SAMSUNG");
$HTC   = strpos($_SERVER['HTTP_USER_AGENT'],"HTC");
$SonyEricsson   = strpos($_SERVER['HTTP_USER_AGENT'],"SonyEricsson");
$Android   = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$Palm   = strpos($_SERVER['HTTP_USER_AGENT'],"Palm");
$LG   = strpos($_SERVER['HTTP_USER_AGENT'],"LG");
$MOT   = strpos($_SERVER['HTTP_USER_AGENT'],"MOT");
$Nokia   = strpos($_SERVER['HTTP_USER_AGENT'],"Nokia");
 
$arrayUserAgents = array(
    "Windows 3.1" => array("Windows 3.1", "Win3.1", "Win16"),
    "Windows 95" => array ("Windows 95", "Windows_95", "Win95"),
    "Windows 98" => array ("Windows 98", "Windows_98", "Win98"),
    "Windows NT 4.0" => array ("Windows NT 4.0", "WinNT4.0"),
    "Windows Millenium" => array ("Windows Millenium", "Windows M", "Windows_ME", "WinME"),
    "Windows 2000" => array ("Windows 2000", "Windows_2000", "Win2000", "Windows NT 5.0"),
    "Windows XP" => array ( "Windows XP", "Windows_XP", "WinXP"),
    "Windows Server 2003" => array ("Windows Server 2003", "Windows NT 5.2"),
    "Windows Vista" => array ("Windows Vista", "Windows NT 6.0"),
    "Windows NT" => array ("Windows NT", "WinNT"),
    "Mac OS"=> array ("Mac OS", "Mac_PowerPC", "Macintosh", "PPC Mac OS", "Intel Mac OS"),
    "Sun OS"=> array ("Sun OS", "SunOS"),
    "QNX" => array ("QNX"),
    "Irix"=> array ("Irix", "IRIX"),
    "Open BSD" => array ("Open BSD", "OpenBSD"),
        "Free BSD" => array ("Free BSD", "FreeBSD"),
        "Net BSD" => array ("Net BSD", "NetBSD"),
        "Linux" => array ("Linux", "X11", "Debian"),
    "BeOS"  => array ("BeOS"),
    "Windows 7" => array ("Windows NT 7.0")
    );
 
    foreach ($arrayUserAgents as $value) {
        foreach ($value as $userAgents) {
             if (strpos($_SERVER['HTTP_USER_AGENT'],$userAgents)) {
                    $mobile = false;
                    break;
             }
        }
    }
 
if($iphone || $ipod || $SAMSUNG || $HTC || $SonyEricsson || $Android || $Palm || $LG || $MOT || $Nokia) {
        $mobile =true;
}
 
if ($mobile) {
    header("Location:  http://www.ggre-asso.fr/smartphone");
    exit;
}

 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="icon" type="image/x-icon" href="ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="ggre-favicon.ico" /><![endif]-->
<title>G.G.R.E, Groupement des Graphothérapeutes - Rééducateurs de l'écriture</title>
<meta name="robots" content="index, follow" />
<meta name="keywords" content="formation, graphotherapie,graphothérapie,Graphothérapeute,Graphothérapeutes,Graphotherapeute,Graphotherapeutes,difficultés,difficulté, Graphoth&#233;rapeutes - R&#233;&#233;ducation de l'&#233;criture - Dysgraphie, bilan graphomoteur, annuaire des graphoth&#233;rapeutes, difficultés de l'écriture ,mauvaise,Groupement, rééducateur , reeducateur , reeducation, rééducation, ecriture, enfant, precoce, précoce,G G R E, dysgraphie , ecole, enseignement, orthophonie, orthophoniste, olivaux, trillat, ECHEC SCOLAIRE,PSYCHOLOGIE,ORIENTATION,PSYCHOGRAPHO,SCOLARITE,PRECOCITE,Echec scolaire, ecriture illisible, precocite, reeducation de l ecriture, rééducation de l écriture, troubles de l'écriture, trouble de l'ecriture">
<meta name="description" content="Bienvenue sur le site de l'association G.G.R.e">
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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

//-->
</script>
<style type="text/css">
body {
	background-color:#849ACB;
	margin:0px;
	overflow:auto;
	background-image:url(images/matrice-fond-st-jo.jpg);
	background-repeat:repeat-x;
	color: #849ACB;
}
<!--

a:link {
	color: #0B1B54;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #101B54;
}
a:hover {
	text-decoration: none;
	color: #A75B27;
}
a:active {
	text-decoration: none;
}

#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:21;
}
#apDiv2 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
	left: 0px;
	top: 167px;
}
#apDiv3 {
	position:absolute;
	width:200px;
	height:20px;
	z-index:18;
	left: 423px;
	top: 167px;
}
#apDiv4 {
	position:absolute;
	width:76px;
	height:15px;
	z-index:4;
	left: 859px;
	top: 167px;
}
#apDiv5 {
	position:absolute;
	width:58px;
	height:22px;
	z-index:5;
	left: 891px;
	top: 167px;
}
#apDiv6 {
	position:absolute;
	width:11px;
	height:25px;
	z-index:6;
	left: 788px;
	top: 167px;
}
#apDiv7 {
	position:absolute;
	width:53px;
	height:21px;
	z-index:7;
	left: 651px;
	top: 167px;
}
#apDiv8 {
	position:absolute;
	width:200px;
	height:11px;
	z-index:8;
	left: 0px;
	top: 622px;
}
#apDiv9 {
	position:absolute;
	width:200px;
	height:15px;
	z-index:9;
	left: 0px;
	top: 528px;
}
#apDiv10 {
	position:absolute;
	width:200px;
	height:16px;
	z-index:10;
	left: 0px;
	top: 575px;
}
#apDiv11 {
	position:absolute;
	width:200px;
	height:6px;
	z-index:11;
	left: 0px;
	top: 669px;
}
#apDiv12 {
	position:absolute;
	width:200px;
	height:0px;
	z-index:12;
	left: 0px;
	top: 671px;
}
#apDiv13 {
	position:absolute;
	width:200px;
	height:22px;
	z-index:13;
	left: 0px;
	top: 706px;
}
#apDiv14 {
	position:absolute;
	width:200px;
	height:2px;
	z-index:14;
	left: 311px;
	top: 706px;
}
#apDiv15 {
	position:absolute;
	width:200px;
	height:13px;
	z-index:17;
	left: 484px;
	top: 665px;
}
#apDiv16 {
	position:absolute;
	width:200px;
	height:21px;
	z-index:16;
	left: 734px;
	top: 661px;
}
#apDiv17 {
	position:absolute;
	width:693px;
	height:540px;
	z-index:1;
	left: 311px;
	top: 167px;
	background-color: #FFFFFF;
}
#apDiv18 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:19;
	left: 371px;
	top: 231px;
}
#apDiv19 {
	position: absolute;
	width: 405px;
	height: 182px;
	z-index: 1;
	left: 79px;
	top: 125px;
	text-align: right;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
#apDiv20 {
	position:absolute;
	width:387px;
	height:23px;
	z-index:20;
	left: 617px;
	top: 716px;
	text-align: right;
	color: #FFF;
}
#apDiv21 {
	position:absolute;
	width:200px;
	height:1px;
	z-index:22;
	left: 0px;
	top: 126px;
}
#apDiv22 {
	position:absolute;
	width:133px;
	height:113px;
	z-index:23;
	left: 811px;
	top: 506px;
}
#apDiv23 {
	position:absolute;
	width:464px;
	height:43px;
	z-index:24;
	left: 372px;
	top: 593px;
	text-align: right;
}
#apDiv24 {
	position: absolute;
	width: 155px;
	height: 12px;
	z-index: 1;
	left: 147px;
	top: 325px;
}
-->
</style>
</head>

<body onLoad="MM_preloadImages('images/ggre-bt-qui-sommes-nous2.jpg','images/ggre-bt-annuaire2.jpg','images/ggre-bt-liens2.jpg','images/ggre-bt-contact2.jpg','images/ggre-bt-dysgraphie2.jpg','images/ggre-bt-graphotherapie2.jpg','images/ggre-bt-graphomoteur2.jpg','images/ggre-bt-question-prat2.jpg','images/ggre-bt-espace-mem2.jpg','images/ggre-bt-formation2.jpg','images/ggre-carte-france2.png','images/ggre-bt-acces-mobile2.png')">
<div id="global" style="position:relative;margin: 0 auto; height:752px;width: 1004px;">
<div class="Style21" id="apDiv23">Vous recherchez un Graphoth&eacute;rapeute dans votre r&eacute;gion,<br>
  consultez notre annuaire national &gt;</div>
<div id="apDiv22"><a href="ggre-annuaire.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('carte france','','images/ggre-carte-france2.png',1)"><img src="images/ggre-carte-france1.png" name="carte france" width="150" height="150" border="0"></a></div>
<div class="Style31" id="apDiv20"><a href="ggre-contact.php">Contacts</a> &bull; <a href="ggre-mention-legale.php">Mentions l&eacute;gales </a>&bull; <a href="http://www.bmvo-capnet.com">Cr&eacute;ation et h&eacute;begerment : BMVO-Capnet</a></div>
<div id="apDiv3"><a href="ggre-presentation.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('qui sommes nous','','images/ggre-bt-qui-sommes-nous2.jpg',1)"><img src="images/ggre-bt-qui-sommes-nous1.jpg" name="qui sommes nous" width="228" height="47" border="0"></a></div>
<div id="apDiv18"><img src="images/ggre-bloc-intro-def.jpg" width="633" height="352">
  <div id="apDiv19"><span class="Style27">Le GGRe-formation dispense une formation diplômante<br>en Graphothérapie déclarée au Rectorat de Paris.<br><br>
	  <strong>Les inscriptions pour la prochaine session<br>de formation de graphothérapeute sont ouvertes.</strong><br>
<strong><br>
Contactez le 01 40 71 00 66<br>
ou <a href="mailto:info@ggre-asso.fr">info@ggre-asso.fr</a></strong></span>
</div>
</div>
<div id="apDiv1">
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1004" height="126">
    <param name="movie" value="ggre-anim-site1.swf">
    <param name="quality" value="high">
    <param name="wmode" value="opaque">
    <param name="swfversion" value="6.0.65.0">
    <!-- Cette balise <param> invite les utilisateurs de Flash Player en version 6.0 r65 et ultérieure à télécharger la version la plus récente de Flash Player. Supprimez-la si vous ne voulez pas que cette invite soit visible. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf">
    <!-- La balise <object> suivante est destinée aux navigateurs autres qu'IE. Supprimez-la d'IE à l'aide d'IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="ggre-anim-site1.swf" width="1004" height="126">
      <!--<![endif]-->
      <param name="quality" value="high">
      <param name="wmode" value="opaque">
      <param name="swfversion" value="6.0.65.0">
      <param name="expressinstall" value="Scripts/expressInstall.swf">
      <!-- Le navigateur affichera le contenu alternatif suivant pour les utilisateurs d'un lecteur Flash de version 6.0 ou de versions plus anciennes. -->
      <div>
        <h4>Le contenu de cette page n&eacute;cessite une version plus r&eacute;cente d’Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtenir le lecteur Adobe Flash" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object></div>
<div id="apDiv2"><img src="images/ggre-visuel-cote.jpg" width="311" height="361">
  <div id="apDiv24"><a href="smartphone/index.htm" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('mobile','','images/ggre-bt-acces-mobile2.png',1)"><img src="images/ggre-bt-acces-mobile1.png" width="160" height="20" id="mobile"></a></div>
</div>
<div id="apDiv5"><a href="ggre-annuaire.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('annuaire','','images/ggre-bt-annuaire2.jpg',1)"><img src="images/ggre-bt-annuaire1.jpg" name="annuaire" width="113" height="47" border="0"></a></div>
<div id="apDiv6"><a href="ggre-liens.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('liens','','images/ggre-bt-liens2.jpg',1)"><img src="images/ggre-bt-liens1.jpg" name="liens" width="103" height="47" border="0"></a></div>
<div id="apDiv7"><a href="ggre-contact.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('contacts','','images/ggre-bt-contact2.jpg',1)"><img src="images/ggre-bt-contact1.jpg" name="contacts" width="137" height="47" border="0"></a></div>
<div id="apDiv8"><a href="ggre-dysgraphie.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('dysgraphie','','images/ggre-bt-dysgraphie2.jpg',1)"><img src="images/ggre-bt-dysgraphie1.jpg" name="dysgraphie" width="311" height="47" border="0"></a></div>
<div id="apDiv9"><a href="ggre-graphotherapie.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('graphothérapie','','images/ggre-bt-graphotherapie2.jpg',1)"><img src="images/ggre-bt-graphotherapie1.jpg" name="graphothérapie" width="311" height="47" border="0"></a></div>
<div id="apDiv10"><a href="ggre-bilan-graphomoteur.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Bilan-grapho','','images/ggre-bt-graphomoteur2.jpg',1)"><img src="images/ggre-bt-graphomoteur1.jpg" name="Bilan-grapho" width="311" height="47" border="0"></a></div>
<div id="apDiv11"><a href="ggre-question-pratique.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('questions','','images/ggre-bt-question-prat2.jpg',1)"><img src="images/ggre-bt-question-prat1.jpg" name="questions" width="311" height="37" border="0"></a></div>
<div id="apDiv13"><img src="images/ggre-zone-pied-nav.jpg" width="311" height="56"></div>
<div id="apDiv14"><img src="images/ggre-filet-bas.gif" width="207" height="2"></div>
<div id="apDiv15"><a href="ggre-extranet.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('extranet','','images/ggre-bt-espace-mem2.jpg',1)"><img src="images/ggre-bt-espace-mem1.jpg" name="extranet" width="250" height="43" border="0"></a></div>
<div id="apDiv16"><a href="ggre-formation.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('formation','','images/ggre-bt-formation2.jpg',1)"><img src="images/ggre-bt-formation1.jpg" name="formation" width="270" height="47" border="0"></a></div>
<div id="apDiv17"></div>
<div id="apDiv21"><img src="images/ggre-bande-sup-titre.jpg" width="1004" height="41"></div>
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
