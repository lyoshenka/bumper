<?php
include("../includes/class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
//parameters are(SESSION, name of the table, name of the password field, name of the username field)
if($log->logincheck($_SESSION['loggedin'], "logon", "password", "useremail") == false){
    die();
}else{

require_once('../includes/dbWrapper.php');
require_once('../includes/bumper.config');
error_reporting(0);
$db = new dbWrapper('localhost', DBUSER, DBPASS, DBNAME, true);
if ($_POST['action'] == 'removeReminder') : 
$result = $db->q("DELETE FROM bumpQueue WHERE bumpId = ?", 's', $_POST['removeBump']);
die();
endif;
}