<?php  if(!defined('_source')) die("Error");
	$id =  $_GET['id'];
	$idl =  addslashes($_GET['idl']);
	$idc =  addslashes($_GET['idc']);
	$upload_file = _upload_baiviet_l;
	if($id!=''){
		$sql = "select * from #_baiviet where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$sqlUPDATE_ORDER = "UPDATE table_baiviet SET luotxem = luotxem + 1 WHERE  id = ".$row_detail['id']."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

		$d->reset();
		$sql_khac = "select photo,stt from #_baiviet_photo where id_baiviet ='".$row_detail['id']."' order by stt asc";
		$d->query($sql_khac);
		$hinhanh = $d->result_array();

		$list = "";
		if($row_detail['id_list'] != ""){
			$list = " and id_list = ".$row_detail['id_list'];
		}
		//$title_detail1 = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
		#các tin cu hon
		$d->reset();
		$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau,photo,mota_$lang,icon,luotxem from #_baiviet where hienthi=1 and id !='".$row_detail['id']."' $list and type='".$type_bar."' order by stt,id desc";
		$d->query($sql_khac);
		$tintuc = $d->result_array();
	} elseif($idl!=''){
		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and type='".$type_bar."' and id='".$idl."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();
		$per_page = 20; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;

		$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";
		$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,photo from $where $limit";
		$d->query($sql);
		$tintuc = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
		//$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
	}elseif($idc!=''){
		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau,id_list from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and id='".$idc."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$per_page = 20; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;

		$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."'  order by stt,ngaytao desc";
		$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,photo from $where $limit";
		$d->query($sql);
		$tintuc = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
		//$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
	} else {
		// cac tin tuc
		$per_page = 20; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;

		$where = " #_baiviet where hienthi=1 and type='".$type_bar."' order by stt asc";
		$sql = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,photo,icon,luotxem from $where $limit";
		$d->query($sql);
		$tintuc = $d->result_array();

		$d->reset();
		$sql = "select id,tenkhongdau,ten_$lang from #_baiviet_list where type='duan' and hienthi != 0 order by stt asc";
		$d->query($sql);
		$tintuc_list = $d->result_array();
		
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