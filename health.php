<<?php
include('includes/config.php'); // DB connection
session_start();
if (isset($_POST['submit'])) {

    $student_id    = $_POST['stdid'];
    $health_status = $_POST['health_status'];
    $disease       = ($health_status === 'abnormal') ? $_POST['disease'] : NULL;
    $checkup_date  = $_POST['ckpdate'];

    $query = "INSERT INTO health_checkup 
              (student_id, health_status, disease, checkup_date)
              VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssss",
        $student_id,
        $health_status,
        $disease,
        $checkup_date
    );

    if ($stmt->execute()) {
        echo "<script>alert('Health record saved successfully');</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
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

</head>
<body>
	
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
	<!-- <?php
$health = "normal"; // change to "abnormal"
?>

<?php if ($health == "normal") { ?>
    <h2>✅ Your Health is Normal</h2>
<?php } else { ?>
    <h2>❌ Your Health is Abnormal</h2>
<?php } ?> -->
	<!-- <div class="row">
   <div class="stat-panel text-center health-bg">
    <div class="stat-panel-number">

        <h2>✅ Your Health is Good</h2>
        <p><b>Keep up the healthy lifestyle!  
            Your recent health check-up details are within the normal range.</b></p>
    </div>
</div> -->
<h2 class="page-title" style="margin-top:4%">Your Health Check-Up Details</h2>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset--1">

        <h2 class="page-title">Health Checkup Entry</h2>

        <div class="panel panel-primary">
          <div class="panel-heading">Fill Required Info</div>
          <div class="panel-body">

            <form method="post" action="" class="form-horizontal">

              <!-- Student ID -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Student ID :</label>
                <div class="col-sm-7">
                  <input type="text" name="stdid" id="stdid"
                         class="form-control" required>
                </div>
              </div>

              <!-- Checkup Date -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Checkup Date :</label>
                <div class="col-sm-7">
                  <input type="date" name="ckpdate" id="ckpdate"
                         class="form-control" required>
                </div>
              </div>

              <!-- Doctor Name -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Checked By    (Doctor Name):</label>
                <div class="col-sm-7">
                  <input type="text" name="drname" id="drname"
                         class="form-control" required>
                </div>
              </div>
			<div class="form-group">
  <label class="col-sm-3 control-label">Health Status :</label>
  <div class="col-sm-7">
    <label>
      <input type="radio" name="health_status" value="normal"
             onclick="toggleHealth(this.value)" required>
      Normal
    </label>
    &nbsp;&nbsp;
    <label>
      <input type="radio" name="health_status" value="abnormal"
             onclick="toggleHealth(this.value)">
      Abnormal
    </label>
  </div>
</div>

<!-- Normal message -->
<div class="form-group" id="normalMsg" style="display:none;">
  <div class="col-sm-offset-3 col-sm-7">
    <span class="text-success">
      ✅ Health is good, keep it healthy
    </span>
  </div>
</div>

<div class="form-group" id="diseaseBox" style="display:none;">
  <label class="col-sm-3 control-label">Disease :</label>
  <div class="col-sm-7">
    <select name="disease" id="disease"
            class="form-control"
            onchange="updateDiseaseMsg()">
      <option value="">-- Select Disease --</option>

      <!-- General -->
      <option value="Fever">Fever</option>
      <option value="High Fever">High Fever</option>
      <option value="Cold">Cold</option>
      <option value="Headache">Headache</option>

      <!-- Respiratory -->
      <option value="Lower Respiratory Infection">Lower Respiratory Infection</option>
      <option value="Asthma">Asthma</option>

      <!-- Dental -->
      <option value="Dental Problem">Dental Problem</option>

      <!-- Kidney -->
      <option value="Kidney Disease">Kidney Disease</option>

      <!-- Heart -->
      <option value="Heart Disease">Heart Disease</option>

      <!-- Blood Pressure -->
      <option value="Low Blood Pressure">Low Blood Pressure</option>
      <option value="High Blood Pressure">High Blood Pressure</option>

    </select>
  </div>
</div>
<div class="form-group" id="abnormalMsg" style="display:none;">
  <div class="col-sm-offset-3 col-sm-7">
    <strong class="text-danger">
      ⚠️ Please consult the doctor –
      Disease: <span id="diseaseName">Not selected</span>
    </strong>
  </div>
</div>
              <!-- Submit -->
            <div class="col-sm-6 col-sm-offset-3 text-center">
  <button type="submit" name="submit"
          class="btn btn-primary btn-lg">
    Save
  </button>
</div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- <div class="form-group">
<label class="col-sm-2 control-label"> Student Id : </label>
<div class="col-sm-8">
<input type="text" name="stdid" id="stdid"  class="form-control" required="required" onBlur="checkRegnoAvailability()">
<span id="user-reg-availability" style="font-size:12px;"></span>
</div>
</div> -->
<!-- <div class="form-group">
<label class="col-sm-2 control-label"> Checkupdate : </label>
<div class="col-sm-8">
<input type="text" name="cdate" id="cdate"  class="form-control" required="required" onBlur="checkRegnoAvailability()">
<span id="user-reg-availability" style="font-size:12px;"></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> Checked By : </label>
<div class="col-sm-8">
<input type="text" name="checkedby" id="checkedby"  class="form-control" required="required" onBlur="checkRegnoAvailability()">
<span id="user-reg-availability" style="font-size:12px;"></span>
</div>
</div> -->
<!-- <select id="healthStatus" class="form-control">
    <option value="">-- Select Health Status --</option>
    <option value="normal">Normal</option>
    <option value="abnormal">Abnormal</option>
</select>
<div id="healthResult" style="margin-top:20px;"></div> -->

						<!-- <h2 class="page-title"><?php echo $row->firstName;?>'s&nbsp;Profile </h2> -->

						<!-- <div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">

✅ Your Health is Good: &nbsp; <?php echo $row->updationDate;?> 
</div> -->
									

<!-- <div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
								
								

<div class="form-group">
<label class="col-sm-2 control-label"> Registration No : </label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php echo $row->regNo;?>" readonly="true">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>"   required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Middle Name : </label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row->middleName;?>"  >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->lastName;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="<?php echo $row->gender;?>"><?php echo $row->gender;?></option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" maxlength="10" value="<?php echo $row->contactNo;?>" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>" readonly>
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>


						



<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="update" Value="Update Profile" class="btn btn-primary">
</div> -->
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
function toggleHealth(value) {
  if (value === "normal") {
    document.getElementById("normalMsg").style.display = "block";
    document.getElementById("abnormalMsg").style.display = "none";
    document.getElementById("diseaseBox").style.display = "none";
  } else {
    document.getElementById("normalMsg").style.display = "none";
    document.getElementById("abnormalMsg").style.display = "block";
    document.getElementById("diseaseBox").style.display = "block";
  }
}

function updateDiseaseMsg() {
  const disease = document.getElementById("disease").value;
  document.getElementById("diseaseName").innerText =
    disease ? disease : "Not selected";
}
document.querySelector('form').addEventListener('submit', function(e) {
  const status = document.querySelector('input[name="health_status"]:checked');
  const disease = document.getElementById('disease');

  if (status && status.value === 'abnormal' && disease.value === "") {
    alert("Please select a disease");
    e.preventDefault();
  }
});
</script>


</html>