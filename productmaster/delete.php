<?php
    include "connection_1.php";
    if(isset($_GET['no'])){
        $id = $_GET['no'];
        $sql = "DELETE from product_master where Product_id='$id' ";
        $conn->query($sql); 
    }
    header('location:index.php');
    exit;
?>