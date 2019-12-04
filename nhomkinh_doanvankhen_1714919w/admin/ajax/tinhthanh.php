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

	$id_tinh = $_POST["id_tinh"];





	

	$sql="select * from table_place_dist where id_city=".$id_tinh." order by stt ";

	$stmt=mysql_query($sql);

	$str='

		<option value="">-Quận huyện-</option>			

		';

	while ($row=@mysql_fetch_array($stmt))
	{

		if($row["id"]==(int)@$id_select)

			$selected="selected";

		else
			$selected="";



		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			

	}

	echo  $str;

	}			

		

?>

