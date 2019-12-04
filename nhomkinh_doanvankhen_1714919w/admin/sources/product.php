<?php	if(!defined('_source')) die("Error");
switch($act){
	case "man_list":
	get_lists();
	$template = "product/list/items";
	break;
	case "add_list":		
	$template = "product/list/item_add";
	break;
	case "edit_list":		
	get_list();
	$template = "product/list/item_add";
	break;
	case "save_list":
	save_list();
	break;
	case "delete_list":
	delete_list();
	break;	
	#===================================================
	case "man_cat":
	get_cats();
	$template = "product/cat/items";
	break;
	case "add_cat":		
	$template = "product/cat/item_add";
	break;
	case "edit_cat":		
	get_cat();
	$template = "product/cat/item_add";
	break;
	case "save_cat":
	save_cat();
	break;
	case "delete_cat":
	delete_cat();
	break;	
	#===================================================
	case "man_item":
	get_items();
	$template = "product/item/items";
	break;
	case "add_item":		
	$template = "product/item/item_add";
	break;
	case "edit_item":		
	get_item();
	$template = "product/item/item_add";
	break;
	case "save_item":
	save_item();
	break;
	case "delete_item":
	delete_item();
	break;
	#===================================================
	case "man_sub":
	get_subs();
	$template = "product/sub/items";
	break;
	case "add_sub":		
	$template = "product/sub/item_add";
	break;
	case "edit_sub":		
	get_sub();
	$template = "product/sub/item_add";
	break;
	case "save_sub":
	save_sub();
	break;
	case "delete_sub":
	delete_sub();
	break;	
	#===================================================
	case "man":
	get_mans();
	$template = "product/man/items";
	break;
	case "add":		
	$template = "product/man/item_add";
	break;
	case "edit":		
	get_man();
	$template = "product/man/item_add";
	break;
	case "save":
	save_man();
	break;

	case "delete":
	delete_man();
	break;	
	#============================================================
	case "duyetbl":
	get_duyetbl();
	$template = "product/duyetbl";
	break;
	case "delete_binhluan":
	delete_binhluan();
	$template = "product/duyetbl";
	break;
	default:
	$template = "index";
}
#====================================
function get_mans(){
	global $d, $items, $paging,$page;

	#----------------------------------------------------------------------------------------
	if($_REQUEST['banchay']!='')
	{
		$id_up = $_REQUEST['banchay'];
		$sql_sp = "SELECT id,banchay FROM table_product where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['banchay'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET banchay =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET banchay =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_product where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['noibat'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------

	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------


	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['id_list']!='')
	{
		$where.=" and id_list = ".$_GET['id_list'];
		$link_add .= "&id_list=".$_GET['id_list'];
	}
	if($_REQUEST['id_cat']!='')
	{
		$where.=" and id_cat = ".$_GET['id_cat'];
		$link_add .= "&id_cat=".$_GET['id_cat'];
	}
	if($_REQUEST['id_item']!='')
	{
		$where.=" and id_item = ".$_GET['id_item'];
		$link_add .= "&id_item=".$_GET['id_item'];
	}
	if($_REQUEST['id_sub']!='')
	{
		$where.=" and id_sub = ".$_GET['id_sub'];
		$link_add .= "&id_sub=".$_GET['id_sub'];
	}
	if($_SESSION['login']['role']==1){

	}
	if($_REQUEST['soluong']!='')
	{	
		if($_GET['soluong']==1){
			$where.=" and soluong=0 ";
		} else{
			$where.=" and soluong > 0 and soluong < ".$_GET['soluong'];
		}
		$link_add .= "&soluong=".$_GET['soluong'];
	}
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by stt,id desc";
	$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,noibat,id_item,id_sub,sp_banchay,soluong,sp_khuyenmai,banchay from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);		

}
function get_man(){
	global $d, $item,$ds_tags,$ds_photo;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();	
	$sql = "select * from #_product_photo where id_product='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();	
}
function save_man(){
	global $d,$arr_lang;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//dongdauanh($photo,_upload_product);	
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);	
				//delete_file(_upload_product.$row['thumb']);				
			}
		}
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = magic_quote($_POST['ten_'.$l]);
			$data['name_'.$l] = magic_quote($_POST['name_'.$l]);
			$data['mota_'.$l] = magic_quote($_POST['mota_'.$l]);
			$data['thongso_'.$l] = magic_quote($_POST['thongso_'.$l]);
			$data['thongtin_'.$l] = magic_quote($_POST['thongtin_'.$l]);
			$data['noidung_'.$l] = magic_quote($_POST['noidung_'.$l]);
			$data['baohanh_'.$l] = magic_quote($_POST['baohanh_'.$l]);
			$data['khuyenmai_'.$l] = magic_quote($_POST['khuyenmai_'.$l]);
		}
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_sub'] = (int)$_POST['id_sub'];
		$data['dientich'] = magic_quote($_POST['dientich']);
		$data['id_thuonghieu'] = $_POST['id_thuonghieu'];
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['mausac_vi'] = $_POST['mausac_vi'];
		$data['mausac_en'] = $_POST['mausac_en'];
		$data['video'] = $_POST['video'];
		$data['map'] = $_POST['map'];
		$data['lienhe'] = $_POST['lienhe'];
		$data['huongnha'] = $_POST['huongnha'];
		$data['tinhthanh'] = $_POST['tinhthanh'];
		$data['quanhuyen'] = $_POST['quanhuyen'];
		$data['phuongxa'] = $_POST['phuongxa'];
		$data['duong'] = $_POST['duong'];
		$data['mucdich'] = $_POST['mucdich'];
		$data['sophongngu'] = $_POST['sophongngu'];
		$data['duan'] = $_POST['duan'];
		$data['giaban'] = str_replace(',','',$_POST['giaban']);
		$data['giacu'] = str_replace(',','',$_POST['giacu']);
		$data['soluong'] = str_replace(',','',$_POST['soluong']);
		$data['giasi'] = str_replace(',','',$_POST['giasi']);
		$data['masp'] = $_POST['masp'];
		if($_POST['tags']){ $data['tags'] = implode(',',$_POST['tags']); }
		if($_POST['sizes']){ $data['size'] = implode(',',$_POST['sizes']); }
		if($_POST['colors']){ $data['color'] = implode(',',$_POST['colors']); }
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product');
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
						$data1['type'] = $_GET['type'];	
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//dongdauanh($data['photo'],_upload_product);		
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
		}		
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = magic_quote($_POST['ten_'.$l]);
			$data['name_'.$l] = magic_quote($_POST['name_'.$l]);
			$data['mota_'.$l] = magic_quote($_POST['mota_'.$l]);
			$data['thongso_'.$l] = magic_quote($_POST['thongso_'.$l]);
			$data['thongtin_'.$l] = magic_quote($_POST['thongtin_'.$l]);
			$data['noidung_'.$l] = magic_quote($_POST['noidung_'.$l]);
			$data['baohanh_'.$l] = magic_quote($_POST['baohanh_'.$l]);
			$data['khuyenmai_'.$l] = magic_quote($_POST['khuyenmai_'.$l]);
		}
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_sub'] = (int)$_POST['id_sub'];
		$data['id_thuonghieu'] = $_POST['id_thuonghieu'];
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['video'] = $_POST['video'];
		$data['map'] = $_POST['map'];
		$data['lienhe'] = $_POST['lienhe'];
		$data['dientich'] = magic_quote($_POST['dientich']);
		$data['huongnha'] = $_POST['huongnha'];
		$data['tinhthanh'] = $_POST['tinhthanh'];
		$data['quanhuyen'] = $_POST['quanhuyen'];
		$data['phuongxa'] = $_POST['phuongxa'];
		$data['phaply'] = $_POST['phaply'];
		$data['mausac_vi'] = $_POST['mausac_vi'];
		$data['mausac_en'] = $_POST['mausac_en'];
		$data['giasi'] = str_replace(',','',$_POST['giasi']);	
		$data['giacu'] = str_replace(',','',$_POST['giacu']);
		$data['soluong'] = str_replace(',','',$_POST['soluong']);
		$data['giaban'] = str_replace(',','',$_POST['giaban']);
		$data['masp'] = $_POST['masp'];
		if($_POST['tags']){ $data['tags'] = implode(',',$_POST['tags']); }
		if($_POST['sizes']){ $data['size'] = implode(',',$_POST['sizes']); }
		if($_POST['colors']){ $data['color'] = implode(',',$_POST['colors']); }
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('product');
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
						//dongdauanh($data1['photo'],_upload_product);
						//$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_man(){
	global $d;

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
		// Màu sắc
		$d->reset();
		$sql = "select id,photo from #_tieude where id_parent='".$id."'";
		$d->query($sql);
		$photo_lq = $d->result_array();
		if(count($photo_lq)>0){
			for($i=0;$i<count($photo_lq);$i++){
				$d->reset();
				$sql = "select id,photo from #_product_photo where id_product='".$photo_lq[$i]['id']."' and type = 'color'";
				$d->query($sql);
				$photo_lq1 = $d->result_array();
				foreach ($photo_lq1 as $key => $value) {
					delete_file(_upload_product.$value['photo']);
				}
				$sql = "delete from #_product_photo where id_product='".$photo_lq[$i]['id']."'";
				$d->query($sql);
				
				delete_file(_upload_tieude.$photo_lq[$i]['photo']);
			}
		}
		$sql = "delete from #_tieude where id_parent='".$id."'";
		$d->query($sql);


		$d->reset();
		$sql = "select id,photo,thumb from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
			}
			$sql = "delete from #_product where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);	
			$d->reset();
			$sql = "select id,photo,thumb from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			$photo_lq = $d->result_array();
			if(count($photo_lq)>0){
				for($j=0;$j<count($photo_lq);$j++){
					delete_file(_upload_product.$photo_lq[$j]['photo']);
				}
			}
			$sql = "delete from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			
			// Màu sắc
			$d->reset();
			$sql = "select id,photo from #_tieude where id_parent='".$id."'";
			$d->query($sql);
			$photo_lq = $d->result_array();
			if(count($photo_lq)>0){
				for($i=0;$i<count($photo_lq);$i++){
					$d->reset();
					$sql = "select id,photo from #_product_photo where id_product='".$photo_lq[$i]['id']."' and type = 'color'";
					$d->query($sql);
					$photo_lq1 = $d->result_array();
					foreach ($photo_lq1 as $key => $value) {
						delete_file(_upload_product.$value['photo']);
					}
					$sql = "delete from #_product_photo where id_product='".$photo_lq[$i]['id']."'";
					$d->query($sql);
					
					delete_file(_upload_tieude.$photo_lq[$i]['photo']);
				}
			}
			$sql = "delete from #_tieude where id_parent='".$id."'";
			$d->query($sql);

			$d->reset();
			$sql = "select id,photo,thumb from #_product where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					//delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================List===================
