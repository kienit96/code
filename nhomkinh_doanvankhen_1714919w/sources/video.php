<?php  if(!defined('_source')) die("Error");
	$id =  addslashes($_GET['id']);
	
	if($id!=''){
		$sql = "select ten_$lang,ngaytao,id,tenkhongdau,links,luotxem from #_video where hienthi=1 and type = '".$type_bar."' and tenkhongdau='".$id."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$title_detail = "Video";
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
		
		#các tin cu hon
		$d->reset();
		$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau,links,luotxem from #_video where hienthi=1 and type = '".$type_bar."' order by stt,ngaytao desc";
		$d->query($sql_khac);
		$video = $d->result_array();

	} else {
		$d->reset();
		$sql = "select ten_$lang,tenkhongdau,id,ngaytao,links,luotxem from #_video where hienthi=1 and type = '".$type_bar."' order by id desc";
		$d->query($sql);
		$video = $d->result_array();
	}

	$d->reset();
	$sql = "select title,keywords,description from #_info where type='".$type_bar."' ";
	$d->query($sql);
	$row_seo = $d->fetch_array();

	$title_bar .= $row_seo['title'];
	$keyword_bar .= $row_seo['keywords'];
	$description_bar .= $row_seo['description'];
?>