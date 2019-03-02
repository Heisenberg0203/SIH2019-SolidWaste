<?php 
include_once 'includes/dbh.inc.php';
//include_once 'layout/header.php';

session_start();
$current_user="superuser";
if(isset($_SESSION["current_user"])){
  $current_user=$_SESSION["current_user"];
}



if(isset($_POST["submit"])){

$user_name = $current_user;
$order_number = mysqli_real_escape_string($conn,$_POST['order_number']);
$collect_date = mysqli_real_escape_string($conn,$_POST['collect_date']);



$sql="update order_details set collectdate='$collect_date' where orderno='$order_number'";
mysqli_query($conn,$sql);


  echo "<script> alert('Request sent Successfully'); </script>";
 echo "<script> window.location.replace('index.php'); </script>";

}

?>
<html>
<head>
<title>Collect Request</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
   /*#93c572;*/
}

* {
  box-sizing: border-box;
}

.container {
  padding: 12px;
  background-color: white;
 
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

.full {
  background-color: #ddd;
  outline: none;
}
.half{
	float: left;
	width: 50%;
	padding: 1%;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
h1{
	text-align: center;
}

.orderbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.orderbtn:hover {
  opacity: 1;
}

.inputtype{
  width: 24vw;
  background-color: #ddd;
  padding: 8px 10px;
  border: none;
  cursor: pointer;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>



<form class="signup-form"  method="POST">
  <div class="container">
    <h1>Send Collect Request for your Order</h1>
    <hr>
    <div style="float:left;position:absolute;width:50%;">
    <label><b>Order Number</b></label>
    <input type="number" placeholder="Order Number"  name="order_number" class="inputtype" required>
    <div style="float:right;position:relative;width:50%;">
    
    
    </div>
  </div>
  <br><br><br><br>

   
    
    

<div style="float:left;position:absolute;width:50%;">
     <label><b>Collect Date</b></label>
    
    <input type="date" placeholder="Collect Date"  name="collect_date" class="inputtype" required>
    </div>
  <br><br><br><br>
  

    <button type="submit" class="orderbtn" name="submit">Send</button>
  </div>
  
  
</form>

</body>
</html>
