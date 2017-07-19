<?php

class Crud{

    private $host="localhost";
    private $usr="armando";
    private $bd = "merakysys";
    private $pwd="123456789";

    private $conn ="";

    function __construct(){
        $this->conn = new mysqli($this->host, $this->usr, $this->pwd, $this->bd);
        if($this->conn->connect_error){
            die("Connection failed:" . $this->conn->connect_error);
        }
    }

    function update($query){
        
    }

    function delete($query){

    }

    function insert($query){
        if ($this->conn->query($query) === TRUE) {
            echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
            return false;
        }
    }

    function consult($query){
        $rows = array();
        if($result = $this->conn->query($query)){
            while($row = $result->fetch_assoc()){
                $rows[] = $row; 
            }
        }
        return $rows;
    }

}

?>