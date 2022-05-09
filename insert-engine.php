<?php
include 'conn/conn.php';

$username = $_REQUEST["username"];
$phone_num = $_REQUEST["phone_num"];
$email = $_REQUEST["email"];
$pass = $_REQUEST["password"];

//secure password using hash
$secure_pass = password_hash($pass, PASSWORD_BCRYPT);

$sql = "INSERT INTO account ('username' , 'phone_num' , 'email' , 'password') 
VALUES('$username' , '$email' , '$phone_num' , '$secure_pass') ";

if($conn->query($sql) === TRUE){
    ?>
    <script>
        alert('Your account have been created successfully')
        window.location = 'index.html'
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn -> close();
?>