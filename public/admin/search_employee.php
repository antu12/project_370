<?php 
session_start();

	require_once("../../includes/database.php");
		

	if (!isset($_SESSION["id"])) {
		echo "<script>alert('Please Log In first');</script>";
		$database->redirect_to("../index.php");
	}

	if (isset($_POST["submitSearch"])) {
		
		$arrr=$database->search_all_employee($_POST["searchName"]);
		if (!empty($arrr)) {
			
			$samp=array_keys($arrr);
			$errorMsg="";
			$dis="inline-block";
		}
		else{
			$errorMsg="Nothing found with name ".$_POST["searchName"];
			$dis="none";
			$samp=null;
			$arrr=null;
		}
	}
	else{
		$dis="none";
		$samp=null;
		$arrr=null;
		$errorMsg="";
	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search all employee</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
 	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>


 <div id="search_employee">
 	<form i action="search_employee.php" method="POST">
 	<input type="text" name="searchName" id="searchBar">
 	<input type="submit" id="submitSearch" name="submitSearch">
 </form>


<table  class="table table-striped" id="idtable" border="1" style="display:<?php echo $dis; ?>;">
		<h2><?php echo $errorMsg; ?></h2>
	<tr>
		<?php 
			for($i=0; $i<count($samp); $i++){
				?>
				
				<th><?php echo $samp[$i] ?></th>
				<?php

			}
		 ?>
	</tr>
	<?php 
	for($j=0; $j<count($arrr[$samp[0]]); $j++){
		?>
		<tr>
		<?php
		for($k=0; $k<count($samp); $k++){
			?>
			<td>
			<?php echo $arrr[$samp[$k]][$j]; ?></td>
			<?php
		}
		?>
		</tr>
		<?php
	}

 ?>

 </table>
 </div>
 <br>
 <br>
 <br>
 <br>
 <a href="index.php"> Back To My Profile</a>
 </body>
</html>

<style type="text/css">
	body{
		background-color: #e0e0d6;
	}
	#search_employee{
		display: inline-block;
		margin:0 auto;
		width: 400px;
	}
	
</style>
