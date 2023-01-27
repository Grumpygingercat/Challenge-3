<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

// to prevent SQL injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    mysql_connect("localhost","root","");
    mysql_select_db("Challenge3");

    $result = mysql_query("select * from customer where username ='$username' and password ='$password'") or 
    die("Failed to query Database ".mysql_error());
    $row = mysql_fetch_array($result);
    if($row['username']==$username $$ $row['password'] == $password){
    echo "login success";
    } else{
    echo "Failed";
    }
?>