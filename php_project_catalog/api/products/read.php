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

//Product query
    $result = $product->read();

//Get row count

    $num = $result->rowCount();

//Verify if exist a product
    
    if($num > 0){
        $products_arr = array();
        $products_arr['data'] = array();


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            
            $product_item = array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'category_name' => $category_name,
                'created_date' => $CreatedDate,
                'updated_date' => $UpdatedDate
            );

            //Push to "data"
            array_push($products_arr, $product_item);
        }

        echo json_encode($products_arr);
//If there is no products
    }else{
    
        echo json_encode(
            array('message' => 'No Product Found')
        );
    }
