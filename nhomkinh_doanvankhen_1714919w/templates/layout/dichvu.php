<?php
  	$d->reset();
  	$sql= "select id,tenkhongdau,ten_$lang,photo,mota_$lang from #_baiviet where hienthi=1 and type='dichvu' and noibat != 0 order by id,stt desc";
  	$d->query($sql);
  	$dichvu_nb = $d->result_array();
?>
<div id="dichvu">
	<div class="margin_auto">
		<div class="title"><h2>Dịch vụ sửa chữa</h2></div>
		<?php if(count($dichvu_nb) > 0){ ?>
		<div class="slick_dichvu">
			<?php foreach ($dichvu_nb as $key => $rl) {?>
			<div class="dichvu">
				<a class="img hover_zoom" href="<?=$rl['tenkhongdau']?>"><img onerror="this.src='http://placehold.it/380x280'" src="thumb/380x280/1/<?=_upload_baiviet_l.$rl['photo']?>" alt="<?=$rl['ten_'.$lang]?>"></a>
				<div class="noidung">
					<h3><a href="<?=$rl['tenkhongdau']?>"><?=$rl['ten_'.$lang]?></a></h3>
					<p><?=$rl['mota_'.$lang]?></p>
					<a href="<?=$rl['tenkhongdau']?>">Xem thêm</a>
				</div>
			</div>
			<?php } ?>
		</div>
	<?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
	</div>
</div>