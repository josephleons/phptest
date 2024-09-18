<?php 
    include '../includes/connection.php';

    if(isset($_GET['id'])){
        $id = mysqli_escape_string($conn, $_GET['id']);
        
        $sql= "SELECT * FROM books WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        $count= mysqli_num_rows($query);

        if($count >0){
            $rows = mysqli_fetch_assoc($query);
        }else{
            echo "No Record Found";
        }
    }else{
        echo "Error:".mysqli_error($conn);
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
    <h3 class="login page">BOOK</h3>
        <form action="update.php" method="POST">
                <div>Edit Book</div>
                <input type="text" name="title" value="<?php echo $rows['title'];?>">
                <input type="text" name="author" value="<?php echo $rows['author'];?>">
                <input type="text" name="genre" value="<?php echo $rows['genre'];?>">
                <input type="text" name="publishing" value="<?php echo $rows['publication_year'];?>">
                <!-- Button  -->
                <input type="submit" name="submit" value="update">
        </form>
    </div>
   
</body>
</html>