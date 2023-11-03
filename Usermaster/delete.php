<?php
    include "connection.php";
    if(isset($_GET['no'])){
        $id = $_GET['no'];
        $sql = "DELETE from user_master where User_Id='$id' ";
        $conn->query($sql); 
    }
    header('location:index.php');
    exit;
?>