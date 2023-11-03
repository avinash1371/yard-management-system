<?php
    include "connection_1.php";
    if(isset($_GET['no'])){
        $id = $_GET['no'];
        $sql = "DELETE from bin_master where Bin_No='$id' ";
        $conn->query($sql); 
    }
    header('location:index.php');
    exit;
?>