<?php 

$app->get('/buscarProducto(/(:valor))',function($valor=false) use ($db) {
    $query = "SELECT * FROM productos
             WHERE descripcoin       = ?
             OR    precio   = ?";
    $prod = $db->getInstance()->consultar($query,array($valor,$valor,$valor));
    echo json_encode($prod->results());
});

$app->get('/productos(/(:idp))', function($idp=false){
    global $db;
    
    $sql = "SELECT * FROM productos";
    
    if ($idp){
        $sql .= ' WHERE id=' . $idp;
    }
    
    $prod = $db->getInstance()->consultar($sql);
    
    echo json_encode($prod->results());
    
});

$app->post('/addProducto',function() use ($db){
    $post = $_POST;
    $sql = "INSERT INTO producos 
            (descripcion,resumen,id_categoria,fecha_creado,cantidad,precio)
            VALUES 
            (?,?,?,NOW(),?,?)";
    $insert = $db->getInstance()->consultar($sql,array_values($post));
    echo json_encode($insert);
});

$app->get('/delProducto/:idp', function($idp) use ($db){
    try {
        $sql = "DELETE FROM productos WHERE id = ?";
        $delete = $db->getInstance()->consultar($sql,array($idp));
        echo json_encode($delete);
    } catch (Exception $e) {
        echo json_encode(array("Error"=>$e,"Message"=>"No se pudo borrar el elemento"));
    }
});
?>