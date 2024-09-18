<?php 
    session_start();
    
    if(!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin'){
        header('location:users/index.php');
        exit();
    }else{
        $role = $_SESSION['role'];
        $username = $_SESSION['username'];
    }


include '../includes/connection.php';
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
    <h3>Welcome your login As :<?php echo $username;?> and ur role is :<?php echo $role;?></h3>
    <div>
        <p>MANAGE BOOK LIST</p>
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
                    <?php while($rows = mysqli_fetch_assoc($query)):?>
                <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['title'];?></td>
                    <td><?php echo $rows['author'];?></td>
                    <td><?php echo $rows['genre'];?></td>
                    <td><?php echo $rows['publication_year'];?></td>
                    <td><?php echo $rows['username'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $rows['id'];?>">Edit</a>
                        <a href="update.php?id=<?php echo $rows['id'];?>">Update</a>
                        <a href="delete.php?id=<?php echo $rows['id'];?>">Delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
                <?php else:?>
                    <td>
                        <?php echo 'No rocords Found ';?>
                    </td>
                <?php endif;?>
            </tbody>
        </table>
    </div>
    <span style="padding-top:50%"><a href="../logout.php">Logout</a></span>
</body>
</html>
