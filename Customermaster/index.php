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
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Customer Master Operations</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-white nav-link active" href="./add.php">AddNew</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content container -->
    <div class="container mt-4">

        <!-- Table with Bootstrap styling -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Customer Number</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Pin</th>
                    <th>Phone Number</th>
                    <th>Email ID</th>
                    <th>Product Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";

                // Write a SQL query to select all rows from the `bin_master` table
                $sql = "SELECT * FROM customer_master";

                // Execute the query and store the result in a variable
                $result = $conn->query($sql);

                // If the query fails, display an error message
                if (!$result) {
                    die("Invalid query");
                }

                // Iterate over the result set and print each row to the table
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$row['Customer_No']}</td>
                            <td>{$row['Customer_Name']}</td>
                            <td>{$row['Customer_Address']}</td>
                            <td>{$row['City']}</td>
                            <td>{$row['Pin']}</td>
                            <td>{$row['Phone_No']}</td>
                            <td>{$row['Email_id']}</td>
                            <td>{$row['Product_Grade']}</td>
                            <td>
                                <a class='btn btn-success' href='edit.php?no=$row[Customer_No]'>Edit</a>
                                <a class='btn btn-danger' href='delete.php?no=$row[Customer_No]''>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
