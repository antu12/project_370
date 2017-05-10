<?php 
	session_start();
	require_once("../../includes/database.php");
	if (!isset($_SESSION["id"])) {
		echo "<script>alert('Please Log In first');</script>";
		$database->redirect_to("../index.php");
	}
	if (isset($_POST['logout'])) {
		$database->logout();
	}
	if (isset($_POST["addPat"])) {
		
		$chek=$database->add_patient($_POST["PID"],$_POST["name"],$_POST["gender"],$_POST["disease"],(string)$_POST["phone"],$_POST["REP_ID"],$_POST["select"],$_POST["ad_date"],$_POST["rel_date"],$_POST["ward_no"],$_POST["visit_date"]);
		}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Receptionist</title>
	<!--Style-->
	<link rel="stylesheet" type="text/css" href="../style/form_style.css">
	<style type="text/css">
body{
  min-width: 600px;
  position: relative;
  background-image: url("recep.jpg");
 
}

#sidebar{
    height: 100%;
    min-height: 510px;
    min-width: 200px;
    border:5px;
    margin: 10px;
    border-radius: 1%;
    float: left;
    overflow: auto;
    width: 20%;
    padding-bottom: 100px;
    background-color: #ddd;

}
  
 #head{
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      color: blue;
      
    }
  #sidebarUL{
    padding-left: 20px;
  }
  #sidebarA{
     padding-left: 50px; 
  }
  
  
#header{
  text-align: center;
}
table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
}

th, td {
  
    padding: 8px;
 }
 #Doctor,#Nurse,#addpat{
 	display: none;
 }

  </style>
</head>

<body>
<div id="sidebar">
    <p id="head">Personal Information:</p>
       <ul id="sidebarUL" style="list-style-type:none">
      <?php $res= $database->show_my_info($_SESSION["id"]);?>
        <br><br>
      <li>Name :</li><p><?php echo  $res["Name"];?></p>
      <li>ID :</li><p><?php echo  $res["EID"];?></p>
      <li>Address :</li><p><?php echo  $res["Address"];?></p>
      <li>Phone Number :</li><p><?php echo  $res["PhoneNo"];?></p>
      <li>Gender :</li><p><?php echo  $res["Gender"];?></p>
      <li>Salary :</li><p><?php echo  $res["Salary"];?></p>
    </ul>
   <br><br><br><br>
   <form action="index.php" method="post">
		<input type="submit" id="logout" value="Logout" name="logout">
	</form>
 </div>