function get_lists(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_list where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;


	$where = " #_product_list ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by stt,id desc";
	$sql = "select ten_vi,id,stt,hienthi,noibat,menu,dmleft from $where $limit";
	$d->query($sql);
	$items = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}
function get_list(){
	global $d, $item, $ds_photo;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

	$sql = "select * from #_product_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
	$sql = "select * from #_product_photo where id_product='".$id."' and type='list' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();
}
function save_list(){
	global $d,$arr_lang;
	$file_name=images_name($_FILES['file']['name']);
	$file_quangcao=images_name($_FILES['file']['quangcao']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);
			}
		}
		if($quangcao = upload_image("quangcao", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_quangcao)){
			$data['quangcao'] = $quangcao;	
			//$data['quangcao_thumb'] = create_thumb($data['quangcao'], 305, 533, _upload_product,$file_quangcao,1);		
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['quangcao']);	
				//delete_file(_upload_product.$row['quangcao_thumb']);				
			}
		}
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['mota_'.$l] = $_POST['mota_'.$l];
		}
		$data['color'] = $_POST['color'];
		$data['links'] = $_POST['links'];
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
		$data['mapx'] = magic_quote($_POST['mapx']);
		$d->setTable('product_list');
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
						$data1['type'] = 'list';	
						$data1['mota'] = $_POST['link'][$i];
						$data1['ten_vi'] = $_POST['ten_v'][$i];
						$data1['ten_en'] = $_POST['ten_e'][$i];
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", _img_type, _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
		}
		if($quangcao = upload_image("quangcao", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_quangcao)){
			$data['quangcao'] = $quangcao;	
			//$data['quangcao_thumb'] = create_thumb($data['quangcao'], 305, 533, _upload_product,$file_quangcao,1);		
		}
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['mota_'.$l] = $_POST['mota_'.$l];
		}
		$data['links'] = $_POST['links'];
		$data['color'] = $_POST['color'];
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
		$data['ngaytao'] = time();
		$data['type'] = $_GET['type'];
		$data['mapx'] = magic_quote($_POST['mapx']);
		$d->setTable('product_list');
		if($d->insert($data)){
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
						//dongdauanh($data1['photo'],_upload_product);
						//$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = 'list';	
						$data1['mota'] = $_POST['link'][$i];
						$data1['ten_vi'] = $_POST['ten_v'][$i];
						$data1['ten_en'] = $_POST['ten_e'][$i];
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_list(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb,quangcao,quangcao_thumb from #_product_list where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['quangcao']);
			}
			$sql = "delete from #_product_list where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,quangcao from #_product_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['quangcao']);
				}
				$sql = "delete from #_product_list where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================cat===================
