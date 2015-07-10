<?php 
$app->get('/delPersonas/:idp', function($idp) use ($db){
    try {
        $sql = "DELETE FROM personas WHERE id = ?";
        $delete = $db->getInstance()->consultar($sql,array($idp));
        echo json_encode($delete);
    } catch (Exception $e) {
        echo json_encode(array("Error"=>$e,"Message"=>"No se pudo borrar el elemento"));
    }
});


$app->get('/personas(/(:idp))', function($idp=false){
    global $db;
    
    $sql = "SELECT * FROM personas";
    
    if ($idp){
        $sql .= ' WHERE id=' . $idp;
    }
    
    $pers = $db->getInstance()->consultar($sql);
    
    echo json_encode($pers->results());    
});


