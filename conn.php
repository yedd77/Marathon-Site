<?php
$conn = new mysqli("localhost", "root", "root", "marathon");

if($conn->connect_error){
    die ("connnection: " . $conn->connect_error);
}
else echo "successful <br>";
?>