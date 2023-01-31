<?php
$cur_id ="1";
?>
<?php
$cus_id = "1";
if(isset($_POST["btn_remove"])){
    $id = $_GET["id"];
    include('connection.php');  
    $query = "Delete from 'cart' where 'cart', 'produkte_id' = '$id'";
    if(myslqi_query($connect, $query)){
        echo <script> window.loaction="shopping_cart.php"</script>
    }
}
?>

<?php

?>