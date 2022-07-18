<?php
function update_bn_user(){
    global $pdo;
    global $db_user;

    $data = $_REQUEST + array("updated_on" => date("Y-m-d H:i:s"),"updated_by" => $db_user);

    if($data['pass'] == $data['pass_verif']){
        $data['pass'] = sha1($data['pass']);        
        $nbligne = insertDB('bn_user',$data);
        if($nbligne){
            echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","nb_row":'. $nbligne .'}';
        } else {
            echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
        }
    } else {
         echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
    }    
}