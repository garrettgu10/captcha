<!DOCTYPE html>
<html>
<head>
<title>Key generation</title>
</head>
<body>
<?php
function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
$secret = "INSERT SECRET KEY HERE";
require('autoload.php');
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER['REMOTE_ADDR']);
if($resp->isSuccess()){
	echo "valid<br>";
	$filename = RandomString();
	$myfile = fopen("keys/$filename", "w") or die("fail");
	echo "your single-use key is '$filename'";
	fclose($myfile);
}else{
	echo "not valid<br>";
	$errors = $resp->getErrorCodes();
	foreach ($errors as &$error){
		echo "$error<br>";
	}
}
?>
</body>
</html>
