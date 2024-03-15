
<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
//$username = "maine";
//$locationID = 14;
//$userID = 18;
$locationID = $_SESSION['locationID'];
$userID = $_SESSION['userID'];

?>


<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
            
            $county = stripslashes($_POST['county']);
            //echo $county;
            //$DBConnect= mysqli_connect("database-1.cpiufp9nryjo.us-east-1.rds.amazonaws.com", "admin", "Administrator!", "sys");
            /*$sqlquery = "select * from Counties where county = '$county'";
            $connect = mysqli_query($DBConnect, $sqlquery);
            $result = mysqli_fetch_assoc($connect);
             $countyId = $result['CountyID'];*/



             $Query = "select distinct department from departments where county = '$county' and userID = '$userID'";
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


