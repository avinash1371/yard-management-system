<?php
    include "connection_1.php";
    if(isset($_POST['submit'])){
        $Product_Id = $_POST['Product_Id'];
        $Product_Desc = $_POST['Product_Desc'];
        $Stock_in_Tons = $_POST['Stock_in_Tons'];
        $Bin_No = $_POST['Bin_No'];
        $Product_Grade = $_POST['Product_Grade'];
        $q = " INSERT INTO `product_master`(`Product_Id`, `Product_Desc`, `Stock_in_Tons`, `Bin_No`, `Product_Grade`) VALUES ( '$Product_Id', '$Product_Desc','$Stock_in_Tons','$Bin_No','$Product_Grade')";
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
    <link rel="stylesheet" href="./productstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product Master</title>

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
        <a class="navbar-brand" href="index.php">Product Master Operations</a>
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
      
        <h1>Create New Product</h1>
      <div class="input-box">
        <input type="text" placeholder="Product_Id" id="Product_Id" name="Product_Id" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_Desc" id="Product_Desc" name="Product_Desc" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Stock_in_Tons" id="Stock_in_Tons" name="Stock_in_Tons" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Bin_No" id="Bin_No" name="Bin_No" required>
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