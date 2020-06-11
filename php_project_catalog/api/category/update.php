<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: PUT');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers, Content-Type, Acces-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/category.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate category object

    $category = new category($db);

//Get the raw categoryed data 

$data = json_decode(file_get_contents("php://input"));

//Set ID to update

$category->category_id = $data->id;

$category->category_name = $data->name;

//Update category

if($category->update()){
    echo json_encode(
        array('message' => 'category Updated')
    );
}else{
    echo json_encode(
        array('message' => 'category Not Updated')
    );
}