<?php  if(!defined('_source')) die("Error");
	$title_bar = $row_setting['title'];
  	$keywords_bar = $row_setting['keywords'];
  	$description_bar = $row_setting['description'];
  	$row_detail['photo'] = $logo['photo_'.$lang];
  	$upload_file = _upload_hinhanh_l;

	$d->reset();
	$sql= "select id,tenkhongdau,ten_$lang,mota_$lang from #_product_list where type='product' and hienthi != 0 and menu != 0 order by stt,id desc ";
	$d->query($sql);
	$product_list_chinh = $d->result_array();

	$d->reset();
	$sql= "select id,tenkhongdau,ten_$lang,mota_$lang from #_product_list where type='product' and hienthi != 0 and noibat != 0 order by stt,id desc ";
	$d->query($sql);
	$product_list_phu = $d->result_array();
?>