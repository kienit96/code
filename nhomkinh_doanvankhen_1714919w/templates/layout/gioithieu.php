<?php 
	$d->reset();
 	$sql = "select id,tenkhongdau,ten_$lang,name_$lang,mota_$lang,photo from #_info where type='gioithieu'";
 	$d->query($sql);
  	$gioithieu = $d->fetch_array(); 

  	$d->reset();
 	$sql = "select id,photo,ten from #_baiviet_photo where type='gioithieu' order by stt,id asc";
 	$d->query($sql);
  	$gioithieu_photo = $d->result_array(); 
?>
<div id="gioithieu">
	<div class="margin_auto">
		<div class="gioithieu">
			<a class="img_gt" href="gioi-thieu"><img src="thumb/490x420/1/<?=_upload_hinhanh_l.$gioithieu['photo']?>"></a>
			<div class="noidung_gt">
				<div class="title_gt"><p><?=$gioithieu['name_'.$lang]?></p><h2><?=$gioithieu['ten_'.$lang]?></h2></div>
				<div class="mota_gt"><?=$gioithieu['mota_'.$lang]?></div>
				<?php if(count($gioithieu_photo) > 0){ ?>
				<div class="slick_img">
					<?php foreach ($gioithieu_photo as $key => $value) { ?>
					<div class="img">
						<img src="thumb/88x88/2/<?=_upload_baiviet_l.$value['photo']?>" alt="<?=$value['ten']?>">
						<label><?=$value['ten']?></label>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			
		</div>
	</div>
</div>