<?php

	$d->reset();
	$sql = "select photo_vi,link,thumb from #_photo where hienthi=1 and type='slider' order by stt,id desc";
	$d->query($sql);
	$slide_s = $d->result_array();

?>

    <script src="js/engine/sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="js/engine/sliderengine/amazingslider-1.css">
    <script src="js/engine/sliderengine/initslider-1.js"></script>
    <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;padding-left:0px; padding-right:260px;margin:0px auto 0px;">

        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
            <?php for($i=0,$count_bg=count($slide_s);$i<$count_bg;$i++){?>
                <li><a href=""><img src="<?=_upload_hinhanh_l.$slide_s[$i]['thumb']?>" alt="<?=$slide_s[$i]['ten_'.$lang]?>"  /></a></li>
            <?php } ?>
            </ul>

            <ul class="amazingslider-thumbnails" style="display:none;">
            <?php for($i=0,$count_bg=count($slide_s);$i<$count_bg;$i++){?>
                <li><a href=""><img src="<?=_upload_hinhanh_l.$slide_s[$i]['thumb']?>" alt="<?=$slide_s[$i]['ten_'.$lang]?>" title="<?=$slide_s[$i]['ten_'.$lang]?>" /></a></li>
            <?php } ?>
            </ul>

        </div>
    </div>
