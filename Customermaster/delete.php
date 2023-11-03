<?php
    include "connection.php";
    if(isset($_GET['no'])){
        $id = $_GET['no'];
        $sql = "DELETE from customer_master where Customer_No='$id' ";
        $conn->query($sql); 
    }
    header('location:index.php');
    exit;
?>