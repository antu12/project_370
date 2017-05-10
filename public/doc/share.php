<?php 
	session_start();

	require_once("../../includes/database.php");

	if (!isset($_SESSION["id"])) {
		echo "<script>alert('Please Log In first');</script>";
		$database->redirect_to("../index.php");
	}
	$sid=$_SESSION['id'];
	if (isset($_POST['shr'])) {
		
		
		if (isset($_FILES['fl'])) {
			$uploaddir= "../upload/";
			$uploadName= $_FILES['fl']['name'];
			$uploadName= mt_rand(100000,999999).$uploadName;
			$uploadTmp= $_FILES['fl']['tmp_name'];
			$uploadType= $_FILES['fl']['type'];
			$fileSize= $_FILES['fl']['size'];
			$uploadName= preg_replace("#[^a-z0-9.]#i", "", $uploadName);
			$uploadlocation = $uploaddir.$uploadName;
			if($fileSize > 10000000){
				die("Error - File too big!");
			}
			if (!$uploadTmp) {
				die("No file selected. Please upload again!");
			}else{
				move_uploaded_file($uploadTmp, $uploadlocation);
				echo "<script>alert('Uploaded')</script>";
				$chek=$database->fileshr($sid,$_POST['pat'],$uploadlocation);
			}
		}
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Share</title>
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
 	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
 	<style type="text/css">
 	body{
 		background-image: url(back.png);
 	}
 	#admittable,#nontable,#nurset{
 		display: inline-table;
 	}
 	#tbls{
 		position: relative;
 		float: left;
 	}
 	#frm{
 		position: relative;
 		float: right;
 	}
 	a{
 		display: block;
 		clear: both;
 	}
 	</style>
 </head>
 
 <body>
 <div class="container">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#">Share Files</a>
    </div>
    <a href="index.php" class="pull-right">Back To Previous Page</a>
    </div>
    </div>


 	<br><br><br><br> <br>
	<form method="post" action="share.php" class="form-inline" enctype="multipart/form-data">
		<div class="form-group">
			<label for="pat">Enter PID: </label>
			<input type="text" class="form-control" id="pat" name="pat" placeholder="Enter Patient ID">
		</div>
		<div class="form-group">
			<label for="fl">Upload A File: </label>
			<input type="file" class="form-control" id="fl" name="fl" >
		</div>
		
		<button type="submit" class="btn btn-default" name="shr">Upload</button>
	</form>


 <div id="tbls" >
 	<h2>Admitted Patients</h2>
 	<table id="admittable" class="table table-striped">
	  <tr>
	    <th>PatientID</th>
	    <th>PatientName</th>   
	    <th>Patient Sex</th>
	    <th>Patient Diseases</th>
	     <th>Patient Phoneno</th>
	    <th>Served by Receptionist</th>
	    <th>Admitted date</th>
	    <th>Release date</th>
	    <th>Word no</th>
	    <th>File</th>
	  </tr>
	  <tr>
	  <?php 
	    $prr=$database->show_admitted_patients_by_Docshr();

	    for($i=0; $i< count($prr["PID"]); $i++){
	          echo "<tr>";

	        echo "<td>".$prr["PID"][$i]."</td>";
	        echo "<td>".$prr["PName"][$i]."</td>";
	        echo "<td>".$prr["Sex"][$i]."</td>";
	        echo "<td>".$prr["Disease"][$i]."</td>";
	        echo "<td>".$prr["Phone"][$i]."</td>";
	        echo "<td>".$prr["Name"][$i]."</td>";
	        echo "<td>".$prr["Ad_Date"][$i]."</td>";
	        echo "<td>".$prr["Rel_Date"][$i]."</td>";
	        echo "<td>".$prr["Word_No"][$i]."</td>";

	        $fi=$prr["location"][$i];
	        $fi=trim($fi,"../upload/");
	        echo "<td>"."<a href='../upload/$fi'>$fi</a>"."</td>";
	        echo "</tr>";
	      }
	   ?>
	</table>




	<br><br>

	<h2>Non-Admitted Patients</h2>
	<table id="nontable" class="table table-striped">
   <tr>
    <th>PatientID</th>
    <th>PatientName</th>   
    <th>Patient Sex</th>
    <th>Patient Diseases</th>
     <th>Patient Phoneno</th>
    <th>Served by Receptionist</th>
    <th>Visited date</th>
    <th>File</th>
  </tr>
  <tr>
  <?php 
    $prrr=$database->show_Nonadmitted_patients_by_Docshr();
    for($i=0; $i< count($prrr["PID"]); $i++){
          echo "<tr>";

        echo "<td>".$prrr["PID"][$i]."</td>";
        echo "<td>".$prrr["PName"][$i]."</td>";
        echo "<td>".$prrr["Sex"][$i]."</td>";
        echo "<td>".$prrr["Disease"][$i]."</td>";
        echo "<td>".$prrr["Phone"][$i]."</td>";
        echo "<td>".$prrr["Name"][$i]."</td>";
        echo "<td>".$prrr["visit_date"][$i]."</td>";

        $fi=$prr["location"][$i];
	        $fi=trim($fi,"../upload/");
	        echo "<td>"."<a href='../upload/$fi'>$fi</a>"."</td>";
	        echo "</tr>";
      }
   ?>
</table>
		<h2>Nurses</h2>
		<table id="nurset" class="table table-striped">
  <tr>
  	<th>Nurse ID</th>
    <th>Nurse Name</th>
    <th>Nurse Degree</th>   
    <th>Nurse Phone No.</th>
    <th>Gender</th>
     <th>Patient Id</th>
    <th>Patient Name</th>
    <th>Patient Diseases</th>
  </tr>
  <tr>
  <?php 
    $pr=$database->show_nurse_for_doc();
    for($i=0; $i< count($pr["EID"]); $i++){
          echo "<tr>";
        echo "<td>".$pr["EID"][$i]."</td>";
        echo "<td>".$pr["Name"][$i]."</td>";
        echo "<td>".$pr["Degree"][$i]."</td>";
        echo "<td>".$pr["PhoneNo"][$i]."</td>";
        echo "<td>".$pr["Gender"][$i]."</td>";
        echo "<td>".$pr["PID"][$i]."</td>";
        echo "<td>".$pr["PName"][$i]."</td>";
        echo "<td>".$pr["Disease"][$i]."</td>";
        echo "</tr>";
      }
   ?>
</table>
</div>


</div>
 </body>
 </html>