<div id="header">
   <h1>Welcome Receptionist!</h1>

    <br><br>
    <button id="apb" onclick="addpatFunction()">Add Patient</button>
    <button id="docb" onclick="doctorFunction()">Show Doctors</button>
    <button id="nurb" onclick="nurseFunction()">Show Nurse</button>
  <br><br>


  <table id="Doctor" >
		
 		<tr>

   			<th>DoctorID</th>
		    <th>DoctorName</th>		
		    <th>DoctorDegree</th>
		    <th>DoctorAddress</th>
		    <th> DoctorPhoneNo</th>
		    <th>DoctorSalary</th>
		    <th>DoctorGender</th>
		    <th>DoctorRoomNo</th>
		    <th>DoctorSpecialization</th>
  		</tr>

  		<?php 
  			$arr=$database->show_all_doctors();
  			for($i=0; $i< count($arr["EID"]); $i++){
  				echo "<tr>";

				echo "<td>".$arr["EID"][$i]."</td>";
				echo "<td>".$arr["Name"][$i]."</td>";
				echo "<td>".$arr["Degree"][$i]."</td>";
				echo "<td>".$arr["Address"][$i]."</td>";
				echo "<td>".$arr["PhoneNo"][$i]."</td>";
				echo "<td>".$arr["Salary"][$i]."</td>";
				echo "<td>".$arr["Gender"][$i]."</td>";
				echo "<td>".$arr["RoomNum"][$i]."</td>";
				echo "<td>".$arr["Dept_name"][$i]."</td>";
				echo "</tr>";
			}
  		 ?>
  		
	</table><!-- ENd of doctor Table-->

	<table id="Nurse" >
	  <tr>
	    <th>NurseID</th>
	    <th>NurseName</th>		
	    <th>NurseDegree</th>
	    <th>NurseAddress</th>
	    <th>NursePhoneNo</th>
	    <th>NurseSalary</th>
	    <th>NurseGender</th>
	  </tr>
	  <?php 
  			$arr_nurse=$database->show_all_nurse();
  			for($i=0; $i< count($arr_nurse["EID"]); $i++){
  				echo "<tr>";

				echo "<td>".$arr_nurse["EID"][$i]."</td>";
				echo "<td>".$arr_nurse["Name"][$i]."</td>";
				echo "<td>".$arr_nurse["Degree"][$i]."</td>";
				echo "<td>".$arr_nurse["Address"][$i]."</td>";
				echo "<td>".$arr_nurse["PhoneNo"][$i]."</td>";
				echo "<td>".$arr_nurse["Salary"][$i]."</td>";
				echo "<td>".$arr_nurse["Gender"][$i]."</td>";
				echo "</tr>";
			}
  		 ?>
	</table><!-- ENd of Nurse -->

	<div id="addpat">
		<h3>Add Patient Form</h3>

		<form class="dark-matter" id="patForm" action="index.php" method="post">
			
			<p class="pp">PID:</p>
			<input  class ="box" id="id" type="text" name="PID"  required>
			<br>
			<br>
			<p class="pp">Name :</p>
			
			<input  class ="box" id="name" type="text" name="name" required>
			<br>
			<br>
			<p class="pp">Gender:</p>
			<input class ="box" id="gender" type="radio" name="gender" value="M">M
			<input class ="box" id="gender" type="radio" name="gender" value="F" required>F
			<br>
			<br>
		       <p class="pp">Disease:</p>
				<input class ="box" id="disease" type="text" name="disease" required>
			<br>
			<br>
			<p class="pp">Phone No :</p>
			<input class ="box" id="tel" type="tel" name="phone" required>
			<br>
			<br>
			<p class="pp">REP_ID:</p>
			<input  class ="box" id="id" type="text" name="REP_ID" required>
			<br>
			<br>
			<p class="pp">Select:</p>
			<input class ="box" id="select" type="radio" name="select" value="adm">Admitted Patient
			<input class ="box" id="select" type="radio" name="select" value="non" required>Non-Admitted Patient
			<br>
			<br>
			<!--ADMITTED-->
			<p class="pp">Admitted Date(Only for Admitted Patient) :</p>
			<input class ="box" id="ad_date" type="date" name="ad_date" >
			<br>
			<br>
			<p class="pp">Release Date(Only for Admitted Patient) :</p>
			<input class ="box" id="rel_date" type="date" name="rel_date" >
			<br>
			<br>
			<p class="pp">Ward_No :</p>
			<input class ="box" id="ward_no" type="text" name="ward_no" >
			<br>
			<br>
			<!--NON-ADMITTED-->
			<p class="pp">Visit Date(Only for Non-Admitted Patient) :</p>
			<input class ="box" id="visit_date" type="date" name="visit_date" >
			<br>
			<br>
			<input id="sub" type="submit" name="addPat" value="Submit"></input>
		</form>
	</div>

	<script type="text/javascript">
		function doctorFunction(){
			document.getElementById("Doctor").style.display = "inline-block";
			document.getElementById("Nurse").style.display = "none";
			document.getElementById("addpat").style.display = "none";
		}
		function nurseFunction(){
			document.getElementById("Nurse").style.display = "inline-block";
			document.getElementById("Doctor").style.display = "none";
			document.getElementById("addpat").style.display = "none";
		}
		function addpatFunction(){
			document.getElementById("addpat").style.display = "inline-block";
			document.getElementById("Doctor").style.display = "none";
			document.getElementById("Nurse").style.display = "none";
		}
	</script>
</body>
</html>