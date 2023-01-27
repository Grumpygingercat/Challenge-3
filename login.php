<?php      
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $result = mysql_querry("select * from customer where username = '$username' and password = '$password'") or 
        die("Failed to querry database ".mysql_error());
        $row = mysql_fetch_array($result);
        if ($row['username']==$username && $row['password']==$password){
            echo "login sucessful ".$row['$username'];
        } else{
            echo "failed";
        }
?>  