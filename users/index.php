<?php 

include '../includes/connection.php';
session_start();

if(isset($_SESSION['username']) || $_SESSION['role'] !== 'user'){
    $user_id = $_SESSION['id'];
    $username = $_SESSION['username'];
}

// $id = $_SESSION['id'];

$sql= "SELECT users.id,
    users.username,users.role,books.title,books.author,books.genre,
    books.publication_year 
FROM users INNER JOIN books ON users.id = books.user_id";

$query = mysqli_query($conn,$sql);
$count = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book management system</title>
</head>
<body>
    <h3>Welcome your login As :<?php $username;?></h3>
    
    <div>
    <p>BOOK LIST</p>
        <table id="table" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($count > 0):?>
                    <?php while($books = mysqli_fetch_assoc($query)):?>
                <tr>
                    <td><?php echo $books['id'];?></td>
                    <td><?php echo $books['title'];?></td>
                    <td><?php echo $books['author'];?></td>
                    <td><?php echo $books['genre'];?></td>
                    <td><?php echo $books['publication_year'];?></td>
                    <td><?php echo $books['username'];?></td>
                    <td>
                        <span><a href="edit.php?id=<?php echo $books['id'];?>">Edit</a></span>
                        <span><a href="update.php?id=<?php echo $books['id'];?>">Update</a></span>
                        <span> <a href="delete.php?id=<?php echo $books['id'];?>">Delete</a></span>
                    </td>
                </tr>
                <?php endwhile;?>
                <?php else:?>
                    <td>
                        <?php echo "no available books";?>
                    </td>
                <?php endif;?>
            </tbody>
        </table>
    </div>
    <span style="padding-top:50%"><a href="../logout.php">Logout</a></span>
</body>
</html>
