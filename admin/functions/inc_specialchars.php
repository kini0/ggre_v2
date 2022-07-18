<?PHP 
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

/*
$test = specialchars("test+pho|tos-?.");
echo "test=".$test."<br /><br />";
echo "test=".antispecialchars($test)."<br /><br />";
*/
?>
