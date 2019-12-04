<?php
	$d->reset();
	$sql = "select photo_vi as photo,ten_$lang as ten,link,noidung,mota_$lang as mota from #_photo where hienthi=1 and type = 'slider' order by stt asc";
	$d->query($sql);
	$result_slider = $d->result_array();
?>
<div id="slider">
	<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0 auto;">
		<div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
			<ul class="amazingslider-slides">
				<?php  for($i=0,$count_result_slider=count($result_slider);$i<$count_result_slider;$i++){ if(videoType($result_slider[$i]['link'])=='youtube') { ?>
				<li><img src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($result_slider[$i]['link'])?>/hqdefault.jpg" alt="<?=$result_slider[$i]['ten'] ?>" title="<?=$result_slider[$i]['ten'] ?>" />
						<video width="100%" preload="none" src="http://www.youtube.com/embed/<?=getYoutubeIdFromUrl($result_slider[$i]['link'])?>?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen ></video></li>
				<?php } else { ?>
				<li>
					<a href="<?=$result_slider[$i]['link'] ?>" target="_blank"  ><img onerror="this.src='http://placehold.it/1366x460'" src="thumb/1366x460/1/<?= _upload_hinhanh_l.$result_slider[$i]['photo'] ?>" /></a>
				</li>
				<?php } } ?>
			</ul>
		</div>
	</div>
</div>