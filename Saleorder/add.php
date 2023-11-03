<?php
include "connect.php";

if(isset($_POST['submit'])){
    $Sale_Order_Id=$_POST['Sale_Order_Id'];
    $Sale_Order_Date=$_POST['Sale_Order_Date'];
    $Customer_Id=$_POST['Customer_Id'];
    $Product_Id=$_POST['Product_Id'];
    $Sale_Order_Qty_in_Tons=$_POST['Sale_Order_Qty_in_Tons'];
    $Remarks=$_POST['Remarks'];

    $q = " INSERT INTO `sale_order` (`Sale_Order_Id`, `Sale_Order_Date`, `Customer_Id`, `Product_Id`,`Sale_Order_Qty_in_Tons`, `Remarks`) values('$Sale_Order_Id','$Sale_Order_Date','$Customer_Id','$Product_Id','$Sale_Order_Qty_in_Tons','$Remarks')";
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
    <link rel="stylesheet" href="./saleorderstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sale Order </title>

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
        <a class="navbar-brand" href="index.php">Sale Order Operations</a>
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
        <h1>Create New Sale Order</h1>
        <div class="input-box">
        <input type="text" placeholder="Sale_Order_Id" id="Sale_Order_Id" name="Sale_Order_Id" required>
      </div>  
      <div class="input-box">
        <input type="date" placeholder="Sale_Order_Date" id="Sale_Order_Date" name="Sale_Order_Date" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Customer_Id" id="Customer_Id" name="Customer_Id" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_Id" id="Product_Id" name="Product_Id" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="Sale_Order_Qty_in_Tons" id="Sale_Order_Qty_in_Tons" name="Sale_Order_Qty_in_Tons" required>
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