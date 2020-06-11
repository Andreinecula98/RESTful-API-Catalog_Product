<?php

    class Products{
        private $conn;
        private $table = 'products';

        public $id;
        public $user_id;
        public $category_id;
        public $category_name;
        public $name;
        public $price;
        public $created_date;
        public $updated_date;


        public function __construct($db){
            $this->conn = $db;
        }

        //Get Posts
        public function read(){
            //Create query
            $query = 'SELECT 
                    c.name as category_name,
                    p.id,
                    p.user_id,
                    p.category_id,
                    p.name,
                    p.price,
                    p.CreatedDate,
                    p.UpdatedDate
                FROM
                    '. $this->table . ' p
                LEFT JOIN
                    categories c ON p.category_id = c.category_id
                ORDER BY
                    p.CreatedDate DESC';
            
            //Prepare statment
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();

            return $stmt;
        }

        //Get Single Post

        public function read_single(){
            //Create query
            $query = 'SELECT 
                    c.name as category_name,
                    p.id,
                    p.user_id,
                    p.category_id,
                    p.name,
                    p.price,
                    p.createddate,
                    p.updateddate
                FROM
                    '. $this->table . ' p
                LEFT JOIN
                    categories c ON p.category_id = c.category_id
                WHERE
                    p.id = ?
                LIMIT 0,1';

            //Prepare statment
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();


            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties

            $this->name = $row['name'];
            $this->price = $row['price'];
            $this->user_id = $row['user_id'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['name'];
            $this->created_date = $row['createddate'];
            $this->updated_date = $row['updateddate'];

        }


        //Create Post

        public function create(){
            //Create query()

            $query = 'INSERT INTO ' . 
                $this->table .'
                SET
                    name = :name,
                    price = :price,
                    user_id = :user_id,
                    category_id = :category_id';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Clean data

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':category_id', $this->category_id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;

        }


        //Update Post

        public function update(){
            //Create query()
            $query = 'UPDATE ' . 
                $this->table .'
                SET
                    name = :name,
                    price = :price,
                    category_id = :category_id,
                    updateddate = current_timestamp()
                WHERE id = :id';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Clean data

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;

        }
        

        //Delete Post

        public function delete(){
            //Create query()

            $query = 'DELETE FROM ' . $this->table .' WHERE id = :id';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Clean data

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;

        }
    }
