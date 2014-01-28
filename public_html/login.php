<?php
include_once('../lib/core/init.inc.php');

$msg = "Please enter email and passowrd";
if(isset($_POST['submit'])){
	$db = new Database; 
	$email = $_POST['email'];
	$passowrd = $_POST['passowrd'];
	
	$sql = "SELECT * FROM users WHERE users.email='".$email."' AND users.password='".$passowrd."'";
	//echo $sql;
	$db->sql($sql);
	$res = $db->results;
	$r = array_pop($res);
	if($db->numResults == 1){
		setcookie('user', $r['user_id']);
		header("Location: integrity.php");
		exit;
	}else{
		$msg = "Invalid! email/passowrd";
	}
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php echo $msg; ?><br/>
email <input name="email">
passowrd <input name="passowrd" type="password">
   <input type="submit" name="submit">
</form>
