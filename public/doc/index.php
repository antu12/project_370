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
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<!--Style-->
	<style type="text/css">
body{
  min-width: 600px;
  position: relative;
  /*background-image: url("doc.jpg");*/
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
}
th, td {
  
    padding: 8px;
  }

#addmittedb, #nonb{
  display: none;
}

#admittable, #nontable, #nurset{
  display: none;
}

#share{
  position: absolute;
  right: 12px;
  color: red;
  width: 50px;
}

   </style>
 </head>
<body>
<!--Sidebar-->
 
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

<a href="share.php" id="share">Shared Files</a>

<div id="header">
   <h1>Welcome Doctor!</h1>

    <br><br>
    <button id="patb" onclick="patientFunction()">Show Patient</button>
    <button id="nurb" onclick="nurseFunction()">Show Nurse</button>
  <br><br>
    <button id="addmittedb" onclick="admittedFunction()">Admitted</button>
    <button id="nonb" onclick="nonAdmittedFunction()">Non-Admitted</button>
 </div>

  <br><br>
 <!--Admitted patient table-->
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
    $prr=$database->show_admitted_patients_by_Doc();

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
    $prrr=$database->show_Nonadmitted_patients_by_Doc();
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




<table id="nurset">
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





<script type="text/javascript">

    function patientFunction(){
         document.getElementById("addmittedb").style.display = "inline-block";
         document.getElementById("nonb").style.display = "inline-block";
         document.getElementById("nurset").style.display = "none";
         }

    function nurseFunction(){
         document.getElementById("nurset").style.display = "inline-block";
         document.getElementById("addmittedb").style.display = "none";
         document.getElementById("nonb").style.display = "none";
         document.getElementById("admittable").style.display = "none";
         document.getElementById("nontable").style.display = "none";
         }     

    function admittedFunction(){
         document.getElementById("admittable").style.display = "inline-block";
         document.getElementById("nontable").style.display = "none";
         }   

     function nonAdmittedFunction(){
         document.getElementById("admittable").style.display = "none";
         document.getElementById("nontable").style.display = "inline-block";
         }             
</script>

</body>
</html>