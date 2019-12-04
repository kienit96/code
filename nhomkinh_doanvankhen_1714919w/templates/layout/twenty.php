<?php  
	$d->reset();
	$sql= "select ten_vi,photo_vi from #_photo where hienthi=1 and type='slider' order by stt,id desc limit 0,2";
	$d->query($sql);
	$slider = $d->result_array();
?>
<?php if($template == 'index'){ ?>
<div class="loading"><img src="images/loading.gif" alt="loading"></div>
<div id="twenty">
	<?php foreach ($slider as $key => $value) { ?>
  		<img src="thumb/1366x675/1/<?=_upload_hinhanh_l.$value['photo_vi']?>" alt="<?=$value['ten_'.$lang]?>" />
  	<?php } ?>
</div>
<?php }else{ 
	if($com == 'gioi-thieu'){
		$type = 'bannergt';
	}else if($com == 'dich-vu' || $com == 'tim-kiem'){
		$type = 'bannerdv';
	}else if($com == 'du-an'){
		$type = 'bannerda';
	}else if($com == 'tin-tuc' || $com =='danh-muc'){
		$type = 'bannertt';
	}else if($com == 'lien-he'){
		$type = 'bannerlh';
	}

	$d->reset();
    $sql_banner_top= "select photo_$lang from #_photo where type='".$type."'";
    $d->query($sql_banner_top);
    $bannertt = $d->fetch_array();
?>
<img src="thumb/1366x675/1/<?=_upload_hinhanh_l.$bannertt['photo_'.$lang]?>" alt="<?=$com?>">
<?php } ?>