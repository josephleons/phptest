<?php 
//Establish connection to the database
include 'includes/connection.php';
    if (isset($_POST['submit'])) {

        //give default user role as 'admin'
        $role ='admin';

        //capture user data
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $password =mysqli_real_escape_string($conn,$_POST['password']);
        //insert data to user table
        $sql = "INSERT INTO users (username,password,role) VALUES('$username','$password','$role')";
        $result = mysqli_query($conn,$sql);

        
        //check if data success inserted
        if($result){
            echo"<script>alert('User register successfull')</script>";
            header('location:index.php');
        }else{
            echo "Failed To register account";
            header('location:register.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book management system</title>
</head>
<body>
    <div>
    <h3 class="login page">Registration page</h3>
        <form action="register.php" method="POST">
                <div>Book management system</div>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <!-- Button  -->
                <input type="submit" name="submit" value="submit">
        </form>
    </div>
</body>
</html>