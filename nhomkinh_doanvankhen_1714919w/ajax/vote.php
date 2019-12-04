<?php

	session_start();

	error_reporting(E_ALL & ~E_NOTICE & ~8192);



	if(!isset($_SESSION['lang']))

	{

	$_SESSION['lang']='vi';

	}

	$lang=$_SESSION['lang'];

	

	@define ( '_lib' , '../libraries/');
    

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
    

	$d = new database($config['database']);
	
	$id = $_POST['id'];

	$d->reset();
	$sql_detail = "select rate,luotxem from #_product where hienthi=1 and type='product' and id ='".$id."'";
	$d->query($sql_detail);
	$row_detail = $d->fetch_array();

	$r = (int)$row_detail['rate'];
	$luotxem = (int)$row_detail['luotxem'];
	$vote = (int)$_POST['vote'];
	// (5 + 4 * 10)/11
	$rate = $vote + $r;
	$rate = $rate;

	$sqlUPDATE_ORDER = "UPDATE table_product SET rate = ".$rate.", luotxem = luotxem + 1 WHERE  id = ".$id."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
	$d->reset();
	$sql_detail = "select rate/luotxem as tb from #_product where hienthi=1 and type='product' and id ='".$id."'";
	$d->query($sql_detail);
	$row_detail = $d->fetch_array();

	echo ceil($row_detail['tb']);