<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: DELETE');
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

//Set ID to delete

$category->category_id = $data->id;

//Delete category

if($category->delete()){
    echo json_encode(
        array('message' => 'category Deleted')
    );
}else{
    echo json_encode(
        array('message' => 'category Not Deleted')
    );
}