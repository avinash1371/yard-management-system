<?php
include "connection_1.php";

$no = "";
$desc = "";
$loc = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['no'])) {
        header("location:index.php");
        exit;
    }

    $no = $_GET['no'];

    $sql = "select * from bin_master where Bin_No='$no'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    while (!$row) {
        header("location: index.php");
        exit;
    }

    $desc = $row["Bin_Desc"];
    $loc = $row["Bin_Location"];
} else {
    if (isset($_POST["Bin_No"])) {
        $no = $_POST["Bin_No"];
    }

    if (isset($_POST["Bin_Desc"])) {
        $desc = $_POST["Bin_Desc"];
    }

    if (isset($_POST["Bin_Location"])) {
        $loc = $_POST["Bin_Location"];
    }

    $sql = "update bin_master set Bin_No='" . mysqli_real_escape_string($conn, $no) . "', Bin_Desc='" . mysqli_real_escape_string($conn, $desc) . "', Bin_Location='" . mysqli_real_escape_string($conn, $loc) . "' where Bin_No='" . mysqli_real_escape_string($conn, $no) . "'";
    $result = $conn->query($sql);

    if ($result) {
        echo '<script> 
        window.location.href="index.php"; 
        alert("Updated Successfully")
        header("location:index.php");
        </script>';
    }
    //else {
    //    echo "Error: " . mysqli_error($conn);
    //}
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./binstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bin Master</title>

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
        <a class="navbar-brand" href="index.php">Bin Master Operations</a>
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
      
        <h1>Update Bin</h1>
      <div class="input-box">
        <input type="text" placeholder="Bin_No" id="Bin_No" name="Bin_No" value="<?php echo $no; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Bin_Desc" id="Bin_Desc" name="Bin_Desc" value="<?php echo $desc; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Bin_Location" id="Bin_Location" name="Bin_Location" value="<?php echo $loc; ?>" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit" >Update</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
 </div>
 </form>
 </div>
</body>
</html>