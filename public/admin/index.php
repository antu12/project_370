<?php 
	session_start();
	require_once("../../includes/database.php");
	if (!isset($_SESSION["id"])) {
		echo "<script>alert('Please Log In first');</script>";
		$database->redirect_to("../index.php");
	}

	$msg="";

	if (isset($_POST["addEmp"])) {
		
		$chek=$database->add_anyone($_POST["EMP_ID"],$_POST["name"],$_POST["password"],$_POST["degree"],$_POST["address"],(string)$_POST["phone"],(string)$_POST["salary"],$_POST["gender"],$_POST["Droom"],$_POST["specialization"],$_POST["floor"],$_POST["skill"],$_POST["jobc"]);
		}

	if (isset($_POST["delEmp"])) {
		
		$chek=$database->del_anyone($_POST["del_id"]);
	}

	$database->show_all_doctors();

	if (isset($_POST['logout'])) {
		$database->logout();
	}



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin</title>
 	<link rel="stylesheet" type="text/css" href="../style/main.css">
 		<link rel="stylesheet" type="text/css" href="../style/pure.css">

 	<script type="text/javascript" src="../script/main.js"></script>
 	<style type="text/css">
 	#sbs{
 		position: absolute;
 		right: 12px;
 		color: red;
 		width: 50px;

 	}
 	#sb{
 		position: absolute;
 		right: 68px;
 		color: red;
 		width: 100px;
 	}
 	</style>
 </head>
 <body>
 	
  <div id="side">
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
 	</div><!-- ENd of Side bar-->
  </div><!-- ENd of side-->
<a href="sbs.php" id="sbs">Search Doctors</a>
<a href="search_employee.php" id="sb">Search All Employee</a>
<div id="header">  

	<h1>Welcome Admin!</h1>
	
	<br>
	<button id="showb" onclick="showFunction()">Show Employee</button>
  	<button id="addb" onclick="addFunction()">Add Employee</button>
  	
  	<button id="budgetb" onclick="budgetFunction()">Show Budget and Cost</button>
  	<button id="del" onclick="del()">Delete Employee</button>
  	<br>
  	<button id="re" onclick="refresh()">Refresh</button>

   	<br><br><br>
   

   
	<button id="docb" onclick="docFunction()">Doctor</button>
	<button id="nurb" onclick="nurFunction()">Nurse</button>
	<button id="patb" onclick="patFunction()">Patient</button>
	<button id="repb" onclick="repFunction()">Receptionist</button>
	<button id="othb" onclick="othFunction()">Others</button>
	<br><br>

	<button id="adp" onclick="adpFunction()">Admitted</button>
	<button id="nnp" onclick="nnpFunction()">Non-admitted</button>
	<br><br>
</div><!-- Imports header-->

	

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

	 <table id="admittable">
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
  </tr>
  <tr>
  <?php 
    $prr=$database->show_admitted_patients();

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
        echo "<td>".$prr["Word_no"][$i]."</td>";
        echo "</tr>";
      }
   ?>
</table>

	

<!--non Admitted Patient-->
<br><br>

<table id="nontable">
   <tr>
    <th>PatientID</th>
    <th>PatientName</th>   
    <th>Patient Sex</th>
    <th>Patient Diseases</th>
     <th>Patient Phoneno</th>
    <th>Served by Receptionist</th>
    <th>Visited date</th>
  </tr>
  <tr>
  <?php 
    $prrr=$database->show_Nonadmitted_patients();
    for($i=0; $i< count($prrr["PID"]); $i++){
          echo "<tr>";

        echo "<td>".$prrr["PID"][$i]."</td>";
        echo "<td>".$prrr["PName"][$i]."</td>";
        echo "<td>".$prrr["Sex"][$i]."</td>";
        echo "<td>".$prrr["Disease"][$i]."</td>";
        echo "<td>".$prrr["Phone"][$i]."</td>";
        echo "<td>".$prrr["Name"][$i]."</td>";
        echo "<td>".$prrr["visit_date"][$i]."</td>";
        echo "</tr>";
      }
   ?>
</table>


<table id="Reciptionist" >
  <tr>
    <th>RecieptionistID</th>
    <th>RecieptionistName</th>		
    <th>RecieptionistDegree</th>
    <th>RecieptionistAddress</th>
    <th>RecieptionistPhoneNo</th>
    <th>RecieptionistSalary</th>
    <th>RecieptionistGender</th>
    <th>RecieptionistComputerSkill</th>
  </tr>
  <?php 
    $prrr=$database->show_all_reciptionist();
    for($i=0; $i< count($prrr["EID"]); $i++){
          echo "<tr>";

			echo "<td>".$prrr["EID"][$i]."</td>";
			echo "<td>".$prrr["Name"][$i]."</td>";
			echo "<td>".$prrr["Degree"][$i]."</td>";
			echo "<td>".$prrr["Address"][$i]."</td>";
			echo "<td>".$prrr["PhoneNo"][$i]."</td>";
			echo "<td>".$prrr["Salary"][$i]."</td>";
			echo "<td>".$prrr["Gender"][$i]."</td>";
			echo "<td>".$prrr["Computer_Skills"][$i]."</td>";
			echo "</tr>";
      }
   ?>
