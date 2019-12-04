<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "capnhat":
		get_banner();
		$template = "bannerqc/banner_add";
		break;
	case "save":
		save_banner();
		break;
	#====================================
	
	default:
		$template = "index";
}


function get_banner(){
	global $d, $item;

	$sql = "select * from #_photo where type='".$_GET['type']."'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d,$arr_lang;

	$sql = "select * from #_photo where type='".$_GET['type']."'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ 
		foreach ($arr_lang as $key => $l) {
			$file_name = images_name($_FILES['file_'.$l]['name']);
			if($photo = upload_image("file_".$l, 'swf|jpg|gif|png', _upload_hinhanh,$file_name)){
				$data['photo_'.$l] = $photo;
				//$data['thumb_'.$l] = create_thumb($data['photo_'.$l], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);
				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->setWhere('type',$_GET['type']);
				$d->select();
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo_'.$l]);
				//delete_file(_upload_hinhanh.$row['thumb_'.$l]);
			}
		}
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['link'] = $_POST['link'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('type',$_GET['type']);
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
	}else{ // them moi

		foreach ($arr_lang as $key => $l) {
			$file_name = images_name($_FILES['file_'.$l]['name']);

			if($photo = upload_image("file_".$l, 'swf|jpg|gif|png', _upload_hinhanh,$file_name)){
				$data['photo_'.$l] = $photo; 
				//$data['thumb_'.$l] = create_thumb($data['photo_'.$l], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);
			}
		}

		$data['ten_vi'] = $_POST['ten_vi'];
		$data['link'] = $_POST['link'];
		$data['type']=$_GET['type'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
	}
}

?>