<?php  if(!defined('_source')) die("Error");
	

	$id_list=trim($_GET['loainha']);
	$huongnha=trim($_GET['huongnha']);
	$tinhthanh=trim($_GET['tinhthanh']);
	$quanhuyen=trim($_GET['quanhuyen']);
	$dientich=trim($_GET['dientich']);
	$gia=trim($_GET['gia']);
	$key = trim($_GET['keywords']);
	$danhmuc = $_GET['danhmuc'];
	$key_khong_dau=changeTitle($key);
	$per_page = $row_setting['page2']; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;

	$where = " #_product where hienthi=1 and type='product' ";
	$ten = trim($_GET['keywords']);
	
	if($key!='')
	{
		$where.=" and ten_$lang like '%$key%' ";

		$title_detail = "Tìm kiếm : ".$_GET['keywords'];
	}	
	if($danhmuc != ''){
		$where.=" and id_list =".$danhmuc;
		$d->reset();
	    $sql = "select id,tenkhongdau,ten_$lang from #_baiviet_list where hienthi=1 and id = ".$danhmuc." order by stt,id desc ";
	    $d->query($sql);
	    $dm_list = $d->fetch_array();

	    $title_detail .= " - danh mục : ".$dm_list['ten_'.$lang];
	}	
	$where .= " order by id desc";
	$sql = "select * from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);

	
?>