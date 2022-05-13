<?php
include 'conn/conn.php';

//retrieve data and set it into variable
$name = $_POST["name"];
$IC_num = $_POST["IC_num"];
$phone_num = $_POST["phone"];
$email = $_POST["email"];
$emerg_no = $_POST["EmergNum"];

//insert into db
$sql = "INSERT INTO registration 
(`name` , `num_ic` , `phone_num` , `email` , `emerg_num`)
VALUES ('$name' , '$IC_num' , '$phone_num' , '$email' , '$emerg_no')";

//check if if the data is a member of db
if ($conn->query($sql) === TRUE) {
    ?> 
    <script>
        alert('Your registration have been accepted')
        window.location = 'index.html'
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn -> close();
?>