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
	<title>Nurse</title>
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

<div id="header">
   <h1>Welcome Nurse!</h1>
 </div>

 <div>
 <h3>Your Patient's Files are:</h3>
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
    <th>File</th>
  </tr>
  <tr>
  <?php 
    $prr=$database->show_admitted_patients_by_Nurse();

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
 </div>

</body>
</html>