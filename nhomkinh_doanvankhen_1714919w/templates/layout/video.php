<?php
	$d->reset();
    $sql_video = "select ten_$lang,tenkhongdau,links from #_video where type='video' and hienthi=1  order by stt,id desc";
	$d->query($sql_video);
	$video = $d->result_array();
?>
<div id="video">
	<div class="margin_auto">
		<div class="title"><h4>The Videos</h4><p><?=$row_setting['slogan_'.$lang]?></p></div>
		<?php if(count($video) > 0){ ?>
		<div class="khung_flex">
	        <div class="iframe">
	            <iframe width="100%" height="460" src="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[0]['links']);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	        </div>
	        <div class="slick_video">
	            <?php foreach ($video as $key => $vi) { ?>
	                <div class="vi" data-id="<?=getYoutubeIdFromUrl($vi['links']);?>"><img width="380" height="207" src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($vi['links']);?>/hqdefault.jpg" alt="<?=$vi['ten_'.$lang]?>" /></div>
	           <?php } ?>
	        </div>
        </div>
        <?php } else { ?><div class="updating">Nội dung đang cập nhật</div><?php }?>
	</div>
</div>