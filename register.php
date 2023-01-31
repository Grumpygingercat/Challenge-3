<?php
    include('connection.php');
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

        $stmt = $conn->prepare("insert into customer(username, first_name, last_name, email, phone, address, password)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $username, $first_name, $last_name, $email, $phone, $address, $password);
        $execval = $stmt->execute();
        $stmt->close();
        $conn->close();
        echo file_get_contents("registerSuccessful.html");
    ?>