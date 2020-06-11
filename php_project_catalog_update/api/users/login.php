<?php
    $count = 0;
    $delay = time();
?>
<?php

    ini_set("display_errors", 1);

    //include ventor

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

        $data = json_decode(file_get_contents("php://input"));
        
            if(!empty($data->username) && !empty($data->password)){

                $user->username = $data->username;

                $user_data = $user->check_login();
            
                if(!empty($user_data)){

                    $usernaname = $user_data['username'];
                    $password = $user_data['password'];

                    if(password_verify($data->password,$password)){//normal password vs hashed password


                        $iss = "loaclhost:8080";
                        $iat = time();
                        $nbf = $iat + 10;
                        $exp = $iat + 60;
                        $aud = "myusers";
                        $user_arr_data = array(
                        "id" => $user_data["id"],
                        "username" => $user_data["username"]
                        );

                        $secret_key = "secretkey";

                        $payload_info = array(
                            "iss"=>$iss, //issue by
                            "iat"=>$iat, //issued at
                            "nbf"=>$nbf, //not before, using it for a time
                            "eat"=>$exp, //expiration time 
                            "aud"=>$aud,
                            "data"=>$user_arr_data
                        );
                    
                        $jwt = JWT::encode($payload_info, $secret_key, 'HS512');

                        http_response_code(200);
                        echo json_encode(array(
                        "status" => 1,
                        "jwt" => $jwt,
                        "message" => "User logged in successfully"
                        ));
                    }else{
                        http_response_code(404);
                        echo json_encode(array(
                        "status" => 0,
                        "message" => "Invalid credentials"
                        ));

                    }

                }else{
                    http_response_code(404);
                    echo json_encode(array(  
                    "status" => 0,
                    "message" => "Invalid credentials"
                ));
                }

        }else{
                
            http_response_code(500);
            echo json_encode(array(
                "status" => 0,
                "message" => "All data needed"
            ));
        }      
    }
    
?>