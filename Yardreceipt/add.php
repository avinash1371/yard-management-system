<?php
include "connect.php";

if(isset($_POST['submit'])){
    $Receipt_id=$_POST['Receipt_id'];
    $Transport_type=$_POST['Transport_type'];
    $Product_id=$_POST['Product_id'];
    $Received_Date=$_POST['Received_Date'];
    $Received_Qty_in_Tons=$_POST['Received_Qty_in_Tons'];
    $Remarks=$_POST['Remarks'];

    $q = " INSERT INTO `yard_receipt` (`Receipt_id`, `Transport_type`, `Product_id`, `Received_Date`,`Received_Qty_in_Tons`, `Remarks`) values('$Receipt_id','$Transport_type','$Product_id','$Received_Date','$Received_Qty_in_Tons','$Remarks')";
	$query = mysqli_query($conn,$q);	

    if($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./receiptstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Yard Receipt</title>

</head>
<body>
<div class="header">
    <img src="../images/vsp logo.png" alt="RINL Logo" class="logo">
    <h1>Yard Management System</h1>
  </div>
  <div class="welcome">
    <h2>Welcome to the Menu Page</h2>
  </div>
  
    <ul class="menu">
        <li class="menu-item">Receipts
            <ul class="submenu">
                <li><a href="../Yardreceipt/index.php">Truck</a></li>
                <li><a href="../Yardreceipt/index.php">Rail</a></li>
            </ul>
        </li>
        <li class="menu-item">Dispatch
            <ul class="submenu">
                <li><a href="../Yarddespatches/index.php">Truck</a></li>
                <li><a href="../Yarddespatches/index.php">Rail</a></li>
            </ul>
        </li>
        <li class="menu-item">Sale Order
            <ul class="submenu">
                <li><a href="../Saleorder/index.php">Sale Order</a></li>
            </ul>
        </li>    
        <li class="menu-item">Masters
            <ul class="submenu">
                <li><a href="../Usermaster/index.php">User</a></li>
                <li><a href="../Customermaster/index.php">Customer</a></li>
                <li><a href="../Productmaster/index.php">Product</a></li>
                <li><a href="../Binmaster/index.php">Bin</a></li>
            </ul>
        </li>
        <li class="menu-item"><a href="../HomePage/homePage.html">Logout</a></li>
    </ul>
    <br>
<nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Yard Receipt Operations</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><span style="font-size:larger;"></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<br>
<form method="post">
    <div class="container">
        <h1>Create New Yard Receipt</h1>
        <div class="input-box">
        <input type="text" placeholder="Receipt_id" id="Receipt_id" name="Receipt_id" required>
      </div>  
      <div>
        <form>
                <label>Transport_Type</label>
              </td>
                <td><input name="Transport_type" id="Transport_type" type="radio" value="TRUCK" />TRUCK
                    <input name="Transport_type" id="Transport_type" type="radio" value="RAIL"  />RAIL
                    
            </form></td>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_id" id="Product_id" name="Product_id" required>
      </div>
      <div class="input-box">
        <input type="date" placeholder="Received_Date" id="Received_Date" name="Received_Date" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="Received_Qty_in_Tons" id="Received_Qty_in_Tons" name="Received_Qty_in_Tons" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Remarks" id="Remarks" name="Remarks" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Add</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

</div>
</form>
</body>
</html>