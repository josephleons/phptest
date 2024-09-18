<?php
session_unset();
session_destroy();
session_abort();
// redirected 
header('location:index.php');
