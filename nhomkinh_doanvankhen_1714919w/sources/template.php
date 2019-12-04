<?php
    $d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	$arr_hotline = explode("-", $row_setting['hotline']);

	$d->reset();
 	$sql= "select photo_vi from #_photo where type='logo'";
	$d->query($sql);
	$logo = $d->fetch_array();

	$d->reset();
 	$sql= "select photo_vi from #_photo where type='banner'";
	$d->query($sql);
	$banner = $d->fetch_array();

	$d->reset();
    $sql = "select photo_$lang,thumb_$lang from #_photo where type='favicon'";
    $d->query($sql);
    $favicon = $d->fetch_array();
?>