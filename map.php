<?php
session_start();
require_once('connexion.php');
?>

<html>
    <head>
	<script type="text/javascript" src="js/ajax.js"></script>
	</head>
<body>
<div id="Layer12" style="position:absolute; width:600px; height:115px; z-index:13; left: 370px; top: 195px;"><img name="carte" src="images/GGRE-fond-carte-france.png" width="387" height="377" border="0" usemap="#Map">
			    <map name="Map">
				<!-- ILE DE FRANCE -->
				<area id="idf" onclick="region('listeAnnuaire.php','Layer12','75,91,92,93,94,95,77,78');" shape="poly" coords="217,88,231,88,239,91,246,93,258,91,266,103,269,109,272,114,269,126,259,128,255,135,246,139,239,139,239,133,231,129,223,132,221,125,217,122,215,118,211,113,211,104,205,95,212,93,217,87" href="#" onmouseover="document.carte.src='images/GGRE-carte-Idf.png'; nbV('nbV.php','nbV','75,91,92,93,94,95,77,78');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- PICARDIE -->
				<area id="picardie" onclick="region('listeAnnuaire.php','Layer12','88,60,2');" shape="poly" coords="207,49,210,37,233,42,236,51,239,48,254,54,292,54,292,67,288,75,288,81,279,84,278,90,274,100,269,108,261,90,243,92,234,87,213,88,216,79,215,59,207,49" href="#"onmouseover="document.carte.src='images/GGRE-carte-picardie.png'; nbV('nbV.php','nbV','88,60,02');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- NORD -->
				<area id="nord" onclick="region('listeAnnuaire.php','Layer12','59,62');" shape="poly" coords="210,33,210,12,239,4,242,15,251,20,256,14,264,30,271,30,277,36,285,36,290,39,290,53,269,51,254,53,239,46,234,42,210,32" href="#"onmouseover="document.carte.src='images/GGRE-carte-nord-pas-de-calais.png'; nbV('nbV.php','nbV','59,62');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- HAUTE NORMANDIE -->
				<area id="haute" onclick="region('listeAnnuaire.php','Layer12','76,27');" shape="poly" coords="165,73,168,65,182,58,197,57,206,49,211,58,215,76,213,85,213,88,209,94,205,96,207,101,202,107,195,108,184,114,184,108,175,103,169,82,179,79,165,72" href="#"onmouseover="document.carte.src='images/GGRE-carte-haute-normandie.png'; nbV('nbV.php','nbV','76,27');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- CHAMPAGNE -->
				<area onclick="region('listeAnnuaire.php','Layer12','51,10,52,82,8');" shape="poly" coords="292,53,297,57,302,53,306,42,312,48,311,59,325,68,325,74,320,73,319,80,316,90,316,99,313,106,318,118,330,120,332,126,339,132,338,140,345,148,340,155,338,161,332,161,328,164,313,159,317,152,311,146,307,146,284,148,277,137,273,138,268,129,272,118,269,109,276,102,276,91,285,85,286,74,293,68,291,54" href="#"onmouseover="document.carte.src='images/GGRE-carte-champagne.png'; nbV('nbV.php','nbV','51,10,52,82,8');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- LORRAINE -->
				<area onclick="region('listeAnnuaire.php','Layer12','57,88,54,55');" shape="poly" coords="327,71,328,74,339,70,343,76,352,73,363,76,366,89,373,86,379,91,390,85,395,89,397,96,390,97,378,97,378,101,387,104,387,113,382,116,384,124,384,129,381,141,375,151,368,146,357,147,351,143,347,146,341,140,341,132,332,124,331,121,323,117,316,106,318,99,318,88,321,77,325,71" href="#"onmouseover="document.carte.src='images/GGRE-carte-lorraine.png'; nbV('nbV.php','nbV','57,88,54,55');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!--  -->
				<area shape="poly" coords="403,89" href="#">
				<!-- ALSACE -->
				<area onclick="region('listeAnnuaire.php','Layer12','67,68');" shape="poly" coords="401,89,416,94,406,108,403,125,399,133,400,144,398,153,401,157,393,169,386,166,380,161,379,153,385,139,389,128,385,120,390,114,390,107,382,97,397,98,400,88" href="#"onmouseover="document.carte.src='images/GGRE-carte-alsace-.png'; nbV('nbV.php','nbV','67,68');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- FRANCHE COMTE -->
				<area onclick="region('listeAnnuaire.php','Layer12','25,39,70,90');" shape="poly" coords="329,168,340,162,342,154,351,146,366,149,376,151,381,166,385,175,375,186,369,192,366,202,358,211,355,219,347,227,339,227,329,217,331,207,331,202,329,193,329,188,334,181,334,176,332,168" href="#"onmouseover="document.carte.src='images/GGRE-carte-franche-comte.png'; nbV('nbV.php','nbV','25,39,70,90');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- BOURGOGNE -->
				<area onclick="region('listeAnnuaire.php','Layer12','21,89,71,58');" shape="poly" coords="255,203,258,196,253,178,252,168,253,159,256,151,258,147,257,138,257,130,266,130,274,141,280,151,296,150,307,146,313,152,311,158,326,166,331,173,331,183,325,190,328,198,330,204,327,217,319,215,313,232,309,224,302,225,297,230,282,229,284,223,286,216,277,214,275,205,267,210,254,202" href="#"onmouseover="document.carte.src='images/GGRE-carte-bourgogne.png'; nbV('nbV.php','nbV','21,89,71,58');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- BASSE NORMANDIE -->
				<area onclick="region('listeAnnuaire.php','Layer12','14,50,61');" shape="poly" coords="117,113,112,108,113,100,113,89,108,79,107,71,101,63,107,62,113,68,120,63,127,66,123,72,128,82,131,79,145,80,153,84,162,83,167,79,170,95,173,103,182,110,185,115,187,125,184,129,184,136,174,130,171,122,162,128,152,120,137,123,125,119,115,122,116,113" href="#"onmouseover="document.carte.src='images/GGRE-carte-basse-normandie.png'; nbV('nbV.php','nbV','14,50,61');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- CENTRE -->
				<area onclick="region('listeAnnuaire.php','Layer12','37,45,41,28,18,36');" shape="poly" coords="167,163,182,155,186,139,186,127,189,126,188,117,196,110,201,111,206,105,210,118,215,125,221,128,221,133,229,132,236,134,236,139,246,141,254,139,255,145,251,157,250,177,256,196,253,205,244,209,241,214,235,217,220,220,204,224,197,223,196,216,185,212,187,207,179,192,172,195,166,189,160,181" href="#"onmouseover="document.carte.src='images/GGRE-carte-centre.png'; nbV('nbV.php','nbV','37,45,41,28,18,36');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- BRETAGNE -->
				<area onclick="region('listeAnnuaire.php','Layer12','35,56,29,22');" shape="poly" coords="12,118,14,110,27,106,39,105,43,107,53,107,56,100,67,100,71,107,76,116,83,112,93,112,99,112,105,111,114,114,114,122,120,124,124,122,133,125,129,133,130,145,125,148,124,155,112,152,96,161,80,170,76,166,70,166,65,161,54,152,41,148,37,144,27,149,23,141,14,134,20,129" href="#"onmouseover="document.carte.src='images/GGRE-carte-bretagne.png'; nbV('nbV.php','nbV','35,56,29,22');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- LOIRE -->
				<area onclick="region('listeAnnuaire.php','Layer12','44,85,49,72,53');" shape="poly" coords="80,172,93,168,99,162,108,156,114,156,123,157,128,149,132,144,132,132,132,126,140,126,155,123,158,129,170,127,173,133,183,139,179,153,169,160,159,179,158,187,143,190,133,192,138,197,141,211,143,222,133,224,127,219,117,223,104,217,95,201,86,188,88,181" href="#"onmouseover="document.carte.src='images/GGRE-carte-loire.png'; nbV('nbV.php','nbV','44,85,49,72,53');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- POITOU CHARENTES -->
				<area onclick="region('listeAnnuaire.php','Layer12','86,17,16,79');" shape="poly" coords="182,249,170,263,167,272,156,280,143,277,134,267,125,258,117,253,114,235,115,226,123,224,130,225,142,225,143,215,143,205,137,194,154,190,162,190,168,196,179,196,185,208,186,215,192,217,193,222,184,232,189,240" href="#"onmouseover="document.carte.src='images/GGRE-carte-charentes.png'; nbV('nbV.php','nbV','86,17,16,79');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- LIMOUSIN -->
				<area onclick="region('listeAnnuaire.php','Layer12','87,23,19');" shape="poly" coords="182,250,191,245,188,234,191,225,201,226,222,220,235,222,242,231,242,242,239,249,241,257,241,267,235,271,231,284,215,288,209,285,200,275,202,266,193,255,184,255" href="#"onmouseover="document.carte.src='images/GGRE-carte-limousin.png'; nbV('nbV.php','nbV','87,23,19');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- AUVERGNE -->
				<area onclick="region('listeAnnuaire.php','Layer12','63,15,43,3');" shape="poly" coords="255,303,249,292,238,303,228,304,224,290,231,286,234,272,243,270,243,251,241,247,246,238,246,230,236,220,242,219,245,213,254,207,265,211,272,211,278,216,285,218,281,231,283,239,280,242,285,257,287,262,286,268,297,266,306,274,298,290,289,290,284,295,276,292,271,295,269,289,259,295" href="#"onmouseover="document.carte.src='images/GGRE-carte-auvergne.png'; nbV('nbV.php','nbV','63,15,43,03');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- AQUITAINE -->
				<area onclick="region('listeAnnuaire.php','Layer12','24,33,40,47,64');" shape="poly" coords="91,360,102,354,108,333,115,301,117,279,119,262,122,260,137,273,147,282,156,283,166,277,171,267,180,256,189,258,199,269,199,279,205,288,204,297,191,306,190,317,182,325,170,332,155,332,149,344,155,352,153,367,148,376,142,388,136,390,128,381,119,381,113,374,109,377,103,374,104,365,96,364" href="#"onmouseover="document.carte.src='images/GGRE-carte-aquitaine.png'; nbV('nbV.php','nbV','24,33,40,47,64');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- RHONES ALPES -->
				<area onclick="region('listeAnnuaire.php','Layer12','69,42,74,38,22,26,01,07');" shape="poly" coords="285,232,299,232,304,226,312,234,318,229,320,217,327,222,335,227,342,226,349,228,359,229,359,219,370,215,378,214,382,226,387,238,381,247,386,252,394,259,392,271,377,278,371,280,365,278,367,287,359,290,345,301,345,310,341,311,348,322,342,325,322,317,314,322,311,318,301,320,293,318,288,309,287,296,291,295,302,285,306,274,300,266,292,265,285,254,283,244" href="#"onmouseover="document.carte.src='images/GGRE-carte-rhones-alpes.png'; nbV('nbV.php','nbV','69,42,74,38,22,26,01,07');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- MIDI PYRENEES -->
				<area onclick="region('listeAnnuaire.php','Layer12','31,81,12,65,32,82,46,09');" shape="poly" coords="179,393,167,393,158,391,153,395,146,388,149,377,156,370,156,348,154,345,156,333,170,333,180,330,189,320,193,310,200,302,206,286,212,292,221,291,226,297,224,307,240,304,246,295,255,303,259,308,263,320,270,323,272,332,260,345,250,351,245,351,244,359,236,359,223,359,216,365,220,372,222,386,228,392,214,401,199,395,189,390,181,386" href="#"onmouseover="document.carte.src='images/GGRE-carte-midi-pyrenees.png'; nbV('nbV.php','nbV','31,81,12,65,32,82,46,09');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- LANGUDOC -->
				<area onclick="region('listeAnnuaire.php','Layer12','34,30,66,11,48');" shape="poly" coords="215,405,219,399,230,395,230,391,223,386,222,373,219,367,224,362,242,361,246,352,256,352,274,331,271,322,264,317,259,304,264,289,271,295,281,295,285,298,285,308,290,314,296,320,308,320,316,324,318,331,311,343,304,351,299,358,292,353,282,360,267,368,260,383,258,396,263,403,250,407,245,410,233,408,221,410" href="#"onmouseover="document.carte.src='images/GGRE-carte-languedoc-roussillon.png'; nbV('nbV.php','nbV','34,30,66,11,48');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- PACA -->
				<area onclick="region('listeAnnuaire.php','Layer12','13,83,06,84,04,05');" shape="poly" coords="305,357,312,346,317,336,321,332,318,324,325,320,333,323,339,328,352,325,344,314,347,305,350,297,359,293,367,291,369,283,380,280,382,285,386,287,391,296,389,304,390,314,398,319,403,322,411,319,415,323,410,336,397,347,390,354,385,361,385,366,365,374,355,374,344,369,338,369,327,362,319,361,313,362" href="#"onmouseover="document.carte.src='images/GGRE-carte-PACA.png'; nbV('nbV.php','nbV','13,83,06,84,04,05');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png'">
				<!-- CORSE -->
				<area onclick="region('listeAnnuaire.php','Layer12','20,2A,2B');" shape="poly" coords="436,350,441,356,442,363,448,388,443,400,444,408,439,427,431,425,421,423,420,417,418,412,413,405,412,396,412,387,412,381,417,373,423,368,428,364,434,363" href="#"onmouseover="document.carte.src='images/GGRE-carte-corse.png'; nbV('nbV.php','nbV','20,2A,2B');"
				      onmouseout="document.carte.src='images/GGRE-fond-carte-france.png';document.getElementById('nbV').value='Passez votre souris sur une r�gion';">
			    </map>
			</div>
			
			<div id="Layer17" class="Style23" style="position:absolute; width:164px; height:37px; z-index:17; left: 776px; top: 350px;">
			    <div align="right" id="cannard">Nombre de graphoth�rapeutes<BR>
				disponibles dans cette r&eacute;gion<br>
				<span class="Style24" id="nbV"></span></div>
			</div>
			<?php 
			 $query = "SELECT nom FROM user";

    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result))
    {
		echo $row['nom']."<br/>";
    }
	?>
</body>
</html>
