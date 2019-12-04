<?php 
	$d->reset();
 	$sql = "select id,ten_$lang,photo_$lang as photo from #_photo where type='hinhanh' order by stt,id asc";
 	$d->query($sql);
  	$bosuutap = $d->result_array();  
?>
<div id="hinhanh">
	<div class="margin_auto">
		<div class="title"><h2>đã giao hàng</h2><p><?=$row_setting['slogan_'.$lang]?></p></div>
		<?php if(count($bosuutap) > 0){ ?>
		<div class="slick_hinhanh">
			<?php foreach ($bosuutap as $key => $val) { ?>
			<div><a class="hinhanh hover_zoom" href="<?=_upload_hinhanh_l.$val['photo']?>" data-fancybox="hinhanh" style="background: url(<?=_upload_hinhanh_l.$val['photo']?>) no-repeat center;"><label><?=$val['ten_'.$lang]?></label></a></div>
			<?php } ?>
		</div>
		<?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
	</div>
</div>