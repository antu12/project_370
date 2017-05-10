<?php 

	session_start();
	require_once("../../includes/database.php");

	if (!isset($_SESSION["id"])) {
		echo "<script>alert('Please Log In first');</script>";
		$database->redirect_to("../index.php");
	}


	if (isset($_POST["fields"])) {
		$dis="inline-block";
		if ($_POST["fields"]!="huda") {
			$arrr=$database->search_by_specialization($_POST["fields"]);
			$samp=array_keys($arrr);
		}
	}
	else{
		$dis="none";
		$samp=null;
		$arrr=null;
	}
 ?>
<div id="search_employee">
	<form action="sbs.php" method="post" id="searchByField"> 
	Search Doctor by:
 <select id="searchDoc" name="fields">
 	<option value="huda">Please Select from below</option>
 	<option value="101">Psychology</option>
 	<option value="102">Neurology</option>
 	<option value="103">Cardiology</option>
 	<option value="104">Gynocology</option>

 </select>
</form>

</div>


<script type="text/javascript">
	document.getElementById('searchDoc').addEventListener("change", docbyfield, true);

	function docbyfield(){
		var x=document.getElementById("searchDoc").value;
		if (x!="huda") {
			document.getElementById("searchByField").submit();
		}

		
	}



</script>

<div id="search_employee">
	
	<table border="1" style="display:<?php echo $dis; ?>;">
	
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
<br><br>

<a href="index.php"> Back To My Profile</a>
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
