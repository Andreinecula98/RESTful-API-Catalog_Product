
<?php

    ini_set("display_errors", 1);

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
        $user->password = password_hash($data->password, PASSWORD_DEFAULT);

        $username_data = $user->check_username();

        if(!empty($username_data)){
            http_response_code(500);
            echo json_encode(array(
                "status" => 0,
                "message" => "Username already exist, try another one!"
            ));
        }else{
            
            if($user->create_user()){

                http_response_code(200);
                echo json_encode(array(

                    "status" => 1,
                    "message" => "User created"
                ));

            }else{

                http_response_code(500);
                echo json_encode(array(

                    "status" => 0,
                    "message" => "Failed to create a new user"
                ));
            }
        }

    }else{
        http_response_code(500);
        echo json_encode(array(

            "status" => 0,
            "message" => "All data needed"
        ));
    }

}else{

    http_response_code(503);
    echo json_encode(array(

        "status" => 0,
        "message" => "Acces Denied"
    ));
}