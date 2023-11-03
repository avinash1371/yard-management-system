<?php
include "connection.php";

$no = "";
$utype = "";
$uname="";
$email="";
$phoneno="";
$password = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (!isset($_GET['no'])) {
    header("location:index.php");
    exit;
  }

  $no = $_GET['no'];

  $sql = "select * from user_master where User_Id='$no'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  while (!$row) {
    header("location:index.php");
    exit;
  }

  $utype = $row["User_Type"];
  $uname = $row["User_name"];
  $email = $row["Email_Id"];
  $phoneno = $row["Phone_no"];
  $password = $row["Password"];
} else {
  if (isset($_POST["User_Id"])) {
    $no = $_POST["User_Id"];
  }

  if (isset($_POST["User_Type"])) {
    $utype = $_POST["User_Type"];
  }

  if (isset($_POST["User_name"])) {
    $uname = $_POST["User_name"];
  }

  if (isset($_POST["Email_Id"])) {
    $email = $_POST["Email_Id"];
  }

  if (isset($_POST["Phone_no"])) {
    $phoneno = $_POST["Phone_no"];
  }

  if (isset($_POST["Password"])){
    $password = $_POST["Password"];
  }

  $sql = "update user_master set User_Id='" . mysqli_real_escape_string($conn, $no) . "', User_Type='" . mysqli_real_escape_string($conn, $utype) . "', User_name='" . mysqli_real_escape_string($conn, $uname) . "', Email_Id='" . mysqli_real_escape_string($conn, $email) . "', Phone_no='" . mysqli_real_escape_string($conn, $phoneno) . "', Password='" . mysqli_real_escape_string($conn, $password) . "' where User_Id='" . mysqli_real_escape_string($conn, $no) . "'";
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
    <link rel="stylesheet" href="./userstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Master</title>

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
        <a class="navbar-brand" href="index.php">User Master Operations</a>
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
      
        <h1>Update User</h1>
        <div class="input-box">
        <input type="text" placeholder="User_Id" id="User_Id" name="User_Id" value="<?php echo $no; ?>" required>
      </div>  
      <div>
        <form>
                <label>User_Type</label>
              </td>
                <td><input name="User_Type" id="User_Type" type="radio" value="ADMIN" <?php if ($utype == 'ADMIN') echo 'checked="checked"'; ?>" />ADMIN
                    <input name="User_Type" id="User_Type" type="radio" value="MKTG" <?php if ($utype == 'MKTG') echo 'checked="checked"'; ?>" />MKTG
                    
            </form></td>
      </div>
      <div class="input-box">
        <input type="text" placeholder="User_name" id="User_name" name="User_name" value="<?php echo $uname; ?>" required>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Email_Id" id="Email_Id" name="Email_Id" value="<?php echo $email; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Phone_no" id="Phone_no" name="Phone_no" value="<?php echo $phoneno; ?>" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" id="Password" name="Password" value="<?php echo $password; ?>" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Edit</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

    </div>
 </form>
 </div>
</body>
</html>