<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$stdid=$_POST['stdid'];
$hname=$_POST['hname'];
$sname=$_POST['sname'];
$scname=$_POST['scname'];
$gender=$_POST['gender'];
$blood=$_POST['blood'];
$contactno=$_POST['contact'];
$paddress=$_POST['paddress'];
$emailid=$_POST['email'];
$warden_name=$_POST['warden_name'];
$medical_status = trim($_POST['medical_status']);
$taluk = $_POST['taluk'];
$dr_name = $_POST['drname'];
$password=$_POST['password'];

	$result ="SELECT count(*) FROM userRegistration WHERE email=? || stdid=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('ss',$email,$stdid);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo"<script>alert('Registration number or email id already registered.');</script>";
}else{

$query="insert into  userRegistration(stdid,hname,sname,scname,gender,blood_group,contactNo,permanent_address,email,warden_name,dr_name,password,medical_status,taluk) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}
$rc=$stmt->bind_param('ssssssssssssss',$stdid,$hname,$sname,$scname,$gender,$blood,$contactno,$permanent_address,$emailid,$warden_name,$drname,$password,$medical_status,$taluk);
$stmt->execute();
echo"<script>alert('Student Succssfully register');</script>";
}
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>User Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Student Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
									

<div class="form-group">
<label class="col-sm-2 control-label"> Student Id : </label>
<div class="col-sm-8">
<input type="text" name="stdid" id="stdid"  class="form-control" required="required" onBlur="checkRegnoAvailability()">
<span id="user-reg-availability" style="font-size:12px;"></span>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name : </label>
<div class="col-sm-8">
<input type="text" name="hname" id="hname"  class="form-control" required="required" >
</div>
</div> 

<div class="form-group">
<label class="col-sm-2 control-label">Student Name : </label>
<div class="col-sm-8">
<input type="text" name="sname" id="sname"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">School/College Name : </label>
<div class="col-sm-8">
<input type="text" name="scname" id="scname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required>
  <option value="">Select Gender</option>
  <option value="male">Boy</option>
  <option value="female">Girl</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Blood Group : </label>
<div class="col-sm-8">
<select name="blood" class="form-control" required="required">
<option value="">Select Blood Group</option>
<<option value="O+">O+</option>
<option value="O-">O-</option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Taluk : </label>
<div class="col-sm-8">
<select name="taluk" class="form-control" required>
  <option value="">Select Taluk</option>
  <option value="Channagiri">Channagiri</option>
  <option value="Davanagere">Davanagere</option>
  <option value="Harihara">Harihara</option>
  <option value="Honnali">Honnali</option>
  <option value="Jagalur">Jagalur</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Permanent Address : </label>
<div class="col-sm-8">
<input type="text" name="paddress" id="paddress"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Warden Name: </label>
<div class="col-sm-8">
<input type="text" name="warden_name" id="warden_name"  class="form-control" " required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Last Health Checkup Date: </label>
<div class="col-sm-8">
<input type="text" name="ckpdate" id="ckpdate"  class="form-control" " required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Health Check-Up  : </label>
<div class="col-sm-8">
<select name="medical_status" class="form-control" required>
  <option value="">Select Status</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Doctor Name: </label>
<div class="col-sm-8">
<input type="text" name="drname" id="drname"  class="form-control" " required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Password: </label>
<div class="col-sm-8">
<input type="password" name="password" id="password"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Confirm Password : </label>
<div class="col-sm-8">
<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
</div>
</div>
						



<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="reset">Reset</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
	<script>
function checkRegnoAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'stdid='+$("#stdid").val(),
type: "POST",
success:function(data){
$("#user-reg-availability").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>