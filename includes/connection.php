<?php

    $localhost ='localhost';
    $user='root';
    $pass ='';
    $database='BOOK_STORE';

    $conn= mysqli_connect($localhost,$user,$pass,$database);
    if(!$conn){
        echo 'connection failed';
    }