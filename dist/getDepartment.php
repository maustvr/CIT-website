
<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
$locationID = $_SESSION['locationID'];
$userID = $_SESSION['userID'];

?>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
            
   $county = stripslashes($_POST['county']);
   $Query = "select distinct department from departments where county = '$county'";
   $Result = @mysqli_query($DBConnect, $Query);
   if(mysqli_num_rows($Result) > 0) {?>
      echo"<option value="">Please select</option>"
   <?php
   while($Row = mysqli_fetch_assoc($Result)){?>
      echo "<option value="<?php echo $Row["department"]; ?>" ><?php echo $Row["department"];?></option>"
   <?php
   }
}
            
?>


