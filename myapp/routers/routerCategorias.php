<?php 
$app->get('/buscarCategoria(/(:valor))',function($valor=false) use ($db) {
    $query = "SELECT * FROM categorias
             WHERE categoria       = ?";
    $prod = $db->getInstance()->consultar($query,array($valor,$valor,$valor));
    echo json_encode($prod->results());

});

 ?>