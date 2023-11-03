<?php
    $host="localhost";
    $usr="root";
    $pass="";
    $database="project";
    $port=3306;

    $conn = new mysqli("$host", "$usr", "$pass", "$database", "$port");

if ($conn->connect_error)
{
    die("Connection Failed". $Conn-›connect_error);
}
    echo " ";

?>