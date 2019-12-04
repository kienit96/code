<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){

	case "man_photo":

		get_photos();

		$template = "photo/photos";

		break;

	case "add_photo":		

		$template = "photo/photo_add";

		break;

	case "edit_photo":

		get_photo();

		$template = "photo/photo_edit";

		break;

	case "save_photo":

		save_photo();

		break;

	case "delete_photo":

		delete_photo();

		break;			

	default:

		$template = "index";

}



function get_photos(){

	global $d, $items, $url_link,$totalRows , $pageSize, $offset, $arr_lang;

	if(!empty($_POST)){

		$multi=$_REQUEST['multi'];

		$id_array=$_POST['iddel'];

		$count=count($id_array);

		if($multi=='show'){

			for($i=0;$i<$count;$i++){

				$sql = "UPDATE table_photo SET hienthi =1 WHERE  id = ".$id_array[$i]."";

				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				

			}

			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);			

		}

		

		if($multi=='hide'){

			for($i=0;$i<$count;$i++){

				$sql = "UPDATE table_photo SET hienthi =0 WHERE  id = ".$id_array[$i]."";

				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				

			}

			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);			

		}

		

		if($multi=='del'){

			for($i=0;$i<$count;$i++){

				$sql = "select * from #_photo where id= ".$id_array[$i]."";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						foreach ($arr_lang as $key => $l) {
							delete_file(_upload_hinhanh.$row['photo_'.$l]);
							delete_file(_upload_hinhanh.$row['icon_'.$l]);
						}
					}
				}
				$sql = "delete from table_photo where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
			}

			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);			

		}				

	}

		

	#----------------------------------------------------------------------------------------

	

	if($_REQUEST['hienthi']!='')

	{

	$id_up = $_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_photo where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_photo SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_photo SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	#-------------------------------------------------------------------------------			

	

	if($_REQUEST['type']!='')

	{

		$where.=" where type='".$_REQUEST['type']."'";

	}

	

	$sql="SELECT count(id) AS numrows FROM #_photo $where";

	$d->query($sql);	

	$dem=$d->fetch_array();

	$totalRows=$dem['numrows'];

	$page=$_GET['p'];

	

	$pageSize=10;

	$offset=5;

						

	if ($page=="")

		$page=1;

	else 

		$page=$_GET['p'];

	$page--;

	$bg=$pageSize*$page;		

	

	$sql = "select * from #_photo $where order by stt,id desc limit $bg,$pageSize";		

	$d->query($sql);

	$items = $d->result_array();	

	$url_link="index.php?com=photo&act=man_photo&type=".$_REQUEST['type'];	



}



function get_photo(){

	global $d, $item, $list_cat;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

	transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);

	$d->setTable('photo');

	$d->setWhere('id', $id);

	$d->select();

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);

	$item = $d->fetch_array();	

}



function save_photo(){

	global $d,$arr_lang;

	$file_name=fns_Rand_digit(0,9,15);
	$icon_name=fns_Rand_digit(0,9,15);


	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){
			foreach ($arr_lang as $key => $l) {
				if($photo = upload_image("file_".$l, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
					$data['photo_'.$l] = $photo;
					$d->setTable('photo');
					$d->setWhere('id', $id);
					$d->select();
					if($d->num_rows()>0){
						$row = $d->fetch_array();
						delete_file(_upload_hinhanh.$row['photo_'.$l]);
					}
				}
				if($icon = upload_image("icon_".$l, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$icon_name)){
					$data['icon_'.$l] = $icon;
					$d->setTable('photo');
					$d->setWhere('id', $id);
					$d->select();
					if($d->num_rows()>0){
						$row = $d->fetch_array();
						delete_file(_upload_hinhanh.$row['icon_'.$l]);
					}
				}
				$data['ten_'.$l] = $_POST['ten_'.$l];	
				$data['mota_'.$l] = $_POST['mota_'.$l];	
			}
			$data['stt'] = $_POST['stt'];
			$data['mapx'] = $_POST['mapx'];
			$data['link'] = $_POST['link'];			
			$data['noidung'] = $_POST['noidung'];	
			$data['ten_en'] = $_POST['ten_en'];	
			$data['type'] = $_POST['type'];	
			$data['ngaytao'] = time();
			$data['hienthi'] = isset($_POST['active']) ? 1 : 0;
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	}else{		
		foreach ($arr_lang as $key => $l) {
			$data['photo_'.$l] = upload_image("file_".$l, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name);
			$data['icon_'.$l] = upload_image("icon_".$l, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$icon_name);
			$data['ten_'.$l] = $_POST['ten_'.$l];	
			$data['mota_'.$l] = $_POST['mota_'.$l];	
		}
		$data['stt'] = $_POST['stt'];
		$data['mapx'] = $_POST['mapx'];	
		$data['noidung'] = $_POST['noidung'];		
		$data['link'] = $_POST['link'];	
		$data['type'] = $_POST['type'];	
		$data['ngaytao'] = time();								
		$data['hienthi'] = isset($_POST['active']) ? 1 : 0;																	

		$d->setTable('photo');

		if(!$d->insert($data)){transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);}else{} 
		redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);

	}

}
function delete_photo(){
	global $d,$arr_lang;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
		$row = $d->fetch_array();
		foreach ($arr_lang as $key => $l) {
			delete_file(_upload_hinhanh.$row['photo_'.$l]);
			delete_file(_upload_hinhanh.$row['icon_'.$l]);
		}
		//delete_file(_upload_hinhanh.$row['thumb_vi']);
		if($d->delete())
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
}

?>	