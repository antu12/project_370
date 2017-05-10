<?php 
	session_start();
	$error="Please Input your ID, Password";
	require_once("../includes/database.php");

	if (isset($_POST["submit"])) {
		$validation=$database->authenticate($_POST["EID"], $_POST["Pass"]);
		if ($validation!=true) {
			$error="Invalid Id/Password";
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>log In</title>
 		<link rel="stylesheet" type="text/css" href="style/form_style.css">
 		<style type="text/css">
 		body{
 			background-image: url(back.jpg);
 		}
 		form{
 			margin-top: 200px;
 		}
 		</style>
 </head>
 <body>

 	<form class="dark-matter" name="" method="post" action="index.php">
 		<p><?php echo $error; ?></p>
 		<input type="text" name="EID" id="ID" placeholder="Input your EID"  required>
 		<input  type="password" name="Pass" placeholder ="Password" required>
 		<input class="button" type="submit" name="submit" value="log In">

 	</form>
 </body>
 </html>
 <style type="text/css">
 body{
 	background-color: #e0e0d6;
 	}</style>
