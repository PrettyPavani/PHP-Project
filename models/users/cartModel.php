
<?php
include 'config.php';

class User extends Dbconnection {
    
    public function __construct(){       
        parent::__construct();
    }
    
    public function addToCart()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {  
            $userId = $_SESSION['user_id'];
            if(isset($_POST['addToCart'])) {
                $itemId = $_POST["itemId"];        
                $existSql = "SELECT * FROM `cart` WHERE pizzaid = '$itemId' AND `user_id`='$userId'";
                $result = $this->connection->query($existSql);               
                
                $numExistRows = mysqli_num_rows($result); 
                if($numExistRows > 0){               
                echo "<script>window.history.back(1);</script>";
            }else{
                $sql = "INSERT INTO `cart` (`pizzaid`, `quantity`, `user_id`, `createdate`) VALUES ('$itemId', '1', '$userId', current_timestamp())";   
                $result = $this->connection->query($sql);    
                if ($result){
                    echo "<script>window.history.back(1);</script>";
                }
            }
        } 
    }
}
    public function removeItem(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {  
            $userId = $_SESSION['user_id'];
            $itemId = $_POST["itemId"];
            $sql = "DELETE FROM `cart` WHERE `pizzaid`='$itemId'";             
            
            try{
                $result = $this->connection->query($sql);               
                if(!$result){
                    throw new Exception("Error in selecting values");
                }else{
                    echo "<script>window.history.back(1);</script>";
                }
            }catch(Exception $e){
               echo "Message: " .$e->getMessage();
          }
        }
        
    } 
       
    }    
    
$removeitem = new User();