function get_cats(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_cat where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;


	$where = " #_product_cat ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['id_list']!='')
	{
		$where.=" and id_list=".$_REQUEST['id_list'];
		$link_add .= "&id_list=".$_GET['id_list'];
	}
	$where .=" order by id,stt desc";
	$sql = "select ten_vi,id,stt,hienthi,id_list,noibat from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}
function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}
function save_cat(){
	global $d,$arr_lang;
	$file_name=images_name($_FILES['file']['name']);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
			$d->setTable('product_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);
				//delete_file(_upload_product.$row['thumb']);
			}
		}
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['mota_'.$l] = $_POST['mota_'.$l];
		}
		$data['id_list'] = $_POST['id_list'];
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['mapx'] = magic_quote($_POST['mapx']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();

		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
		}
		$data['id_list'] = $_POST['id_list'];
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['mota_'.$l] = $_POST['mota_'.$l];
		}
		$data['mapx'] = magic_quote($_POST['mapx']);
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();

		$d->setTable('product_cat');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_cat(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_cat where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				//delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product_cat where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					//delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_cat where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================Item===================
function get_items(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_item where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product_item ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['id_list']!='')
	{
		$where.=" and id_list=".$_REQUEST['id_list'];
		$link_add .= "&id_list=".$_GET['id_list'];
	}
	if($_REQUEST['id_cat']!='')
	{
		$where.=" and id_cat=".$_REQUEST['id_cat'];
		$link_add .= "&id_cat=".$_GET['id_cat'];
	}
	$where .=" order by id,stt desc";
	$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=".$_GET['type']);

	$sql = "select * from #_product_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}
function save_item(){
	global $d,$arr_lang;
	$file_name=images_name($_FILES['file']['name']);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
			$d->setTable('product_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);
				//delete_file(_upload_product.$row['thumb']);
			}
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
		}
		$data['ten_en'] = $_POST['ten_en'];
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

		$d->setTable('product_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
		}
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();

		$d->setTable('product_item');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_item(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_item where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				//delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product_item where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_item where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					//delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_item where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================Sub===================
function get_subs(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_sub where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product_sub ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['id_list']!='')
	{
		$where.=" and id_list=".$_REQUEST['id_list'];
		$link_add .= "&id_list=".$_GET['id_list'];
	}
	if($_REQUEST['id_cat']!='')
	{
		$where.=" and id_cat=".$_REQUEST['id_cat'];
		$link_add .= "&id_cat=".$_GET['id_cat'];
	}
	if($_REQUEST['id_item']!='')
	{
		$where.=" and id_item=".$_REQUEST['id_item'];
		$link_add .= "&id_item=".$_GET['id_item'];
	}
	$where .=" order by id,stt desc";
	$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,id_item from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}
function get_sub(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

	$sql = "select * from #_product_sub where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}
function save_sub(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu",$_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
			$data['photo'] = $photo;	
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			$d->setTable('product_sub');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);	
				//delete_file(_upload_product.$row['thumb']);				
			}
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
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

		$d->setTable('product_sub');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		if($_POST['tenkhongdau']=='') {
			$data['tenkhongdau'] = changeTitle($data['ten_vi']);
		}else{
			$data['tenkhongdau']=changeTitle($_POST['tenkhongdau']);
		}
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();

		$d->setTable('product_sub');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi",$_SESSION['links_re']);
	}
}
function delete_sub(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_sub where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				//delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product_sub where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_sub where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					//delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_sub where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#====================================
?>