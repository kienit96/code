<?php  if(!defined('_source')) die("Error");
@$idc =  addslashes($_GET['idc']);
@$idl =  addslashes($_GET['idl']);
@$idi =  addslashes($_GET['idi']);
@$ids =  addslashes($_GET['ids']);
@$id =  addslashes($_GET['id']);

@$tamp = 0;
$upload_file = _upload_product_l;
$noidung_detail = "";
#các sản phẩm khác======================
$select_pro = " id,thumb,ten_$lang,giaban,tenkhongdau,mota_$lang,giacu,id_thuonghieu,photo,tags,masp,mota_$lang,soluong,sp_banchay,thongso_$lang,ngaytao,dientich,lienhe,video,noibat,sp_banchay";
//$idl = $_GET['com'];
if($id!=''){

	$d->reset();
	$sql_detail = "select * from #_product where hienthi=1 and type='".$type_bar."' and id='".$id."'";
	$d->query($sql_detail);
	$row_detail = $d->fetch_array();
	
	$idl = $row_detail['id_list'];

	$arr_size = explode(",", $row_detail['size']);

	$d->reset();
    $sql= "select id,ten_$lang from #_tieude where type='color' and id_parent = '".$row_detail['id']."' order by id,stt desc";
    $d->query($sql);
    $arr_color = $d->result_array();
	
	$sqlUPDATE_ORDER = "UPDATE table_product SET luotxem = luotxem + 1 WHERE  id = ".$row_detail['id']."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
	/*$d->reset();
	$sql = "select * from #_tinh where id='".$row_detail['tinhthanh']."'";
	$d->query($sql);
	$tinhthanh = $d->fetch_array();
	
	$d->reset();
	$sql = "select * from #_quan where id='".$row_detail['quanhuyen']."'";
	$d->query($sql);
	$quanhuyen = $d->fetch_array();
	
	//daxem($row_detail['id']);*/
	
	$d->reset();
	$sql = "select * from #_product_photo where hienthi=1 and id_product='".$row_detail['id']."' and type='".$type_bar."' order by stt,id desc";
	$d->query($sql);
	$hinhanh = $d->result_array();

	$list = "";
	if($row_detail['id_list']!=""){
		$list = " and id_list = ".$row_detail['id_list'];
	}

	$d->reset();
	$sql = "select $select_pro from #_product where hienthi=1 ".$where." and type='".$type_bar."' ".$list." and id!='".$row_detail['id']."' order by stt,ngaytao desc";
	$d->query($sql);
	$product = $d->result_array();	
	
	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];

} elseif($idl!=''){
	$tamp = 1;

	$d->reset();
	$sql = "select * from #_product_list where hienthi=1 and type='".$type_bar."' and id='".$idl."'";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$noidung_detail = $row_detail['mota_'.$lang];

	$per_page = $row_setting['page2']; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";
	$sql = "select $select_pro from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
	
	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];
} elseif($idc!=''){
	$tamp = 1;

	$d->reset();
	$sql = "select * from #_product_cat where hienthi=1 and type='".$type_bar."' and id='".$idc."'";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$idl = $row_detail['id_list'];

	$noidung_detail = $row_detail['mota_'.$lang];
	
	$per_page = $row_setting['page2']; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."'  order by stt,ngaytao desc";
	$sql = "select $select_pro from $where $limit";
	$d->query($sql);
	$product = $d->result_array();
	
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);

	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];
} elseif($idi!=''){
	$d->reset();
	$sql = "select * from #_product_item where hienthi=1 and type='".$type_bar."' and id='".$idi."'";
	$d->query($sql);
	$row_detail = $d->fetch_array();
	
	$idl = $row_detail['id_list'];
	
	$per_page = $row_setting['page2']; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 and type='".$type_bar."' and id_item='".$row_detail['id']."'  order by stt,ngaytao desc";
	$sql = "select $select_pro from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);

	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];
} else {
	$per_page = $row_setting['page2'];
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 $where_loai and type='".$type_bar."' ";
	$where .= $where_tk;
	$where .= " order by stt,ngaytao desc ";
	$sql = "select $select_pro from $where  $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);

	$d->reset();
	$sql = "select title,keywords,description,photo from #_info where type='".$type_bar."' ";
	$d->query($sql);
	$row_seo = $d->fetch_array();

	$upload_file = _upload_hinhanh_l;
	$row_detail['photo'] = $row_seo['photo'];
	$title_bar .= $row_seo['title'];
	$keyword_bar .= $row_seo['keywords'];
	$description_bar .= $row_seo['description'];
}
?>