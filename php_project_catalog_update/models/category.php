<?php

class Category{
    private $conn;
    private $table = 'categories';

    public $category_id;
    public $category_name;

    public function __construct($db){
        $this->conn = $db;
    }

    //Get Categories
    public function read(){
        //Create query
        $query = 'SELECT 
                c.name as category_name,
                c.category_id
            FROM
                '. $this->table . ' c';
        
        //Prepare statment
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    //Get Single Category

    public function read_single(){
        //Create query
        $query = 'SELECT 
                c.name as category_name,
                c.category_id
            FROM
                '. $this->table . ' c
            WHERE
                c.category_id = ?
            LIMIT 0,1';

        //Prepare statment
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->id);

        //Execute query
        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set properties

        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }


    //Create Category

    public function create(){
        //Create query()

        $query = 'INSERT INTO ' . 
            $this->table .'
            SET
                name = :name
            ';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data

        $this->category_name = htmlspecialchars(strip_tags($this->category_name));

        $stmt->bindParam(':name', $this->category_name);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }


    //Update Category

    public function update(){
        //Create query()
        $query = 'UPDATE ' . 
            $this->table .'
            SET
                name = :name
            WHERE category_id = :id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data

        $this->category_name = htmlspecialchars(strip_tags($this->category_name));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        $stmt->bindParam(':name', $this->category_name);
        $stmt->bindParam(':id', $this->category_id);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }
    

    //Delete Category

    public function delete(){
        //Create query()

        $query = 'DELETE FROM ' . $this->table .' WHERE category_id = :id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data

        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        $stmt->bindParam(':id', $this->category_id);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }
}
