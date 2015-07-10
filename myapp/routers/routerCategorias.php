<?php 
$app->get('/buscarCategoria(/(:valor))',function($valor=false) use ($db) {
    $query = "SELECT * FROM categorias
             WHERE categoria       = ?";
    $prod = $db->getInstance()->consultar($query,array($valor));
    echo json_encode($prod->results());

});

$app->get('/delCategoria/:idp', function($idp) use ($db){
    try {
        $sql = "DELETE FROM categorias WHERE categoria = ?";
        $delete = $db->getInstance()->consultar($sql,array($idp));
        echo json_encode($delete);
    } catch (Exception $e) {
        echo json_encode(array("Error"=>$e,"Message"=>"No se pudo borrar el elemento"));
    }
});