<!DOCTYPE html>
<html>
<head>
<title>Key Verification</title>
</head>
<body>
<?php
if(isset($_GET["key"])){
	$key = $_GET["key"];
	if(file_exists("keys/$key")){
		//success
		unlink("keys/$key");
		echo "Success! The entity who sent you the key is not a robot. The key has been deactivated.";
	}else{
		echo "Error. The key is not valid. The entity who sent you the key may be a robot, or they sent the same key to multiple people.";
	}
}
?>
<form method="get">
	Input key: <input type="text" name="key">
	<input type="submit" value="submit">
</form>
</body>
</html>
