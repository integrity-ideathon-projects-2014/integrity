<?php

header('Content-Type: text/json');

include_once('../lib/core/init.inc.php');

$db = new Database; 
$status = array();
$ar = array(
    'str username' => $_POST['username'],
    'str password' => $_POST['password'],
    'str name' => $_POST['username'],
    'str email' => $_POST['email']);

if( $db->insert('user',$ar)){
    $status['success'] = 'submited';
}else{
    $status['success'] = 'not submitted';
}

echo json_encode($status);