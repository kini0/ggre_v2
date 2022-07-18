<?php
// Liste des secteurs
function getSecteur($v) {
		$sql = "SELECT * FROM type_secteur";
		$res = mysqli_query($conn, $sql);
		
		while($tab=mysqli_fetch_array($res))
		{
			echo "<option value='".$tab["id_secteur"]."'";
				if($tab["id_secteur"] == $v)
					echo " selected='selected'";
			echo ">".$tab["nom_secteur"]."</option>\n";
		}
}

// Liste des types de contrats
function getContrat($v) {
		$sql = "SELECT * FROM type_contrat";
		$res = mysqli_query($conn, $sql);
		
		while($tab=mysqli_fetch_array($res))
		{
			echo "<option value='".$tab["id_contrat"]."'";
				if($v!="")
				{
					if($tab["id_contrat"] == $v)
						echo " selected='selected'";
				}
			echo ">".$tab["nom_contrat"]."</option>\n";
		}
}

// Trier les donn�es sur une liste
function getTri($lien,$n) {
	$imgtop = "images/top.gif";
	$imgbas = "images/bas.gif";
	$to_return = "<a href='".$lien."?orderby=".$n."&tri=ASC'><img src='".$imgtop."' /></a> ";
	$to_return .= " <a href='".$lien."?orderby=".$n."&tri=DESC'><img src='".$imgbas."' /></a> ";
	return $to_return;
}
// G�n�rer un mot de passe
function getMdp() {
		$chrs = 8;
		$chaine = ""; 
		$list = "0123456789abcdefghijklmnopqrstuvwxyz";
		mt_srand((double)microtime()*1000000);
		$newstring="";
		while( strlen( $newstring )< $chrs ) {
			$newstring .= $list[mt_rand(0, strlen($list)-1)];
		}
		return $newstring;
}

// Convertir la date au format fr
function GetDateFR($value) {
		return substr($value,8,2)."/".substr($value,5,2)."/".substr($value,0,4);
}

// Convertir la date au format US BD
function formatDateDB($v) {
		return substr($v,6,4)."-".substr($v,3,2)."-".substr($v,0,2);
}

// Comparaison de date : Retourne "true" si la date est ant�rieure� celle d'aujourd'hui.
function CompareDate($v) {
	$now = date("Y-m-d");	
	// 1 si now > next / 0 si now < next
	$return = strcmp($now, $v);
		if($return == "1")
			return true;
		else
			return false;
}

// Normalisation des cha�nes de caract�res
function specialchars($s) {
	$s = preg_replace_callback(
        '/([+|-\|\.?])/',
        create_function(
            // Les guillemets simples sont tr�s importants ici
            // ou bien il faut prot�ger les caract�res $ avec \$
            '$matches',
            'return "&#".(ord($matches[0])<100? "0": "").ord($matches[0]).";";'
        ),
        $s
   );
   return $s;		
}
function antispecialchars($s) {
	$s = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $s);
	return preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $s);
}

function unhtmlentities($s){
   // Remplace les entit�s num�riques
    $s = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $s);
    $s = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $s);
   // Remplace les entit�s lit�rales
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return strtr($s, $trans_tbl);
}

function cleaner($nom,$keepnum=false){
	$nom = html_entity_decode($nom, ENT_QUOTES);
	$nom = antispecialchars($nom);
	$txt_accents = "";
	$nom = stripslashes($nom);
	$nom = str_replace("1er", "premier", $nom);
	$nom = str_replace("?", "", $nom);
	$nom = str_replace("@", "", $nom);
	$nom = str_replace("�", "a", $nom);
	$nom = str_replace("�", "c", $nom);
	$nom = str_replace("~", "", $nom);
	$nom = str_replace("&", "-", $nom);
	$nom = str_replace("#", "", $nom);
	$nom = str_replace("{", "", $nom);
	$nom = str_replace("(", "", $nom);
	$nom = str_replace("[", "", $nom);
	$nom = str_replace("|", "", $nom);
	$nom = str_replace("^", "", $nom);
	$nom = str_replace(")", "", $nom);
	$nom = str_replace("]", "", $nom);
	$nom = str_replace("}", "", $nom);
	$nom = str_replace("%", "", $nom);
	$nom = str_replace("/", "-", $nom);
	$nom = str_replace("'", "-", $nom);
	$nom = str_replace("�", "-", $nom);
	$nom = str_replace("\'", "-", $nom);
	$nom = str_replace("\\'", "-", $nom);
	$nom = str_replace("\\\'", "-", $nom);
	$nom = str_replace("/", "-", $nom);
	$nom = str_replace("+", "-", $nom);
	$nom = str_replace("*", "", $nom);
	$nom = str_replace('"', '', $nom);
	$nom = str_replace("<", "", $nom);
	$nom = str_replace(">", "", $nom);
	$nom = str_replace("~", "", $nom);
	$nom = str_replace("`", "-", $nom);
	$nom = str_replace("^", "", $nom);
	$nom = str_replace("=", "-", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("$", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("!", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace(":", "-", $nom);
	$nom = str_replace(";", "-", $nom);
	$nom = str_replace("?", "-", $nom);
	$nom = str_replace(",", "-", $nom);
	$nom = str_replace("&quot;", "-", $nom);
	$nom = str_replace("�", "-", $nom);
	$nom = str_replace("&acute;", "-", $nom);
	$nom = str_replace("�", "oe", $nom);
	$nom = str_replace("&oelig;", "oe", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("&ldquo;", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("&rdquo;", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("&raquo;", "", $nom);
	$nom = str_replace("�", "", $nom);
	$nom = str_replace("&laquo;", "", $nom);
	//$nom = str_replace(".", "-", $nom);
	for($i=192;$i<256;$i++){
		$txt_accents .= chr($i);
	};
	$nom = strtr($nom,
	$txt_accents,
	"AAAAAAECEEEEIIIIDNOOOOOx0UUUUYPSaaaaaaeceeeeiiiidnooooo_0uuuuypy");
	$Motif4 = "\.";
	$remp4 = "-";
	$nom = ereg_replace($Motif4,$remp4,$nom);
	$nom = str_replace("-html",".html",$nom);
	$nom = str_replace("-HTML",".html",$nom);
	$nom = str_replace("-rtf",".rtf",$nom);
	$nom = str_replace("-doc",".doc",$nom);
	$nom = str_replace("-docx",".docx",$nom);
	$nom = str_replace("-pdf",".pdf",$nom);
	$nom = str_replace("-xls",".xls",$nom);
	$nom = str_replace("-odt",".odt",$nom);
	$motif = " ";
	$remp = "-";
	$nom = ereg_replace($motif,$remp,$nom);
	$motif2 = "(-)([^-E]{1}(-))";
	$nom = eregi_replace($motif2,"\\1",$nom);
	if(!$keepnum){
		$motif6 = "[0-9]+";
		$nom = eregi_replace($motif6,"",$nom);
	}
	$motif3 = "-+";
	$nom = eregi_replace($motif3,"-",$nom);
	$motif4 = "^-+";
	$nom = eregi_replace($motif4,"",$nom);
	$motif5 = "-$";
	$nom = eregi_replace($motif5,"",$nom);
	return trim(strtolower($nom));
}

// Retourne la page actuelle
function getCurrentPage() {
$path = $_SERVER['PHP_SELF'];
return(basename ($path));
}

?>