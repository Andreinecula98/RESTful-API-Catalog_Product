<?php
//Headers
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once '../../config/Database.php';
    include_once '../../models/category.php';

//Instantiate Database & connect
    $database = new DataBase();
    $db = $database->connect();

//Instantiate category
    $category = new category($db);

//Get ID
    $category->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get category
    $category->read_single();

//Create array
$category_arr = array(
    'id' => $category->category_id,
    'name' => $category->category_name,
);

//Make a JSON
print_r(json_encode($category_arr));