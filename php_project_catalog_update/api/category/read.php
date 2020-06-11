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

//Category query
    $result = $category->read();

//Get row count

    $num = $result->rowCount();

//Verify if exist a category
    
    if($num > 0){
        $category_arr = array();
        $category_arr['data'] = array();


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            
            $category_item = array(
                'category_id' => $category_id,
                'name' => $category_name,
            );

            //Push to "data"
            array_push($category_arr, $category_item);
        }

        echo json_encode($category_arr);
//If there is no categories
    }else{
    
        echo json_encode(
            array('message' => 'No Product Found')
        );
    }
