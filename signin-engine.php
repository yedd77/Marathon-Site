<?php
include 'conn/conn.php';

//retrieve data and set it into variable 
$SIic_num = $_REQUEST["IC_num"];
$SIemail = $_REQUEST["email"];

//perform query 
$query_admin = "SELECT * FROM registration WHERE 'adminlogin' ='$SIic_num' AND 'admin@KLMarathon.com' = '$SIemail'";
$result_admin = mysqli_query($conn, $query_admin);
$query = "SELECT * FROM registration WHERE num_ic ='$SIic_num' AND email = '$SIemail'";
$result = mysqli_query($conn, $query);

//check if data inserted exist in db
if(mysqli_num_rows($result)>0){

    //valid login for user
    header('location:details.php');
} else if (mysqli_num_rows($result_admin)>0){

    //valid login for admin
    header('location:admin.php');
} else{

    //invalid login
    echo"<script type='text/javascript'> alert('Invalid credential! Please try again')</script>";
}
?>
