<?php 
	require_once("../../includes/database.php");
	$msg="";

	if (isset($_POST["addEmp"])) {
		$chek=$database->add_anyone($_POST["EMP_ID"],$_POST["name"],$_POST["password"],$_POST["degree"],$_POST["address"],(string)$_POST["phone"],(string)$_POST["salary"],$_POST["gender"],$_POST["Droom"],$_POST["specialization"],$_POST["floor"],$_POST["skill"],$_POST["jobc"]);
		if ($chek==ture) {
			$mag="Added Successfully";
		}
		$msg="Failed adding Employee";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>empForm</title>
</head>
<body >
<h3>Add Employee Form</h3>

<form id="emForm" action="addEmp.php" method="post">
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
</body>
</html>

<!--<style type="text/css">

body{
	position: relative;
}

h3{
	text-align: center;
}

.box{
	width: 170px;
}

#emForm{
	padding-top: 20px;
	background-color: #ddd;
	display: block;
	margin: 0 auto;
	width: 50%;
	position: absolute;
	left: 25%;



    
}
.pp, .box{
	padding: 0 5px;
}

.pp{
	margin: 0px;
	display: inline-block;
	position: absolute;
		left: 28%;
}
.box{
	margin-top: 5px;
	position: absolute;
	left: 50%;
}

#sub{
	display: block;
	margin: 0 auto;
}
</style>

-->
<script type="text/javascript">
	document.querySelector("#empType").addEventListener("change", partial, true);

	function partial(){
		var parID=document.querySelector("#empType").value;
		document.querySelector("#id").value=parID+"-";
	}

	//document.querySelector("#empType").addEventListener("change", mm, true);

	function mm(){
		var x=new XMLHttpRequest();
		 co=document.getElementById("empType").selectedIndex;
		
	x.onreadystatechange=function(){
		if (x.readyState==4 && x.status==200) {
			document.querySelector("#s").innerHTML =x.responseText ;
		}

	}

	x.open("GET", "?ind="+co, true);
	x.send();
	}

</script>