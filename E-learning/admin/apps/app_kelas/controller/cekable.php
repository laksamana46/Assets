<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['USER_LEVEL']) AND $_SESSION['USER_LEVEL'] > 2) die ();
define('_FINDEX_','BACK');

require_once ('../../../../config.php');
require_once ('../../../../system/database.php');
require_once ('../../../../system/function.php');

$dbconn = new Connection(); 
$db = New FQuery();
if(isset($_POST['id_kelas'])) {
$data = mysql_query("SELECT * FROM kelas WHERE id_kelas='$_POST[id_kelas]'");
	if(mysql_num_rows($data) > 0 ) {
		echo 1;
	}
	else {
		echo 0;
	}
}
if(isset($_POST['nama'])) {
$data = mysql_query("SELECT * FROM kelas WHERE nama='$_POST[nama]'");
	if(mysql_num_rows($data) > 0 ) {
		echo 1;
	}
	else {
		echo 0;
	}
}
