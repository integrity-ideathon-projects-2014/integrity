<?php 

include_once('../lib/core/init.inc.php');

$db = new Database; 
#$ar = array(
#    'str username' => 'abc',
#    'str password' => 'def',
#    'str name' => 'ghi',
#    'str email' => 'jkl@mno.pqr');
#
#if( $db->insert('user',$ar)){
#    echo "success";
#}else{
#    echo "no";
#}

#$sql = "select * from user";
#$db->sql($sql);
#//echo $db->numResults;
#print_r($db->keys);
#foreach($db->results as $res){
#    print_r($res);
#}

#$ar = array(
#    'str name' => 'deeps.',
#    'int email' => 'deeps.');
#if($db->update('user', $ar, 'id=2')){
#	echo 'success';
#}else{
#	echo 'no';
#}
#echo $db->affectedRows;


#if($db->delete('user',2)){
#	echo "success";
#}else{
#    echo "no"; } 
#        echo $db->affectedRows;

$ar = array(
    'username' => 'deeeeeps',
    'password' => 'deeeeps',
    'name' => 'deepak',
    'email' => 'email');
$user = new User;
//var_dump( $user->add($ar));
//echo $user->lastInsertId;
$user->update();

#$sql = 'select * from user';
#$user->sql($sql);
#echo $user->numResults;
