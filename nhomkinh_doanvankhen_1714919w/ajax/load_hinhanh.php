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
	
	$d->reset();
	$sql= "select photo from #_album_photo where type='congtrinh' and id_album = '".$_POST['id']."' order by stt asc ";
	$d->query($sql);
	$album_images = $d->result_array();
	
	$data =  array();
	foreach ($album_images as $key => $value) {
		array_push($data, array("src"=>_upload_album_l.$value['photo']));
	}
	echo json_encode($data);
?>