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
	
	$id_tinh = $_POST['id_tinh'];
		
	$d->reset();
	$sql = "select * from #_quan where hienthi=1 and id_cat ='".$id_tinh."' ";
	$d->query($sql);
	$quanhuyen = $d->result_array();
	
?>
<option value="">--Quận Huyện--</option>
<?php for($i=0;$i<count($quanhuyen);$i++){?>
<option value="<?=$quanhuyen[$i]['id']?>"><?=$quanhuyen[$i]['ten']?></option>
<?php } ?>
