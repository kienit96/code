<?php  if(!defined('_source')) die("Error");
	$d->reset();
	$sql = "select id,ten,photo from #_baiviet_photo where type='".$type_bar."' ";
	$d->query($sql);
	$row_detail = $d->result_array();
?>