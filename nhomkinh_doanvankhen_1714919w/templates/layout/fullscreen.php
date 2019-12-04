<?php  
	$d->reset();
	$sql= "select link,photo_vi,ten_$lang from #_photo where hienthi=1 and type='slider' order by stt,id desc ";
	$d->query($sql);
	$slide_show = $d->result_array();
?>
<div class="slider">
	<div class="fluid_container">
		<div class="" id="camera_wrap_4">
		<?php if(count($slide_show) == 1){ ?>
		<div data-link="<?=$slide_show[0]['link']?>" data-target="_blank" data-thumb="<?=_upload_hinhanh_l.$slide_show[0]['photo_vi']?>" data-src="<?=_upload_hinhanh_l.$slide_show[0]['photo_vi']?>"></div>
		<div data-link="<?=$slide_show[0]['link']?>" data-target="_blank" data-thumb="<?=_upload_hinhanh_l.$slide_show[0]['photo_vi']?>" data-src="<?=_upload_hinhanh_l.$slide_show[0]['photo_vi']?>"></div>
		<?php }else{ foreach ($slide_show as $key => $value) { ?>
			<div data-link="<?=$value['link']?>" data-target="_blank" data-thumb="<?=_upload_hinhanh_l.$value['photo_vi']?>" data-src="<?=_upload_hinhanh_l.$value['photo_vi']?>"></div>
		<?php }  } ?>
		</div><!-- #camera_wrap_3 -->
	</div><!-- .fluid_container -->
</div>