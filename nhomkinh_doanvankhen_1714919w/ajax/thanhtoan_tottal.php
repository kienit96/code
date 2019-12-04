<?php
	error_reporting(0);
	session_start();
	$session=session_id();
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');
    
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	$d = new database($config['database']);
	
	$id_tinh = $_GET['id_tinh'];
	$phivanchuyen = phivanchuyen($id_tinh);
	
?>

<b>Thanh Toán : <?=number_format(get_order_total() + $phivanchuyen,0, ',', '.')?>&nbsp;đ</b>