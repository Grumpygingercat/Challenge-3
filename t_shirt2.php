<?php
 include('connection.php');
 $size = $_POST['size'];

if($size == "s"){
    $stmt = $conn->prepare("INSERT INTO cart (user_id, t_shirt_id) VALUES (1, 4)");
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
    echo file_get_contents("Challenge3.html");
}
if($size == "m"){
    $stmt = $conn->prepare("INSERT INTO cart (user_id, t_shirt_id) VALUES (1, 5)");
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
    echo file_get_contents("Challenge3.html");
}
if($size == "l"){
    $stmt = $conn->prepare("INSERT INTO cart (user_id, t_shirt_id) VALUES (1, 6)");
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
    echo file_get_contents("Challenge3.html");
}
?>