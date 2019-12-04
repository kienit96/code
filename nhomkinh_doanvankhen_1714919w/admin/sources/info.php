<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){

	case "capnhat":

		get_info();

		$template = "info/item_add";

		break;

	case "save":

		save_info();

		break;		

	default:

		$template = "index";

}





function get_info(){

	global $d, $item,$ds_photo;

	$type = $_GET['type'];



	$sql = "select * from #_info where type='$type' limit 0,1";	

	$d->query($sql);

	$item = $d->fetch_array();

	$sql = "select * from #_baiviet_photo where type='".$_GET['type']."' order by stt,id desc ";

	$d->query($sql);

	$ds_photo = $d->result_array();	


}



function save_info(){

	global $d,$arr_lang ;

	$file_name=images_name($_FILES['file']['name']);



	$d->reset();

	$sql = "select * from #_info where type='".$_GET['type']."' ";	

	$d->query($sql);

	$row_item = $d->result_array();



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=info&act=capnhat&type=".$_GET['type']);

	$type = $_GET['type'];

	

	if(count($row_item )>0){



		

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){

			$data['photo'] = $photo;	

			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);		

			$d->setTable('info');

			$d->setWhere('type', $type);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_hinhanh.$row['photo']);	

				//delete_file(_upload_hinhanh.$row['thumb']);				

			}

		}

		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['name_'.$l] = $_POST['name_'.$l];
			$data['mota_'.$l] = magic_quote($_POST['mota_'.$l]);
			$data['noidung_'.$l] = magic_quote($_POST['noidung_'.$l]);	
		}
		$data['link'] = $_POST['link'];
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('info');
		$d->setWhere('type', $type);
		if($d->update($data)){
			if (isset($_FILES['files'])) {
	            for($i=0;$i<count($_FILES['files']['name']);$i++){
	            	if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];

						$file['size'] = $_FILES['files']['size'][$i];

					    $file_name = images_name($_FILES['files']['name'][$i]);

						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name);

						$data1['photo'] = $photo;

						//$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);	

						$data1['stt'] = (int)$_POST['stthinh'][$i];

						$data1['ten'] = $_POST['ten'][$i];

						$data1['type'] = $_GET['type'];	

						//$data1['id_baiviet'] = $id;

						$data1['hienthi'] = 1;

						$d->setTable('baiviet_photo');

						$d->insert($data1);



					}

				}

	        }

			redirect("index.php?com=info&act=capnhat&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);

		}else{

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=info&act=capnhat&type=".$_GET['type']);
		}
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;		
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);
		}		

		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['name_'.$l] = $_POST['name_'.$l];
			$data['mota_'.$l] = magic_quote($_POST['mota_'.$l]);
			$data['noidung_'.$l] = magic_quote($_POST['noidung_'.$l]);	
		}
		$data['link'] = $_POST['link'];
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['type'] = $_GET['type'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('info');
		if($d->insert($data))

		{		
			//$id = mysql_insert_id();

			if (isset($_FILES['files'])) {

	            for($i=0;$i<count($_FILES['files']['name']);$i++){

	            	if($_FILES['files']['name'][$i]!=''){



						$file['name'] = $_FILES['files']['name'][$i];

						$file['type'] = $_FILES['files']['type'][$i];

						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];

						$file['error'] = $_FILES['files']['error'][$i];

						$file['size'] = $_FILES['files']['size'][$i];

					    $file_name = images_name($_FILES['files']['name'][$i]);

						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name);

						$data1['photo'] = $photo;

						//$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);

						$data1['stt'] = (int)$_POST['stthinh'][$i];

						$data1['ten'] = $_POST['ten'][$i];

						$data1['type'] = $_GET['type'];	

						//$data1['id_baiviet'] = $id;

						$data1['hienthi'] = 1;

						$d->setTable('baiviet_photo');

						$d->insert($data1);



					}

				}

	        }	

			redirect("index.php?com=info&act=capnhat&type=".$_GET['type']);

		}

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=info&act=capnhat&type=".$_GET['type']);

	}

}



?>