<?php 
    session_start();

    include '../includes/connection.php';

    if(isset($_POST['id'])){
        // $id = mysqli_escape_string($conn, $_POST['id']);
        
        $title =mysqli_real_escape_string($conn,$_POST['title']);
        $author =mysqli_real_escape_string($conn,$_POST['author']);
        $publication_year =mysqli_real_escape_string($conn,$_POST['publishing_year']);
        $genre =mysqli_real_escape_string($conn,$_POST['genre']);
        
        $sql= "UPDATE books SET title='$title',author='$author',pulication_year='$publication_year',genre ='$genre'
                ";
        $query = mysqli_query($conn,$sql);
        
        if($query){
            echo "<script>alert('Book Updated')</script>";
            header('location:index.php');
        
        }else{
            echo "Error:".mysqli_error($conn);
        }
    }
?>
