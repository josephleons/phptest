<?php 
include '../includes/connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    
    if($result){
        header("location:index.php");
    }else{
        echo "<script>alert('Failed!')</script>";
    }
}
