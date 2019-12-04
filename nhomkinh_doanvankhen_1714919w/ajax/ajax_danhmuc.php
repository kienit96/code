<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _source."lang.php";
	$d = new database($config['database']);

	$id = $_POST['id'];

	$d->reset();
	$sql_detail = "select id,tenkhongdau,ten_$lang,giatri from table_baiviet_cat where type='dichvu' and id_list = '".$id."'";
	$d->query($sql_detail);
	$mucdautu = $d->result_array();

  	$str = '<option value="">Mức đầu tư</option>';
  	foreach ($mucdautu as $key => $value) {
  		$str .= '<option value="'.$value['giatri'].'"">'.$value['ten_'.$lang].'</option>';
  	}
  	echo $str;
?>