<?php	if(!defined('_source')) die("Error");
switch($act){

	case "man":
		get_items();
		$template = "tieude/items";
		break;
	case "add":		
		$template = "tieude/item_add";
		break;
	case "edit":		
		get_item();
		$template = "tieude/item_add";
		break;
	case "save":
		save_item();
		break;
		
	case "delete":
		delete_item();
		break;	

	default:
		$template = "index";
}

#====================================

function get_items(){
	global $d, $items, $paging,$page;
	
	
	if($_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_tieude where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['noibat'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_tieude SET noibat =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_tieude SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_tieude where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_tieude SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_tieude SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	
	
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_tieude ";
	$where .= " where type='".$_GET['type']."' ";

	
	
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['id_parent']!='')
	{
		$where .= "and id_parent = '".$_REQUEST['id_parent']."' ";
		$link_add .= "&id_parent=".$_REQUEST['id_parent'];
	}
	$where .=" order by stt,id desc";

	$sql = "select ten_vi,id,stt,hienthi,giatri from $where $limit";
	$d->query($sql);
	$items = $d->result_array();

	$url = "index.php?com=tieude&act=man&type=".$_GET['type']."".$link_add;
	$paging = pagination($where,$per_page,$page,$url);		
	
}

function get_item(){
	global $d, $item,$ds_tags,$ds_photo;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	$link_add = "";
	if($_REQUEST['id_parent']!='')
	{
		$link_add .= "&id_parent=".$_REQUEST['id_parent'];
	}

	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tieude&act=man&type=".$_GET['type'].$link_add);	
	$sql = "select * from #_tieude where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tieude&act=man&type=".$_GET['type'].$link_add);
	$item = $d->fetch_array();	

	$sql = "select * from #_product_photo where id_product='".$item['id']."' and type='".$_GET['type']."' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();	

}

function save_item(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);

	$link_add = "";
	if($_REQUEST['id_parent']!='')
	{
		$link_add .= "&id_parent=".$_REQUEST['id_parent'];
	}

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tieude&act=man&type=".$_GET['type'].$link_add);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_tieude,$file_name)){
			$data['photo'] = $photo;	
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_tieude,$file_name,_style_thumb);		
			$d->setTable('tieude');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tieude.$row['photo']);	
				//delete_file(_upload_tieude.$row['thumb']);				
			}
		}
		$data['color'] = $_POST['color'];
		$data['id_parent'] = $_GET['id_parent'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_en'] = $_POST['ten_en'];
		$data['giatri'] = $_POST['giatri'];
		$data['mota'] = magic_quote($_POST['mota']);
		$data['email'] = magic_quote($_POST['email']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('tieude');
		$d->setWhere('id', $id);
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
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
						//dongdauanh($data1['photo'],_upload_product);
						//$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['mota'] = (int)$_POST['mota'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect("index.php?com=tieude&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type'].$link_add);
		}
		else{
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tieude&act=man&type=".$_GET['type'].$link_add);
		}
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_tieude,$file_name)){
			$data['photo'] = $photo;		
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_tieude,$file_name,_style_thumb);			
		}		
		$data['color'] = $_POST['color'];
		$data['giatri'] = $_POST['giatri'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['mota'] = magic_quote($_POST['mota']);
		$data['email'] = magic_quote($_POST['email']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['type'] = $_GET['type'];
		$data['id_parent'] = $_GET['id_parent'];
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('tieude');
		if($d->insert($data))
		{		
			$id = mysql_insert_id();	
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['mota'] = (int)$_POST['mota'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect("index.php?com=tieude&act=man&type=".$_GET['type'].$link_add);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tieude&act=man&type=".$_GET['type'].$link_add);
	}
}

function delete_item(){
	global $d;
	
	$link_add = "";
	if($_REQUEST['id_parent']!='')
	{
		$link_add .= "&id_parent=".$_REQUEST['id_parent'];
	}

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);

		$d->reset();
		$sql = "select id,photo,thumb from #_product_photo where id_product='".$id."'";
		$d->query($sql);
		$photo_lq = $d->result_array();
		if(count($photo_lq)>0){
			for($i=0;$i<count($photo_lq);$i++){
				delete_file(_upload_product.$photo_lq[$i]['photo']);
			}
		}
		$sql = "delete from #_product_photo where id_product='".$id."'";
		$d->query($sql);

		$d->reset();
		$sql = "select id,photo,thumb from #_tieude where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tieude.$row['photo']);
			}
			$sql = "delete from #_tieude where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=tieude&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type'].$link_add);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tieude&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type'].$link_add);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_tieude where id='".$id."'";
			$d->query($sql);

			$d->reset();
			$sql = "select id,photo from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			$photo_lq = $d->result_array();
			if(count($photo_lq)>0){
				for($j=0;$j<count($photo_lq);$j++){
					delete_file(_upload_product.$photo_lq[$j]['photo']);
				}
			}
			$sql = "delete from #_product_photo where id_product='".$id."'";
			$d->query($sql);

			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_tieude.$row['photo']);
					//delete_file(_upload_tieude.$row['thumb']);
				}
				$sql = "delete from #_tieude where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect("index.php?com=tieude&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type'].$link_add);
	} else {
		transfer("Không nhận được dữ liệu", "index.php?com=tieude&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type'].$link_add);
	}


}


?>