
<?php

session_start();
$_SESSION['logged_in'] = false;
session_destroy();

 echo "<script> alert('You have been logged out')
            location = 'login.php';
        </script>";
exit;
?>
