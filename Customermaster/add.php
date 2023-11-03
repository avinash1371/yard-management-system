<?php
    include "connection.php";

    if(isset($_POST['submit'])) {
        $Customer_No = $_POST['Customer_No'];
        $Customer_Name = $_POST['Customer_Name'];
        $Customer_Address = $_POST['Customer_Address'];
        $City = $_POST['City'];
        $Pin = $_POST['Pin'];
        $Phone_No = $_POST['Phone_No'];
        $Email_Id= $_POST['Email_Id'];
        $Product_Grade = $_POST['Product_Grade'];

        $q = "INSERT INTO `customer_master`(`Customer_No`, `Customer_Name`, `Customer_Address`, `City`, `Pin`, `Phone_No`, `Email_Id`, `Product_Grade`) VALUES ('$Customer_No', '$Customer_Name','$Customer_Address','$City','$Pin','$Phone_No','$Email_Id','$Product_Grade')";
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
    <link rel="stylesheet" href="./customerstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Customer Master</title>

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
        <a class="navbar-brand" href="index.php">Customer Master Operations</a>
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
        <h1>Create New Customer</h1>
      <div class="input-box">
        <input type="text" placeholder="Customer_No" id="Customer_No" name="Customer_No" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Customer_Name" id="Customer_Name" name="Customer_Name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Customer_Address" id="Customer_Address" name="Customer_Address" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="City" id="City" name="City" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="Pin" id="Pin" name="Pin" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Phone_No" id="Phone_No" name="Phone_No" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Email_Id" id="Email_Id" name="Email_Id" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_Grade" id="Product_Grade" name="Product_Grade" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Add</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

</div>
</form>
</body>
</html>