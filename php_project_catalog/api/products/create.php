<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: POST');
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

$product->name = $data->name;
$product->price = $data->price;
$product->category_id = $data->category_id;


//Create product

if($product->create()){
    echo json_encode(
        array('message' => 'Product Created')
    );
}else{
    echo json_encode(
        array('message' => 'Product Not Created')
    );
}