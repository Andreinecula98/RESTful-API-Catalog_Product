<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers, Content-Type, Acces-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/products.php';
    include_once '../../models/users.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate product object

    $product = new products($db);
    $user = new users($db);

//Get the raw product data 

$data = json_decode(file_get_contents("php://input"));

//$all_headers = getallheaders()

//$date->jwt = $all_headers['Authorization'];

//$secret_key = "secretkey";
//$decoded_data = JWT::decode($date->jwt, $secret_key, array('HS512'));

//$user_id =$decoded_data->date->id;

$product->name = $data->name;
$product->price = $data->price;
//$product->user_id = $user_id;
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