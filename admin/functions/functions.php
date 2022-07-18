<?php 
function specialchars($s) {
	$s = preg_replace_callback(
        '/([+|-\|\.?])/',
        create_function(
            // Les guillemets simples sont très importants ici
            // ou bien il faut protéger les caractères $ avec \$
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
   // Remplace les entités numériques
    $s = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $s);
    $s = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $s);
   // Remplace les entités litérales
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
	$nom = str_replace("à", "a", $nom);
	$nom = str_replace("ç", "c", $nom);
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
	$nom = str_replace("’", "-", $nom);
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
	$nom = str_replace("°", "", $nom);
	$nom = str_replace("¨", "", $nom);
	$nom = str_replace("$", "", $nom);
	$nom = str_replace("£", "", $nom);
	$nom = str_replace("€", "", $nom);
	$nom = str_replace("ù", "", $nom);
	$nom = str_replace("µ", "", $nom);
	$nom = str_replace("!", "", $nom);
	$nom = str_replace("§", "", $nom);
	$nom = str_replace(":", "-", $nom);
	$nom = str_replace(";", "-", $nom);
	$nom = str_replace("?", "-", $nom);
	$nom = str_replace(",", "-", $nom);
	$nom = str_replace("&quot;", "-", $nom);
	$nom = str_replace("´", "-", $nom);
	$nom = str_replace("&acute;", "-", $nom);
	$nom = str_replace("œ", "oe", $nom);
	$nom = str_replace("&oelig;", "oe", $nom);
	$nom = str_replace("“", "", $nom);
	$nom = str_replace("&ldquo;", "", $nom);
	$nom = str_replace("”", "", $nom);
	$nom = str_replace("&rdquo;", "", $nom);
	$nom = str_replace("»", "", $nom);
	$nom = str_replace("&raquo;", "", $nom);
	$nom = str_replace("«", "", $nom);
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
 ?>