<?php
include "connection_1.php";

$no = "";
$desc = "";
$stock="";
$bno="";
$grade = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['no'])) {
        header("location:index.php");
        exit;
    }

    $no = $_GET['no'];

    $sql = "select * from product_master where Product_id='$no'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    while (!$row) {
        header("location:index.php");
        exit;
    }

    $desc = $row["Product_Desc"];
    $stock = $row["Stock_in_Tons"];
    $bno = $row["Bin_No"];
    $grade = $row["Product_Grade"];
} else {
    if (isset($_POST["Product_id"])) {
        $no = $_POST["Product_id"];
    }

    if (isset($_POST["Product_Desc"])) {
        $desc = $_POST["Product_Desc"];
    }

    if (isset($_POST["Stock_in_Tons"])) {
        $stock = $_POST["Stock_in_Tons"];
    }

    if (isset($_POST["Bin_No"])) {
        $bno = $_POST["Bin_No"];
    }

    if (isset($_POST["Product_Grade"])) {
        $grade = $_POST["Product_Grade"];
    }

    $sql = "update product_master set Product_id='" . mysqli_real_escape_string($conn, $no) . "', Product_Desc='" . mysqli_real_escape_string($conn, $desc) ."', Stock_in_Tons='" . mysqli_real_escape_string($conn, $stock) ."', Bin_No='" . mysqli_real_escape_string($conn, $bno) . "', Product_Grade='" . mysqli_real_escape_string($conn, $grade) . "' where Product_id='" . mysqli_real_escape_string($conn, $no) . "'";
    $result = $conn->query($sql);

    if ($result) {
        echo '<script> 
        window.location.href="index.php"; 
        alert("Updated Successfully")
        header("location:index.php");
        </script>';
    }
    else {
      echo "Error: " . mysqli_error($conn);    
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
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
<nav class="navbar navbar-expand-lg navbar-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Product Master Operations</a>
        <div class="collapse navbar-collapse" no="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Add.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <form method="post">
 <div class="container">
      
        <h1>Update Product</h1>
        <div class="input-box">
        <input type="text" placeholder="Product_id" id="Product_id" name="Product_id" value="<?php echo $no; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_Desc" id="Product_Desc" name="Product_Desc" value="<?php echo $desc; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Stock_in_Tons" id="Stock_in_Tons" name="Stock_in_Tons" value="<?php echo $stock; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Bin_No" id="Bin_No" name="Bin_No" value="<?php echo $bno; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_Grade" id="Product_Grade" name="Product_Grade" value="<?php echo $grade; ?>" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Udate</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

    </div>
 </form>
 </div>
</body>
</html>