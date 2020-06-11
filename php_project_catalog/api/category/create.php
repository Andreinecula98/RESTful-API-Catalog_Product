<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers, Content-Type, Acces-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/category.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate category object

    $category = new category($db);

//Get the raw category data 

$data = json_decode(file_get_contents("php://input"));

$category->category_name = $data->name;


//Create category

if($category->create()){
    echo json_encode(
        array('message' => 'category Created')
    );
}else{
    echo json_encode(
        array('message' => 'category Not Created')
    );
}