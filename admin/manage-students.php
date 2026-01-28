<?php
session_start();
include('includes/config.php');
$totalStudents = 20000;

$district = "Davangere";
$sql = "
SELECT 
    SUM(TRIM(LOWER(medical_status)) = 'yes') AS checked,
    SUM(TRIM(LOWER(medical_status)) = 'no') AS not_checked
FROM userregistration
";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->bind_result($checked, $notChecked);
$stmt->fetch();
$stmt->close();

// $sql = "
// SELECT 
//     COUNT(*) AS total,
//     SUM(TRIM(LOWER(medical_status)) = 'yes') AS checked,
//     SUM(TRIM(LOWER(medical_status)) = 'no') AS not_checked
// FROM userregistration
// ";

// $stmt = $mysqli->prepare($sql);
// $stmt->execute();
// $stmt->bind_result($totalStudents, $checked, $notChecked);
// $stmt->fetch();
// $stmt->close();
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
	<title>Manage Rooms</title>
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
				 <div class="row" style="margin-top:30px">
				  <h2 class="text-center">District Health Check-up Status</h2>
    <h4 class="text-center"><?php echo $district; ?> District</h4>
	 <div class="row" style="margin-top:30px">
		<div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <h1><?php echo $totalStudents; ?></h1>
                    <p>Total Students</p>
                </div>
            </div>
        </div>
		  <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-body text-center">
                    <h1><?php echo $checked; ?></h1>
                    <p>Health Check-up Done</p>
                </div>
            </div>
        </div>
		<div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-body text-center">
                    <h1><?php echo $notChecked; ?></h1>
                    <p>Health Check-up Not Done</p>
                </div>
            </div>
        </div>
				<?php
// ====== ADD THIS CODE ======

//$district = "Davangere"; // change district name if needed
// $totalStudents = 0;
// $checked = 0;
// $notChecked = 0;

// // Total students
// $sql1 = "SELECT COUNT(*) FROM userregistration";
// $stmt1 = $mysqli->prepare($sql1);
// if (!$stmt1) {
//     die("SQL ERROR: " . $mysqli->error);
// }
// $stmt1->execute();
// $stmt1->bind_result($totalStudents);
// $stmt1->fetch();
// $stmt1->close();

// // HEALTH CHECKED
// $sql2 = "SELECT COUNT(*) FROM userregistration WHERE medical_status='Yes'";
// $stmt2 = $mysqli->prepare($sql2);
// if (!$stmt2) {
//     die("SQL ERROR: " . $mysqli->error);
// }

// $stmt2->execute();
// $stmt2->bind_result($checked);
// $stmt2->fetch();
// $stmt2->close();

// // Not checked
// $notChecked = $totalStudents - $checked;

// ====== END ======
?>
	
					<div class="col-md-12">

						<h2 class="page-title" style="margin-top:4%">Taluk Deatils</h2>
						
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">

<!-- <?php
$result ="SELECT count(*) FROM registration ";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
?> -->

													<div class="stat-panel-number h1 "><?php echo $count;?></div>
													<div class="stat-panel-title text-uppercase"> Channagiri</div>
												</div>
											</div>
											<a href="manage-students.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
					<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?php
$result2 ="select count(*) from complaints where complaintStatus='In Process'";
$stmt2 = $mysqli->prepare($result2);
$stmt2->execute();
$stmt2->bind_result($count2);
$stmt2->fetch();
$stmt2->close();
?>												
													<div class="stat-panel-number h1 "><?php echo $count2;?></div>
													<div class="stat-panel-title text-uppercase">Davanagere</div>
												</div>
											</div>
											<a href="inprocess-complaints.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
						
											<div class="col-md-4">
										<div class="panel panel-success">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php
$result2 ="select count(*) from feedback";
$stmt2 = $mysqli->prepare($result2);
$stmt2->execute();
$stmt2->bind_result($count2);
$stmt2->fetch();
$stmt2->close();
?>												
													<div class="stat-panel-number h1 "><?php echo $count2;?></div>
													<div class="stat-panel-title text-uppercase">Harihara</div>
												</div>
											</div>
											<a href="feedbacks.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
<?php
$result1 ="select count(*) from complaints where complaintStatus is null";
$stmt1 = $mysqli->prepare($result1);
$stmt1->execute();
$stmt1->bind_result($count1);
$stmt1->fetch();
$stmt1->close();
?>												
													<div class="stat-panel-number h1 "><?php echo $count1;?></div>
													<div class="stat-panel-title text-uppercase">Honnali </div>
												</div>
											</div>
											<a href="new-complaints.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
<?php
$result1 ="select count(*) from complaints where complaintStatus='Closed'";
$stmt1 = $mysqli->prepare($result1);
$stmt1->execute();
$stmt1->bind_result($count1);
$stmt1->fetch();
$stmt1->close();
?>												
													<div class="stat-panel-number h1 "><?php echo $count1;?></div>
													<div class="stat-panel-title text-uppercase">Jaglur</div>
												</div>
											</div>
											<a href="closed-complaints.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
<!-- <?php	
$aid=$_SESSION['id'];
$ret="select * from registration";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('i',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->firstName;?><?php echo $row->middleName;?><?php echo $row->lastName;?></td>
<td><?php echo $row->regno;?></td>
<td><?php echo $row->contactno;?></td>
<td><?php echo $row->roomno;?></td>
<td><?php echo $row->seater;?></td>
<td><?php echo $row->stayfrom;?></td>
<td>
<a href="student-details.php?regno=<?php echo $row->regno;?>" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
<a href="manage-students.php?del=<?php echo $row->regno;?>" title="Delete Record" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a></td>
										</tr>
									<?php

									 } ?> -->
    </div>
</div>

	<!-- Loading Scripts
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script> -->

</body>

</html>
