<?php
	$d->reset();
	$sql= "select id,photo,tenkhongdau,ten_$lang,mota_$lang,name_$lang from #_baiviet where hienthi=1 and type='camnhan' order by stt,id desc";
	$d->query($sql);
	$camnhan = $d->result_array();
?>
<div id="camnhan">
	<h4 class="title_b">ý kiến khách hàng</h4>
	<?php if(count($camnhan) > 0){ ?>
	<div class="slick_camnhan">
		<?php foreach ($camnhan as $key => $cn) { ?>
		<div class="camnhan">
			<img onerror="this.src='http://placehold.it/150x150'" src="thumb/150x150/1/<?=_upload_baiviet_l.$cn['photo']?>" alt="<?=$cn['ten_'.$lang]?>">
			<div class="mota"><?=$cn['mota_'.$lang]?></div>
		</div>
		<?php } ?>
	</div>
	<?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
</div>