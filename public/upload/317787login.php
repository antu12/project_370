<?php 
	require_once('database.php');
	$err="PleaSE LOGIN";
	if (isset($_POST['submit'])) {
		$succ= $databaseCall->authenticate($_POST['email'],$_POST['password']);
		if ($succ==false) {
			$err="Invalid ID/Pass";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<p><?php echo $err; ?></p>
<form action="login.php" method="post" >
	email:
	<input type="email" name="email" id="email">
	password:
	<input type="password" name="password" id="password">

	<input type="submit" value="Submit" name="submit">
</form>
</body>
</html>