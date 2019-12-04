<?php  if(!defined('_source')) die("Error");
	$d->reset();
	$sql = "select id,ten_$lang,mota_$lang from #_baiviet where type='".$type_bar."' ";
	$d->query($sql);
	$hethong = $d->result_array();
?>