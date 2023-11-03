<?php
    include "connect.php";
    if(isset($_GET['no'])){
        $id = $_GET['no'];
        $sql = "DELETE from sale_order where Sale_Order_Id='$id' ";
        $conn->query($sql); 
    }
    header('location:index.php');
exit;
?>