<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
$taluk = 'Jagalur'; 

/* TOTAL GIRLS */
$q2 = $mysqli->prepare("SELECT COUNT(*) FROM userRegistration WHERE gender='female' AND taluk=?");
$q2->bind_param("s", $taluk);
$q2->execute();
$q2->bind_result($totalGirls);
$q2->fetch();
$q2->close();
 /* TOTAL BOYS */
$q1 = $mysqli->prepare("SELECT COUNT(*) FROM userRegistration WHERE gender='male' AND taluk=?");
$q1->bind_param("s", $taluk);
$q1->execute();
$q1->bind_result($totalBoys);
$q1->fetch();
$q1->close();

/* CHECKED GIRLS */
$q4 = $mysqli->prepare("
    SELECT COUNT(*) 
    FROM userRegistration 
    WHERE gender='female' AND medical_status='Yes' AND taluk=?
");
$q4->bind_param("s", $taluk);
$q4->execute();
$q4->bind_result($checkedGirls);
$q4->fetch();
$q4->close();

/* CHECKED BOYS */
$q3 = $mysqli->prepare("
    SELECT COUNT(*) 
    FROM userRegistration 
    WHERE gender='male' AND medical_status='Yes' AND taluk=?
");
$q3->bind_param("s", $taluk);
$q3->execute();
$q3->bind_result($checkedBoys);
$q3->fetch();
$q3->close();
/* NOT CHECKED */
$notCheckedGirls = $totalGirls - $checkedGirls;
$notCheckedBoys  = $totalBoys  - $checkedBoys;

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
	<title>Harihara</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Jagalur Details</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Jagalur  Details</div>
							<div class="panel-body">
								<!-- GIRLS CARD -->
  <div class="col-md-6">
    <div class="panel panel-danger" style="border-radius:8px;">
      <div class="panel-heading text-center">
        <i class="fa fa-female"></i> <b>Girls Health Status</b>
      </div>
      <div class="panel-body text-center">
        <h1 style="color:#2c3e50;"><?php echo $totalGirls; ?></h1> 
        <p>Total Girls</p>

        <hr>

        <h3 style="color:green;">
          ✔ Checked: <?php echo $checkedGirls; ?>
        </h3>

        <h3 style="color:red;">
          ❌ Not Checked: <?php echo $notCheckedGirls; ?>
        </h3>
      </div>
    </div>
  </div>
<div class="row">

  <!-- BOYS CARD -->
  <div class="col-md-6">
    <div class="panel panel-primary" style="border-radius:8px;">
      <div class="panel-heading text-center">
        <i class="fa fa-male"></i> <b>Boys Health Status</b>
      </div>
      <div class="panel-body text-center">
        <h1 style="color:#2c3e50;"><?php echo $totalBoys; ?></h1> 
        <p>Total Boys</p>

        <hr>

        <h3 style="color:green;">
          ✔ Checked: <?php echo $checkedBoys; ?>
        </h3>

        <h3 style="color:red;">
          ❌ Not Checked: <?php echo $notCheckedBoys; ?>
        </h3>
      </div>
    </div>
  </div>

  

</div>
				
 <?php	
$aid=$_SESSION['id'];
$ret="select * from complaints where complaintStatus='In Process'";
$stmt= $mysqli->prepare($ret) ;
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
 ?> 
											
										
								

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
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

</html>
