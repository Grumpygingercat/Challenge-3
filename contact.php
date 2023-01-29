<?php
    include('connection.php');
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


        $stmt = $conn->prepare("insert into contactformular(first_name, last_name, email, message)
        values(?,?,?,?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $message);
        $execval = $stmt->execute();
        $stmt->close();
        $conn->close();
        echo file_get_contents("registerSuccessful.html");
    ?>