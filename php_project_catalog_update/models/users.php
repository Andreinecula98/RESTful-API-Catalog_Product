<?php 
    class Users{

        //define proprties
        private $conn;
        private $table = "users";
        private $table_login = "login_log";
        private $check_login_row;
        
        public $timer;
        public $username;
        public $password;
        public $time;
        public function __construct($db){
            $this->conn = $db;
        }

        //Create a user
        public function create_user(){

            $user_query = 'INSERT INTO ' 
            .$this->table. '
                SET 
                    username = :username,
                    password = :password';

            $stmt = $this->conn->prepare($user_query);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->password = htmlspecialchars(strip_tags($this->password));

            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);

            if ($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function check_username(){
            $username_query = 'SELECT * FROM ' .$this->table. ' WHERE username = :username';

            $stmt = $this->conn->prepare($username_query);

            $stmt->bindParam(':username', $this->username);

            if($stmt->execute()){
                
                return $stmt->fetch(PDO::FETCH_ASSOC); 
            }

            return array();
        }

        public function check_login(){
            
            $username_query = 'SELECT * FROM ' .$this->table. ' WHERE username = :username';
            
            $login_query = 'INSERT INTO ' .$this->table_login. ' SET username = :username';
            
            $stmt = $this->conn->prepare($username_query);
            $stmt_login = $this->conn->prepare($login_query);

            $stmt->bindParam(':username', $this->username);
            $stmt_login->bindParam(':username', $this->username);
            $stmt_login->execute();

            if($stmt->execute()){
                
                return $stmt->fetch(PDO::FETCH_ASSOC); 
            }

            return array();
        }

        

        public function check_login_attepmts(){
            $timer = time() - 30;
            $login_query = 'SELECT COUNT(*) AS total_count FROM ' .$this->table_login. ' WHERE username = :username AND try_time >' .$timer;

            $stmt = $this->conn->prepare($login_query);
            $stmt->bindParam(':username', $this->username);

            if($stmt->execute()){
                $check_login_row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $check_login_row['total_count'];
            }

            return array();

        }

    
    }