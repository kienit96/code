<?php
	session_start();
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	$lang = "vi";

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	include_once _source."lang.php";

	$where = "";
	if($_POST['namsinh'] != ""){
		$where .= " and ten_vi = '".$_POST['namsinh']."'";	
	}
	if($_POST['gioitinh'] != ""){
		$where .= " and gioitinh = '".$_POST['gioitinh']."'";	
	}
	if($_POST['huongnha'] != ""){
		$where .= " and huongnha = '".$_POST['huongnha']."'";	
	}

	$d->reset();
	$sql = "select noidung_$lang from table_baiviet where type='phongthuy' $where";
	$d->query($sql);
	$row_detail = $d->fetch_array();
  	
  	echo $row_detail['noidung_'.$lang];
?>