<?php
	session_start();
	@define ( '_lib' , '../../libraries/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	$login_name = 'NINACO';	
	if(isset($_POST) && isset($_SESSION[$login_name])){
		$id_ward = $_POST["id_ward"];

		$sql="select * from table_place_street where id_ward=".$id_ward." order by stt ";
		$stmt=mysql_query($sql);
		$str='
			<option value="">-Đường/Phố-</option>			
			';
		while ($row=@mysql_fetch_array($stmt))
		{
			if($row["id"]==(int)@$id_select )
				$selected="selected";
			else
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		echo  $str;
	}
?>