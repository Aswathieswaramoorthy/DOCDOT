<?php
error_reporting(0);

 ob_start();
 session_start();
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="docdot"; 
$tbl_name="check_medicine"; 
                                                                            
                                                                             
mysql_connect("$host", "$username", "$password") or die(mysql_error());     
                                                                            
mysql_select_db("$db_name") or die(mysql_error());   
                                                                            
$disease_condition=$_POST['disease_condition'];  
$severity=$_POST['severity'];                                                        
$age_group=$_POST['age_group'];                     	
 
                                                                            
$disease_condition = stripslashes($disease_condition);   
$severity = stripslashes($severity);                     
$age_group=stripslashes($age_group);                         
 
 $sql="SELECT * FROM $tbl_name WHERE disease_condition='$disease_condition' and severity='$severity' and age_group='$age_group'";
$result=mysql_query($sql);
 
 
while ($row = mysql_fetch_array($result))
{
  $medicine=$row['medication'];
  $dosage=$row['dosage'];
  $rating=$row['rating'];

  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>DOCDOT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/icon" href="images/icons/stethos.icon"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<form action="prescription.php" method="POST">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/pexels-photo-415825.jpeg'); opacity: 1;">


			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="prescription.php">

				<a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
					<a href="welcome.php" class="login100-form-btn" style="width: 10px; height:28px; text-decoration: none;">Back</a></a>

</a>
		<form class="login100-form validate-form" method="post" action="prescription.php">
					<span class="login100-form-title p-b-34 p-t-27">
						 <h2 style="color:white; font-family:Algerian; font-size:150%;">PRESCRIPTION</h2>
					</span><br>
					

<div class="wrap-input100 validate-input" >
						<span style="
    color: white;
    font-size: 22px;
" >
    MEDICINES  :  </span>
					<span class="wrap-input100 validate-input" style="
    color: white;
    font-size: 22px;
    margin-left: 39px;
" >
						 <?php
						 
						 echo $medicine;
						  
						 ?>
						<span class="focus-input100" data-placeholder=""></span>
					</span>
						<span class="focus-input100" data-placeholder=""></span>
					</div><br>
					<div class="wrap-input100 validate-input" >
						<span style="
    color: white;
    font-size: 22px;
" >
    PATIENT  :  </span>
					<span class="wrap-input100 validate-input" style="
    color: white;
    font-size: 22px;
    margin-left: 39px;
" ><?php
$select_query="Select id,name from patient";
$select_query_run =mysql_query($select_query);
echo "<select name='patient'>";
while ($select_query_array=mysql_fetch_array($select_query_run) )
{
   echo "<option value='".$select_query_array['id']."' >".htmlspecialchars($select_query_array["name"])."</option>";
}
echo "</select>";
?>
						<span class="focus-input100" data-placeholder=""></span>
					</span>
						<span class="focus-input100" data-placeholder=""></span>
					</div><br>
					
<div class="wrap-input100 validate-input" >
						<span style="
    color: white;
    font-size: 22px;
" >
    DOSAGE  :  </span>
					<span class="wrap-input100 validate-input" style="
    color: white;
    font-size: 22px;
    margin-left: 39px;
" >
						 <?php
						 echo $dosage;
						  
						 ?>
						<span class="focus-input100" data-placeholder=""></span>
					</span>
						<span class="focus-input100" data-placeholder=""></span>
					</div><br>
<div class="wrap-input100 validate-input" >
						<span style="
    color: white;
    font-size: 22px;
" >
    RATING  :  </span>
					<span class="wrap-input100 validate-input" style="
    color: white;
    font-size: 22px;
    margin-left: 39px;
" >
						 <?php
						 echo $rating;
						  
						 ?>
						<span class="focus-input100" data-placeholder=""></span>
					</span>
						<span class="focus-input100" data-placeholder=""></span>
					</div><br>
					<div class="wrap-input100 validate-input" data-validate = "Enter quantity">
						<input class="input100" type="text" name="medicine_quantity" placeholder="MEDICINE QUANTITY">
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter noofdays">
						<input class="input100" type="text" name="day_count" placeholder="DAY COUNT FOR MEDICINE">
						<input class="input100" type="hidden" name="medicine" value="<?php echo $medicine;?>"placeholder="DAY COUNT FOR MEDICINE">

						<span class="focus-input100"></span>
					</div>
					<br>
					<h2 style="color:white; font-family:Arial Black; font-size:100%;">INTAKE OF MEDICINE</h2>
					<div>
                    <label><input type="radio" name="medicine_intake" id="before" value="B">BEFORE FOOD</label>
                    <label><input type="radio" name="medicine_intake" id="after" value="A">AFTER FOOD</label>
                    <h2 style="color:white; font-family:Arial Black; font-size:100%;">TIME INTERVALS</h2>
  					<input type="checkbox" name="time_intervals[]" value="FN ">MORNING<br>
                    <input type="checkbox" name="time_intervals[]" value="AN ">AFTERNOON<br>
                    <input type="checkbox" name="time_intervals[]" value="EVN " checked>EVENING<br>
                    <input type="checkbox" name="time_intervals[]" value="NYT " checked>NIGHT<br><br>
                </div>
					
             <div class="container-login100-form-btn">
						<input type="submit" value="Create prescription" name="submit" class="login100-form-btn" >
					</div>
            
          
          <br>
          
             <div class="container-login100-form-btn">
						<input type="submit" value="Submit" name="submit" class="login100-form-btn" >
					</div>
            
       
          
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>