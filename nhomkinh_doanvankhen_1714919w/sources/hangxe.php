<?php  if(!defined('_source')) die("Error");
@$idc =  addslashes($_GET['idc']);
@$idl =  addslashes($_GET['idl']);
@$idi =  addslashes($_GET['idi']);
@$ids =  addslashes($_GET['ids']);
@$id =  addslashes($_GET['id']);

@$tamp = 0;
$upload_file = _upload_product_l;
#các sản phẩm khác======================
$select_pro = " id,thumb,ten_$lang,giaban,tenkhongdau,mota_$lang,giacu,id_thuonghieu,photo,tags,masp,mota_$lang,soluong,sp_banchay,thongso_$lang,ngaytao,dientich,lienhe,video";
if($idl!=''){
	$tamp = 1;

	$d->reset();
	$sql = "select * from #_product_list where hienthi=1 and type='".$type_bar."'  and id='".$idl."'";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$per_page = $row_setting['page2'];
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 and type='product' and FIND_IN_SET(".$row_detail['id'].",xec1) order by stt,ngaytao desc";
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
	
	$per_page = $row_setting['page2']; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 and type='product' and FIND_IN_SET(".$row_detail['id'].",xec2)  order by stt,ngaytao desc";
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

	$where = " #_product where hienthi=1 $where_loai and type='product' ";
	$where .= $where_tk;
	$where .= " order by stt,ngaytao desc ";
	$sql = "select $select_pro from $where  $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}
?>