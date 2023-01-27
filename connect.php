<?php
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database connection
    $conn = new mysqli('localhost','root','','Challenge3');
    if($conn->connect_error){
        die("Connection Failed : ".$conn->connect_error);
    }else {
        $stmt = $conn->prepare("insert into customer(username, first_name, last_name, email, password)
        values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $username, $first_name, $last_name, $email, $password);
        $execval = $stmt->execute();
        echo $execval;
        echo "registration sucessfully...";
        $stmt->close();
        $conn->close();
    }
    ?>