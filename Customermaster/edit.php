<?php
include "connection.php";

$no = "";
$cname = "";
$address="";
$city="";
$pin="";
$phoneno="";
$email="";
$grade = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['no'])) {
        header("location:Pages/Customermaster/index.php");
        exit;
    }

    $no = mysqli_real_escape_string($conn, $_GET['no']);

    $sql = "select * from customer_master where Customer_No='$no'";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
    
     while (!$row) {
     header("location: Pages/Customermaster/index.php");
     exit;
     }
     $cname = $row["Customer_Name"];
     $address = $row["Customer_Address"];
     $city = $row["City"];
     $pin = $row["Pin"];
     $phoneno = $row["Phone_No"];
     $email = $row["Email_id"];
     $grade = $row["Product_Grade"];
    
} else {

    if (isset($_POST["Customer_No"])) {
        $no = $_POST["Customer_No"];
    }

    if (isset($_POST["Customer_Name"])) {
        $cname = $_POST["Customer_Name"];
    }

    if (isset($_POST["Customer_Address"])) {
        $address = $_POST["Customer_Address"];
    }

    if (isset($_POST["City"])) {
        $city = $_POST["City"];
    }

    if (isset($_POST["Pin"])) {
        $pin = $_POST["Pin"];
    }

    if (isset($_POST["Phone_No"])) {
        $phoneno = $_POST["Phone_No"];
    }

    if (isset($_POST["Email_Id"])) {
        $email = $_POST["Email_Id"];
    }

    if (isset($_POST["Product_Grade"])) {
        $grade = $_POST["Product_Grade"];
    }
    $sql = "update customer_master set Customer_No='" . mysqli_real_escape_string($conn, $no) . "', Customer_Name='" . mysqli_real_escape_string($conn, $cname) . "', Customer_Address='" . mysqli_real_escape_string($conn, $address) ."', City='" . mysqli_real_escape_string($conn, $city) ."', Pin='" . mysqli_real_escape_string($conn, $pin) . "', Phone_No='" . mysqli_real_escape_string($conn, $phoneno) . "', Email_id='" . mysqli_real_escape_string($conn, $email) . "', Product_Grade='" . mysqli_real_escape_string($conn, $grade) . "' where Customer_No='" . mysqli_real_escape_string($conn, $no) . "'";

    $result = $conn->query($sql);

    if ($result) {
        echo '<script> 
        window.location.href="index.php"; 
        alert("Updated Successfully")
        header("location:index.php");
        </script>';
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
<nav class="navbar navbar-expand-lg navbar-dark " class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Customer Master</a>
        <div class="collapse navbar-collapse" no="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<br>

<form method="post">
    <div class="container">
        <h1>Update Customer</h1>
      <div class="input-box">
        <input type="text" placeholder="Customer_No" id="Customer_No" name="Customer_No" value="<?php echo $no; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Customer_Name" id="Customer_Name" name="Customer_Name" value="<?php echo $cname; ?>"required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Customer_Address" id="Customer_Address" name="Customer_Address" value="<?php echo $address; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="City" id="City" name="City" value="<?php echo $city; ?>" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="Pin" id="Pin" name="Pin" value="<?php echo $pin; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Phone_No" id="Phone_No" name="Phone_No" value="<?php echo $phoneno; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Email_Id" id="Email_Id" name="Email_Id" value="<?php echo $email; ?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Product_Grade" id="Product_Grade" name="Product_Grade" value="<?php echo $grade; ?>" required>
      </div>
      <button class="btn btn-success" type="submit" name="submit">Update</button>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

</div>

 </form>
 </div>
</body>
</html>