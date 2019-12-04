<?php 
session_start();
	@define ( '_lib' , '../../libraries/');
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	$login_name = 'NINACO';	
	if(isset($_POST) && isset($_SESSION[$login_name])){
		if(isset($_POST["id"])){
			echo $sql = "update ".$_POST["bang"]." SET ".$_POST["type"]."=".$_POST["value"]." WHERE  id = ".$_POST["id"]."";
			$data = mysql_query($sql) or die("Not query sql");
		}
	}
?>