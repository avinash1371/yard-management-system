<?php
include "connect.php";

$no = "";
$ttype = "";
$pid="";
$date="";
$qty="";
$remarks = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (!isset($_GET['no'])) {
    header("location:index.php");
    exit;
  }

  $no = $_GET['no'];

  $sql = "select * from yard_receipt where Receipt_id='$no'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  while (!$row) {
    header("location:index.php");
    exit;
  }

  $ttype = $row["Transport_type"];
  $pid = $row["Product_id"];
  $date = $row["Received_Date"];
  $qty = $row["Received_Qty_in_Tons"];
  $remarks = $row["Remarks"];
} else {
  if (isset($_POST["Receipt_id"])) {
    $no = $_POST["Receipt_id"];
  }

  if (isset($_POST["Transport_type"])) {
    $ttype = $_POST["Transport_type"];
  }

  if (isset($_POST["Product_id"])) {
    $pid = $_POST["Product_id"];
  }

  if (isset($_POST["Received_Date"])) {
    $date = $_POST["Received_Date"];
  }

  if (isset($_POST["Received_Qty_in_Tons"])) {
    $qty = $_POST["Received_Qty_in_Tons"];
  }

  if (isset($_POST["Remarks"])){
    $remarks = $_POST["Remarks"];
  }

  $sql = "update yard_receipt set Receipt_id='" . mysqli_real_escape_string($conn, $no) . "', Transport_type='" . mysqli_real_escape_string($conn, $ttype) . "', Product_id='" . mysqli_real_escape_string($conn, $pid) . "',Received_Date='" . mysqli_real_escape_string($conn, $date) . "',  Received_Qty_in_Tons='" . mysqli_real_escape_string($conn, $qty) . "', Remarks='" . mysqli_real_escape_string($conn, $remarks) . "' where Receipt_id='" . mysqli_real_escape_string($conn, $no) . "'";
  $result = $conn->query($sql);

  if ($result) {
    echo '<script> 
      window.location.href="index.php"; 
      alert("Updated Successfully")
      header("location:index.php");
      </script>';
  } else {
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
          <ul class="submenu">
                <li><a href="../Saleorder/index.php">Sale Order</a></li>
            </ul>
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
        <a class="navbar-brand" href="index.php">Yard Despatches Operations</a>
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
      
        <h1>Update Yard Receipt</h1>
        <div class="input-box">
        <input type="text" placeholder="Receipt_id" id="Receipt_id" name="Receipt_id" value="<?php echo $no; ?>" required>
      </div>  
      <div>
        <form>
                <label>Transport_Type</label>
              </td>
                <td><input name="Transport_type" id="Transport_type" type="radio" value="TRUCK" <?php if ($ttype == 'TRUCK') echo 'checked="checked"'; ?>" />TRUCK
                    <input name="Transport_type" id="Transport_type" type="radio" value="RAIL" <?php if ($ttype == 'RAIL') echo 'checked="checked"'; ?>" />RAIL
                    
            </form></td>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_id" id="Product_id" name="Product_id" value="<?php echo $pid; ?>" required>
      </div>
      <div class="input-box">
        <input type="date" placeholder="Received_Date" id="Received_Date" name="Received_Date" value="<?php echo $date; ?>" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="Received_Qty_in_Tons" id="Received_Qty_in_Tons" name="Received_Qty_in_Tons" value="<?php echo $qty; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Remarks" id="Remarks" name="Remarks" value="<?php echo $remarks; ?>" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Edit</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

    </div>
 </form>
 </div>
</body>
</html>