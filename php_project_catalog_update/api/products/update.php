<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: PUT');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers, Content-Type, Acces-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/products.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate product object

    $product = new products($db);

//Get the raw producted data 

$data = json_decode(file_get_contents("php://input"));

//Set ID to update

$product->id = $data->id;

$product->name = $data->name;
$product->price = $data->price;
$product->category_id = $data->category_id;

//Update product

if($product->update()){
    echo json_encode(
        array('message' => 'Product Updated')
    );
}else{
    echo json_encode(
        array('message' => 'Product Not Updated')
    );
}