<?php  if(!defined('_source')) die("Error");
	$d->reset();
	$sql = "select noidung_$lang,ten_$lang,stt from #_baiviet where type='".$type_bar."' order by stt asc";
	$d->query($sql);
	$row_detail = $d->result_array();


	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];
?>