<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "Challenge3";  
      
    $conn = new mysqli('localhost','root','','Challenge3');  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  