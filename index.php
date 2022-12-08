<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variable
    $server = "localhost";
    $username = "root";
    $password = "";
    // Create a connection
    $con = mysqli_connect($server, $username, $password);

    // Check for correction succes
    if(!$con){
        die("connection  to this database failed due to" . mysqli_connect_error());
    };
    // echo "Success connecting to the db";
    //Collect Post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $passcode = $_POST['passcode'];
    $sql = "INSERT INTO `pd_form` . `training` (`name`, `age`, `gender`, `email`, `phone`, `passcode`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$passcode', current_timestamp());";
    // echo $sql;

    //Execute the query
    if($con->query($sql) ==true){
        //Flag for succesful insertion
        $insert = true;
        // echo "Succesfully inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // Close Database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to your camp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Personality Development Training</h1>
        <p>Enter the magic code to confirm your participation</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting the form. Hope you enjoy your training. </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="number" name="phone" id="phone" placeholder="Enter Your phone number">
            <input type="password" name="passcode" id="passcode" placeholder="Enter the Passcode">
            <button class="btn">Submit</button><br>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>