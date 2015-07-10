<?php 

$app->get('/personas(/(:idp))', function($idp=false){
    global $db;
    
    $sql = "SELECT * FROM personas";
    
    if ($idp){
        $sql .= ' WHERE id=' . $idp;
    }
    
    $pers = $db->getInstance()->consultar($sql);
    
    echo json_encode($pers->results());
    
});

 ?>