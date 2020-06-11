<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once '../../config/Database.php';
    include_once '../../models/products.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate product
    $product = new products($db);

//Get ID
    $product->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get Product
    $product->read_single();

//Create array
$product_arr = array(
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'user_id' => $product->user_id,
    'category_id' => $product->category_id,
    'category_name' => $product->category_name,
    'created_date' => $product->created_date,
    'updated_date' => $product->updated_date
);

//Make a JSON
print_r(json_encode($product_arr));