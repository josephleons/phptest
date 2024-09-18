<?php 
    session_start();
    include "includes/connection.php";
if(isset($_POST["submit"])){    
    $username = mysqli_escape_string($conn,$_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $rows = mysqli_fetch_assoc($result);
        if($rows['password'] == $password){
            $_SESSION['username'] = $rows['username'];
            $_SESSION['role'] = $rows['role'];
            $_SESSION['id'] = $rows['id'];

            if($_SESSION['role'] == 'admin'){
                header('location:admin/index.php');
            }else{
                header('location:users/index.php');
            }
        }

}else{
    echo "<script>alert('no record associated with this account')</script>";
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
    <h3 class="login page">Login page</h3>
        <form action="index.php" method="POST">
                <div>Book management system</div>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">

                <!-- Button  -->
                <input type="submit" name="submit" value="login">
        </form>
        <a href="register.php">Don't have an Account ? click to register</a>
    </div>
   
</body>
</html>