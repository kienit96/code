<?php  
	$d->reset();
	$sql= "select photo_$lang,ten_$lang,mota_$lang,icon_$lang,link,noidung from #_photo where hienthi=1 and type='slider' order by stt,id desc ";
	$d->query($sql);
	$slide_show = $d->result_array();
?>
<div class="margin_auto">
	<div class="box_slider">
		<div class="slider">
			<?php  for($i=0;$i<count($slide_show);$i++){ ?>
				<a class="img" href="<?=$slide_show[$i]['link']?>" target="_blank"><img data-lazy="thumb/900x384/1/<?=_upload_hinhanh_l.$slide_show[$i]['photo_'.$lang]?>" alt="<?=$slide_show[$i]['ten_'.$lang]?>"></a>
			<?php } ?>    
		</div>
	</div>
</div>