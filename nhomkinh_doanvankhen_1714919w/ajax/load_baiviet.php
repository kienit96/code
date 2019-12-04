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
	$d = new database($config['database']);

	if(isset($_POST)){
		$id = (int)$_POST['id'];
		
		$d->reset();
		$sql = "select noidung_$lang as noidung from #_baiviet where id = ".$id;
		$d->query($sql);
		$data = $d->fetch_array();

		if($data['noidung'] != ''){
			echo $data['noidung'];
		}else{
			echo '<div class="updating">Nội dung đang cập nhật</div>';
		}
	}
?>