<?php  if(!defined('_source')) die("Error");
	$d->reset();
	$sql = "select id,ten_$lang,photo_vi,link from #_photo where type='".$type_bar."' and hienthi != 0 order by stt asc";
	$d->query($sql);
	$khachhang = $d->result_array();
?>