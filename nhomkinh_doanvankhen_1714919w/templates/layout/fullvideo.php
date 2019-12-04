<?php  
    $d->reset();
    $sql= "select * from #_photo where hienthi=1 and type='slider' order by stt,id desc ";
    $d->query($sql);
    $slide_show = $d->result_array();
?>
<div class="margin_auto">
    <div class="video_slick">
        <?php foreach ($slide_show as $key => $slider) { 
            if($slider['link'] != ''){ ?>
        <div class="section-intro youtube-video-background">
            <div class="youtube-video" data-yt-id="<?=getYoutubeIdFromUrl($slider['link'])?>"></div>
        </div>     
        <?php }else{ ?>
        <div class="section-intro youtube-video-background"><img src="<?=_upload_hinhanh_l.$slider['photo_vi']?>" alt="slide image" /></div>
        <?php } } ?>
    </div>
</div>