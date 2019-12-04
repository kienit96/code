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
	
	$id = $_POST['id'];

	$d->reset();
	$sql = "select id,phivanchuyen,thoigiangiaohang from #_place_city where id='".$id."'";
	$d->query($sql);
	$pvc = $d->fetch_array();
	
	$phivanchuyen = array('pvc' => $pvc['phivanchuyen'] ,'thoigiangiaohang' => $pvc['thoigiangiaohang']!=''?$pvc['thoigiangiaohang']:'...', 'phivanchuyen'=> $pvc['phivanchuyen']!=0?number_format($pvc['phivanchuyen'],0, ',', '.').'&nbsp;₫':'Miễn Phí', 'tongtien'=> number_format((get_order_total() + $pvc['phivanchuyen']),0, ',', '.').'&nbsp;₫');
	echo json_encode($phivanchuyen);
?>