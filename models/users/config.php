<?php 

class DBConnection{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'online_pizza_delivery';

    protected $connection;

    public function __construct(){
    
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database,3307);
            if(!$this->connection){
                echo 'Cannot connect to database server';
                exit;
            } 
        }
        return $this->connection;
        echo 'Connected Succesfully';
        die();
    }
}
?>