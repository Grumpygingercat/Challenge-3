<?php
$cus_id = "1";
?>

<!-- Remove button -->
<?php
$cus_id = "1";
if (isset($_POST["btn_remove"])){
    $id = $_GET["id"];
    $connect = mysqli_connect("localhost", "root", "", "challenge3");
    $query = "DELETE FROM `cart` WHERE `cart`.`cart_id` = '$id'";
    if(mysqli_query($connect, $query))
      {
           echo '<script>window.location="cart.php"</script>';
      }
    }
?>

<!--order button-->
<?php
  if (isset($_POST["btn_order"])){
    $query="select * from cart where user_id='$cus_id'";
    $connect = mysqli_connect("localhost", "root", "", "challenge3");
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))
    {
      //simple order records insert into order table
       mysqli_query($connect, "INSERT INTO `orders` (`user_id`, `t_shirt_id`) VALUES ('$cus_id', '$row[1]')");
     }
     //delete current data drom from cart table after place order
     mysqli_query($connect, "delete from cart where user_id='$cus_id'");
     //order successfully message
     echo '<script>alert("Die Bestellung wurde erflogreich aufgenommen")</script>';
     //redirect site
     echo '<script>window.location="cart.php"</script>';
  }
 ?>

<!doctype html>
<html>
<head>
  <title>Shoping Cart</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset="utf-8">
<style>
.main
{
  float: left;
}
header {
    background-color: #333;
    color: #fff;
    padding: 20px;
  }
  
  header nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
  }
  
  header nav ul li {
    margin-right: 20px;
  }
  
  header nav ul li a {
    color: #fff;
    text-decoration: none;
  }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: 25px;
  text-align: center;
  font-family: arial;
}
.price {
  color: grey;
  font-size: 22px;
}
.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #333;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.card button:hover {
  opacity: 0.7;
}

/************/
body {
  font-family: arial;
  color: #333;
}
.left {
  height: 85%;
  width: 75%;
  position: fixed;
  z-index: 1;
  top: 100px;
  overflow-x: hidden;
  padding-top: 20px;
  left: 0;
  background-color:#f1f1f1;
}
.right {
  height: 100%;
  width: 25%;
  position: fixed;
  z-index: 1;
  top: 100px;
  overflow-x: hidden;
  padding-top: 10px;
  right: 0;
  background-color: #ccc;
}

/************/
body {
  font-family: Arial;
  font-size: 17px;
  padding: 0px;
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
span.price {
  float: right;
  color: grey;
}
</style>
</head>


<body>
<header>
        <nav>
          <ul>
            <li><a href="Challenge3.html"><img src="IMG/BHH ITECH.png" alt="BHHITECH" width="30" height="30" ALIGN="CENTER"></a></li>
            <li><a href="Challenge3.html">Startseite</a></li>
            <li><a href="about.html">??ber uns</a></li>
            <li><a href="contact.html">Kontakt</a></li>
            <li><a href="login.html">Einloggen</a></li>
            <li><a href="cart.php">Kiste</a></li>
          </ul>
        </nav>
      </header>
 <!--cart items-->
 <div class="split left">
  <div class="centered">
  <?php
        $con = mysqli_connect("localhost", "root", "");
        mysqli_select_db($con , "challenge3");
        $count = 0;
        //search current user's cart details
        $query = "SELECT * FROM t_shirt INNER JOIN cart ON cart.t_shirt_id = t_shirt.t_shirt_id WHERE cart.user_id = '" . $cus_id ."'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))
          {
            echo'
              <form method="POST" action="cart.php?action=add&id='.$row[5].'">
                <div class="main">
                  <div class="card">
                      <img src="data:image/jpeg;base64,'.base64_encode($row['2'] ).'" alt="Bild" style="width:210px;height:250px;>
                      <p class="price">'.$row[1].'</p>
                      <p>Preis: '.$row[4].'???</p>
                      <p>Gr????e: '.$row[3].'</p>
                      <p><button name="btn_remove">Remove</button></p>
                    </div>
                  </div>
              </form>
                ';
            }
   ?>
 </div>
</div>

<!--cart summery-->
<div class="split right">
  <div class="centered">
      <form method="POST" action="cart.php?action=add">
        <div class="col-25">
          <div class="container">
            <h4>Kiste
              <span class="price" style="color:black">
                <i class="fa fa-shopping-cart"></i>
                <b></b><br/>
              </span><br/><br/>
            </h4>
            <?php
                  $total = 0;
                  $con = mysqli_connect("localhost", "root", "");
                  mysqli_select_db($con , "challenge3");
                  $query = "SELECT * FROM t_shirt INNER JOIN cart ON cart.t_shirt_id = t_shirt.t_shirt_id WHERE cart.user_id = '" . $cus_id ."'";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                    {
                      echo'
                            <p><a href="#">'.$row[1].'</a> <span class="price">'.$row[4].'???</span></p>
                          ';
                          $total = $total + $row[4];
                    }
             ?>
            <hr>
            <p>Insgesamt <span class="price" style="color:black"><b><?php echo''.$total.''; ?>???</b></span></p>
            <hr>
            <p><button name="btn_order">Bestellen</button></p>
          </div>
        </div>
      </form>
 </div>
</div>
</body>
</html>