</table>


 <table id="Others" >
	  <tr>
	    <th>EmployeeID</th>
	    <th>EmployeeName</th>		
	    <th>EmployeePassword</th>
	    <th>EmployeeAddress</th>
	    <th>EmployeePhoneNo</th>
	    <th>Employee Salary</th>
	    <th>Employee Gender</th>

	    <th>Employee Position</th>
	  </tr>
	  <tr>
	    <?php 
  			$arr_oth=$database->show_other_employees();
  			for($i=0; $i< count($arr_oth["EID"]); $i++){
  				echo "<tr>";

				echo "<td>".$arr_oth["EID"][$i]."</td>";
				echo "<td>".$arr_oth["Name"][$i]."</td>";
				echo "<td>".$arr_oth["Degree"][$i]."</td>";
				echo "<td>".$arr_oth["Address"][$i]."</td>";
				echo "<td>".$arr_oth["PhoneNo"][$i]."</td>";
				echo "<td>".$arr_oth["Salary"][$i]."</td>";
				echo "<td>".$arr_oth["Gender"][$i]."</td>";
				echo "<td>".$arr_oth["Job_Catagory"][$i]."</td>";
				echo "</tr>";
			}
  		 ?>
</table>
   <form id="dele" action="index.php" method="post" class="pure-form">
		<h5>DELETE Employee</h5>
		<p>EID: </p>
		<input type="text" name="del_id" id="del_id">
		<input id="sub" type="submit" name="delEmp" value="Submit"></input>
	</form>

   <div id="addEmpForm">
 		<h3>Add Employee Form</h3>

		<form class="pure-form" id="emForm" action="index.php" method="post">
		    <p><?php echo $msg; ?></p>
			
			<p class="pp">Employee Type: </p>
			<select class="box" id="empType" name="empType">
				<option value="DOC">Doctor</option>
				<option value="NUR">Nurse</option>
				<option value="REP">Receptionist</option>
				<option value="OTH">Others</option>
			</select>
			<br>
			<br>
			<p class="pp">EMP_ID:</p>
			<input  class ="box" id="id" type="text" name="EMP_ID" required>
			<br>
			<br>
			<p class="pp">Name :</p>
			
			<input  class ="box" id="name" type="text" name="name" required>
			<br>
			<br>
			<p class="pp">Password :</p>
			<input class ="box" id="pass" type="text" name="password" required>
		    <br>
		    <br>
			<p class="pp">Degree :</p>
			<input class ="box" id="degree" type="text" name="degree" required>
		     <br>
		     <br>
			
		     <p class="pp">Phone No :</p>
			<input class ="box" id="tel" type="tel" name="phone" required>
				<br>
				<br>
		       <p class="pp">Address :</p>
			<input class ="box" id="add" type="address" name="address" required>

				<br>
				<br>
		       <p class="pp">Salary:</p>
				<input class ="box" id="salary" type="number" name="salary" required>
			<br>
				<br>
		       <p class="pp">Gender:</p>
			<input class ="box" id="gender" type="radio" name="gender" value="M">M
			<input class ="box" id="gender" type="radio" name="gender" value="F" required>F
			<br>
			<br>
			<!--doctor-->
		    <p class="pp"> Specialization : (Only For Dctor)</p>
			<input class ="box" id="sp" type="text" name="specialization" >
			<br>
			<br>
		     <p class="pp">Room no :(Only For Doctor)</p>
			<input class ="box" id="add" type="text" name="Droom" >




			<br>
			<br>
			<!--nurse-->
		     <p class="pp">Floor :(Only For Nurse  0 or 1)</p>
			<input class ="box" id="floor" type="text" name="floor" >





			<br>
			<br>
			<!--receptionsit-->
		      <p class="pp">Computer skills :(Only For Receptionsit)</p>
			<input class ="box" id="com" type="number" name="skill" >



			<br>
			<br>
			<!--others-->
		      <p class="pp">Job Catagory :(Only For Others)</p>

			<input class ="box" id="jc" type="text" name="jobc" >

			<br><br><br>

			<input id="sub" type="submit" name="addEmp" value="Submit"></input>
		</form>
 	</div><!-- ENd of Add EMP FOrm-->




 <div id="budgetCost">
		<h1>Budget and Cost</h1>
		<br><br>
		<table >
		  <tr>
		    <th>Year</th>
		    <th>Salary</th>   
		    <th>Utility</th>
		    <th>Equipment</th>   
		    <th>Doctors</th>
		    <th>Medicine</th>   
		    <th>Diagonosis</th>
		  </tr>
		  <?php 
  			$arr_bud=$database->show_year();
  			for($i=0; $i< count($arr_bud["year"]); $i++){
  				echo "<tr>";

				echo "<td>".$arr_bud["year"][$i]."</td>";
				echo "<td>".$arr_bud["Salary"][$i]."</td>";
				echo "<td>".$arr_bud["Utility"][$i]."</td>";
				echo "<td>".$arr_bud["Equipment"][$i]."</td>";
				echo "<td>".$arr_bud["Doctors"][$i]."</td>";
				echo "<td>".$arr_bud["Medicine"][$i]."</td>";
				echo "<td>".$arr_bud["Diagonosis"][$i]."</td>";
				echo "</tr>";
			}
  		 ?> 
		</table>
		<!-- Search DOC -->

 </div><!-- Budget and cost-->



 </body>
 </html>


