<?php  if(!defined('_source')) die("Error");
	$id =  addslashes($_GET['id']);

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang,photo,noidung_$lang from #_baiviet where hienthi=1 and type = '".$type_bar."' order by id,stt desc limit 0,1";
	$d->query($sql);
	$phongthuy = $d->fetch_array();
?>