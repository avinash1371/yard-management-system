<?php
include "connection.php";

if(isset($_POST['submit'])){
    $User_Id=$_POST['User_Id'];
    $User_Type=$_POST['User_Type'];
    $User_name=$_POST['User_name'];
    $Email_Id=$_POST['Email_Id'];
    $Phone_no=$_POST['Phone_no'];
    $Password=$_POST['Password'];

    $q = " INSERT INTO `user_master` (`User_Id`, `User_Type`, `User_name`, `Email_Id`,`Phone_no`, `Password`) values('$User_Id','$User_Type','$User_name','$Email_Id','$Phone_no','$Password')";
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
        <a class="navbar-brand" href="index.php">User Master Operations</a>
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
        <h1>Create New User</h1>
        <div class="input-box">
        <input type="text" placeholder="User_Id" id="User_Id" name="User_Id" required>
      </div>  
      <div>
        <form>
                <label>User_Type</label>
              </td>
                <td><input name="User_Type" id="User_Type" type="radio" value="ADMIN" />ADMIN
                    <input name="User_Type" id="User_Type" type="radio" value="MKTG"  />MKTG
                    
            </form></td>
      </div>
      <div class="input-box">
        <input type="text" placeholder="User_name" id="User_name" name="User_name" required>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Email_Id" id="Email_Id" name="Email_Id" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Phone_no" id="Phone_no" name="Phone_no" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" id="Password" name="Password" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Add</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

</div>
</form>
</body>
</html>