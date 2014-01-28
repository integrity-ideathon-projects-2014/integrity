<?php

include_once('../lib/core/init.inc.php');
$msg = "please fill up the form";

$params = array('name', 'email', 'password', 'age', 'gender',  'country', 'city', 'qualification', 'profession', 'organization');
foreach($params as $param){
    $$param = "";
}

if(isset($_POST['submit'])){
$ar = array(); 

$status = false;
    foreach($params as $param){
        if(isset($_POST[$param]) && !empty($_POST[$param])){
            if($param == 'age') {
            	$ar["int {$param}"] = $_POST[$param];
            }else{
            	$ar["str {$param}"] = $_POST[$param];
            }
            $$param = $_POST[$param];
            $status= true;
        }else{
        	$status =false;
            $msg = "some fields are missing";
            break;
        }
    }
	if($status){
		$db = new Database; 
		if( $db->insert('users',$ar)){
		    $msg = "Successfully submitted.";
		}else{
 	  	 echo "Could not submit your data";
		}
	}else{
		$msg ="Some fields missing";
	}
}

?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php echo $msg; ?><a href="index.php">Home</a><br>
<?php

foreach($params as $param){
	echo "{$param} <input name=\"{$param}\" value=\"{$$param}\"> <br/>";
}
?>
   <input type="submit" name="submit">
</form>
