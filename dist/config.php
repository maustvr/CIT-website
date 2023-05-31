
<?php
session_start();
error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

        $servername = " ";
        $username = " ";
        $password = " ";
        $dbname = " ";

       // $DBConnect= mysqli_connect($servername, $username, $password, $dbname);
        $DBConnect= mysqli_connect("", "", "", "");
        if ($DBConnect->connect_error) { 
    die("Connection failed: " . $DBConnect->connect_error); 
}

?>





