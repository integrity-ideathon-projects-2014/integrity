<?php

header('Content-Type: text/json');

include_once('../lib/core/init.inc.php');

$db = new Database; 
$status = array();


$ar = array(
	'int test_id' => $_POST['test_id'],
	'int user_id' => $_POST['user_id'],
	'int video_id' => $_POST['video_id'],
	'int integrity_type' => $_POST['integrity_type'],
	'int time' => $_POST['time'],
	'int ethic_id' => $_POST['ethic_id']);

if($db->insert('test_record',$ar)){
	$status['msg'] = 'yes';
}else{
	$status['msg'] = 'no';
}

echo json_encode($status);
