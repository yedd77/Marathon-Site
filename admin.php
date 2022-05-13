<?php include 'conn/conn.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Image/icon.ico" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>KLMarathon - Admin Page</title>
</head>

<body>
    <div class="container-6">
        <img src="Image/Logo.png" alt="logo">
                <table>
                    <tr class="search">
                        <th colspan="8">
                            <form action="search.php" method="POST">
                                <div>
                                    <p>
                                        Search :
                                        <input type="text" name="search" id="search">
                                    </p>
                                </div>
                            </form>
                        </th>
                    </tr>
                    <tr >
                        <th class="top-header-left">No</th>
                        <th>Name</th>
                        <th>IC Number</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Emergency Number</th>
                        <th>Update</th>
                        <th class="top-header-right">Delete</th>
                    </tr>

                    <?php
            $bil = 1;
            //perform query
            $query = "SELECT * FROM registration";
            $result = mysqli_query($conn,$query);
            $notempty = mysqli_num_rows($result);
            //start looping
            while($row = mysqli_fetch_assoc($result)){
                $id = $row["user_id"];
                $name = $row["name"];
                $ic = $row["num_ic"];
                $phone = $row["phone_num"];
                $email = $row["email"];
                $emerg = $row["emerg_num"];
            ?>
                    <tr>
                        <td><?php echo $bil;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $ic;?></td>
                        <td><?php echo $phone;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $emerg;?></td>
                        <td><a href="update.php?user_id=<?php echo $id;?>">Update</a></td>
                        <td>Delete</td>
                    </tr>
                    <?php
            //end looping
            $bil++;
            }

            //shows number of data displayed
            if($notempty != 0){
            ?>
                    <tr>
                        <td class="bot-table" colspan="8">Showing result of <?php echo $bil-1 ?> data from database</td>
                    </tr>
                    <?php
            }
            //if data in db not existed
            if($notempty == 0){
            ?>

                    <tr>
                        <td class="bot-table" colspan="8"> No data inside the database </td>
                    </tr>
                    <?php } ?>
    </div>
</body>

</html>