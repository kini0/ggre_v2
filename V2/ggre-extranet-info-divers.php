<?php
session_start();
require_once('../connexion.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="icon" type="image/x-icon" href="ggre-favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="ggre-favicon.ico" /><![endif]-->
<title>G.G.R.E, Groupement des Graphoth�rapeutes - R��ducateurs de l'�criture</title>
<meta name="description" content="Extranet de l'association G.G.R.e">

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
	height:543px;
	z-index:3;
	left: 0px;
	top: 167px;
	background-color: #0A1748;
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
	left: 20px;
	top: 622px;
}
#apDiv9 {
	position:absolute;
	width:200px;
	height:15px;
	z-index:9;
	left: 20px;
	top: 528px;
}
#apDiv10 {
	position:absolute;
	width:200px;
	height:16px;
	z-index:10;
	left: 20px;
	top: 575px;
}
#apDiv11 {
	position:absolute;
	width:200px;
	height:20px;
	z-index:11;
	left: 20px;
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
	height:0px;
	z-index:18;
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
	z-index:17;
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
	position:absolute;
	width:369px;
	height:182px;
	z-index:1;
	left: 118px;
	top: 75px;
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
	position:absolute;
	width:97px;
	height:3px;
	z-index:23;
	left: 182px;
	top: 483px;
}
#apDiv25 {
	position:absolute;
	width:262px;
	height:28px;
	z-index:24;
	left: 371px;
	top: 209px;
}
#apDiv26 {
	position:absolute;
	width:633px;
	height:314px;
	z-index:25;
	left: 371px;
	top: 349px;
	overflow:auto;
}
-->
</style>
</head>

<body onLoad="MM_preloadImages('images/ggre-bt-extranet-plume2.jpg','images/ggre-bt-extranet-bureau2.jpg','images/ggre-bt-extranet-deconnexion2.png')">
<div id="global" style="position:relative;margin: 0 auto; height:752px;width: 1004px;">
<div id="apDiv26">
<?php
	if(!isset($_SESSION['login']) || $_SESSION['login']=="")//Espace r�serv�
	{
		echo "Espace à accès restreint, connexion requise";
		redirection('ggre-extranet.php', 2);
	}
	else {
		$sql = "SELECT * FROM ordre_nextAG WHERE actif='1' ORDER BY date_depot desc limit 0, 6;";
		$res = mysqli_query($conn, $sql);
		
		// Affichage du résultat
		//echo '<ul class="listFichiers">';
		while($tab = mysqli_fetch_array($res))
		{
			echo '<p><span class="Style30">'.utf8_decode($tab["titre"]).'</span><br>';
			echo '<span class="Style27">'.utf8_decode($tab["contenu"]).'</span><br />';
			if($tab["document"]!="") echo '<a href="http://www.ggre-asso.fr/files/'.$tab["document"].'">>Télécharger le document</a></p>';
		}
	}
?>
<a href="/V2/ggre-extranet-archives-info.php"><img src="images/ggre-bt-acces-archives-extranet.jpg" width="207" height="21"></a></div>
<div id="apDiv25"><span class="Style24">Bienvenue</span> <span class="Style29"><?php echo $_SESSION['nom']?></span></div>
<div id="apDiv24"><a href="select_user.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('deconnexion','','images/ggre-bt-extranet-deconnexion2.png',1)"><img src="images/ggre-bt-extranet-deconnexion1.png" name="deconnexion" width="125" height="25" border="0"></a></div>
  <div id="apDiv18"><img src="images/ggre-extranet-titre-info-divers.png" width="633" height="106"></div>
<div id="apDiv1"><img src="images/ggre-tetiere-extranet.jpg" width="1004" height="167"> </div>
<div id="apDiv2"><img src="images/ggre-extranet-visuel-cote.jpg" width="311" height="543"></div>
<div id="apDiv8"><a href="ggre-extranet-bureau.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('bureau','','images/ggre-bt-extranet-bureau2.jpg',1)"><img src="images/ggre-bt-extranet-bureau1.jpg" name="bureau" width="291" height="37" border="0"></a></div>
<div id="apDiv9"><a href="index-extranet.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('extranet actus','','images/ggre-bt-extranet-actus2.jpg',1)"><img src="images/ggre-bt-extranet-actus1.jpg" name="extranet actus" width="291" height="37" border="0"></a></div>
<div id="apDiv10"><a href="ggre-extranet-lettre-plume.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('lettre plume','','images/ggre-bt-extranet-plume2.jpg',1)"><img src="images/ggre-bt-extranet-plume1.jpg" name="lettre plume" width="291" height="37" border="0"></a></div>
<div id="apDiv11"><img src="images/ggre-bt-extranet-info-divers2.jpg" width="291" height="37"></div>
<div id="apDiv13"><img src="images/ggre-zone-pied-nav.jpg" width="311" height="56"></div>
<div id="apDiv14"><img src="images/ggre-filet-bas2.gif" width="693" height="2"></div>
<div id="apDiv17"></div>
<div id="apDiv21"><img src="images/ggre-bande-sup-titre.jpg" width="1004" height="41"></div>
</div>
</body>
</html>
