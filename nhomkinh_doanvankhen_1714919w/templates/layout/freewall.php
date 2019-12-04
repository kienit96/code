<?php
    $d->reset();
    $sql= "select photo_$lang,link,mapx,ten_$lang from #_photo where hienthi=1 and type='sale' order by stt,id desc";
    $d->query($sql);
    $sale = $d->result_array();
?>
<div id="freewall" class="free-wall">
    <?php for($i=0;$i<count( $sale);$i++){
        $thumbx = substr( $sale[$i]['mapx'],0,1);
        $thumby = substr( $sale[$i]['mapx'],1,2);

        $width_thumb = $thumbx*390 + ($thumbx-1)*1;
        $height_thumb = $thumby*300 + ($thumby-1)*1;
    ?>
        <div class="brick size<?= $sale[$i]['mapx']?> ">
            <a class="hover_img"  href="<?= $sale[$i]['link']?>" target="_blank">
                <img src="thumb/<?=$width_thumb?>x<?=$height_thumb?>/1/<?=_upload_hinhanh_l.$sale[$i]['photo_'.$lang]?>" alt='<?= $sale[$i]['ten_'.$lang]?>'/>
            </a>
        </div>
    <?php } ?>
</div>

        
