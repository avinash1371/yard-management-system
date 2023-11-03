<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./despatchstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Yard Despatch</title>

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
            <a class="navbar-brand" href="./index.php">Yard Receipt Operations</a>
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
                    <th>Despatch Id</th>
                    <th>Transport Type</th>
                    <th>Despatch Date</th>
                    <th>Sale Order Id</th>
                    <th>Despatch Qty in Tons</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connect.php";
                $sql = "SELECT * FROM yard_despatches";

                $result = $conn->query($sql);

               if (!$result) {
                    die("Invalid query");
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$row['Despatch_id']}</td>
                            <td>{$row['Transport_type']}</td>
                            <td>{$row['Despatch_Date']}</td>
                            <td>{$row['Sale_Order_id']}</td>
                            <td>{$row['Despatched_Qty_in_Tons']}</td>
                            <td>{$row['Remarks']}</td>
                            <td>
                                <a class='btn btn-success' href='edit.php?no=$row[Despatch_id]'>Edit</a>
                                <a class='btn btn-danger' href='delete.php?no=$row[Despatch_id]''>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
