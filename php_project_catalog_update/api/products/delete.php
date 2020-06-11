<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: DELETE');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers, Content-Type, Acces-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/products.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate product object

    $product = new products($db);

//Get the raw product data 

$data = json_decode(file_get_contents("php://input"));

//Set ID to delete

$product->id = $data->id;

//Delete product

if($product->delete()){
    echo json_encode(
        array('message' => 'Product Deleted')
    );
}else{
    echo json_encode(
        array('message' => 'Product Not Deleted')
    );
}