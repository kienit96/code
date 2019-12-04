<?php  if(!defined('_source')) die("Error");
	$d->reset();
	$sql = "select noidung_$lang,title,keywords,description from #_info where type='".$type_bar."' ";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$upload_file = _upload_hinhanh_l;
	$row_detail['photo'] = $row_detail['photo'];
	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];
?>