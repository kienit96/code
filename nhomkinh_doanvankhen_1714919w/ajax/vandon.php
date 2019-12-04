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
	include_once _source."lang_$lang.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	$d = new database($config['database']);

?>
<div class="form_van">
	<input type="text" value="" placeholder="Nhập mã đơn hàng" />
	<button>Kiểm tra</button>
	<p>Bạn vui lòng kiểm tra email đặt hàng để lấy mã đơn hàng . </p>
</div>
	