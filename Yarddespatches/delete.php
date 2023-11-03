<?php
    include "connect.php";
    if(isset($_GET['no'])){
        $id = $_GET['no'];
        $sql = "DELETE from yard_despatches where Despatch_id='$id' ";
        $conn->query($sql); 
    }
    header('location:index.php');
exit;
?>