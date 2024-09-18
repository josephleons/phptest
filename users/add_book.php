<?php include '../includes/connection.php';
session_start();
if(isset($_SESSION['username']) || $_SESSION['role'] !== 'user'){
        $user_id = $_SESSION['id'];
    }

if(isset($_POST['submit'])) {

    //capture user Input from form
    $title =mysqli_real_escape_string($conn,$_POST['title']);
    $author =mysqli_real_escape_string($conn,$_POST['author']);
    $publish=mysqli_real_escape_string($conn,$_POST['publish']);
    $genre =mysqli_real_escape_string($conn,$_POST['genre']);
   
   $sql ="INSERT INTO books (title,author,publication_year,genre,user_id)
          VALUES ('$title','$author','$publish','$genre','$user_id')";
    
    $query = mysqli_query($conn, $sql);
    //check if condition 
    if($query){
        echo "<script>alert('Book addess successful!')</script>";
        header('location:index.php');
    }else{
        echo "<script>alert('Book not Added')</script>";
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
    <h3 class="login page">ADD BOOK</h3>
        <form action="add_book.php" method="POST">
                <div>Add new Book</div>
                <input type="text" name="title" placeholder="Tittle">
                <input type="text" name="author" placeholder="Author">
                <input type="text" name="genre" placeholder="Genre">
                <input type="text" name="publish" placeholder="Publication Year">
                <!-- Button  -->
                <input type="submit" name="submit" value="save">
        </form>
    </div>
   
</body>
</html>