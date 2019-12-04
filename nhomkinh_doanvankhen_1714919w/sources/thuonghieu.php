<?php  if(!defined('_source')) die("Error");

	@$id =  addslashes($_GET['id']);
	$id = explode('_', $id);
	$tenkhongdau = $id[0];

	$d->reset();
	$sql_detail = "select id,ten_$lang from #_tieude where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$tenkhongdau."'";
	$d->query($sql_detail);
	$row_detail = $d->fetch_array();

	$per_page = 12; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	$where = " #_product where hienthi=1 and type='product' and id_".$type_bar." = '".$row_detail['id']."' order by stt asc";
	$sql = "select id,tenkhongdau,ten_$lang,photo,giaban,giasi,giacu from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);	

	$title_detail = $row_detail['ten_'.$lang];


?>