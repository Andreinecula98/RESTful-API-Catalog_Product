<?php

ini_set("display_errors", 1);
    
require '../../vendor/autoload.php';
use \Firebase\JWT\JWT;

//Headers
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: POST');

include_once '../../config/Database.php';
include_once '../../models/users.php';


//Instantiate Database & connect
$database = new DataBase();
$db = $database->connect();

//Instantiate product object

$user = new users($db);

//Get the raw product data 

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        
        //$data = json_decode(file_get_contents("php://input"));

        $all_headers = getallheaders();

        $data->jwt = $all_headers['Authorization'];

        if(!empty($data->jwt)){

            try{
                
                $secret_key = "secretkey";
                $decoded_data = JWT::decode($data->jwt, $secret_key, array('HS512'));

                http_response_code(200);
                
                $user_id =$decoded_data->data->id;
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Got JWT Token",
                    "user_data" => $decoded_data,
                    "user_id" => $user_id
                ));

            }catch(Execption $ex){

                http_response_code(500);
                echo json_encode(array(
                    "status" => 0,
                    "message" => $ex->getMessage()
                ));
            }
        }
    }
?>