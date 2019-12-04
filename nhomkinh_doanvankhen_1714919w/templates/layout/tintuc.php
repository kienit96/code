<?php  
    $d->reset();
    $sql = "select photo,tenkhongdau,ten_$lang,mota_$lang,ngaytao from #_baiviet where type='tintuc'and hienthi != 0 and noibat != 0 order by stt asc";
    $d->query($sql);
    $tintucs = $d->result_array();
?>
<div id="tintuc">
    <div class="margin_auto">
    <div class="title"><h4>tin tức & sự kiện</h4><p><?=$row_setting['slogan_'.$lang]?></p></div>
        <div class="owl_tintuc">
            <?php $j=0; for($i=0; $i < count($tintucs); $i++) { $j++;  if($i==0||$i%2==0){ ?><div class="bao_tintuc"><?php } ?>
            <div class="tintuc">
                <?php if($j==1){ ?><a class="hover_zoom img" href="<?=$tintucs[$i]['tenkhongdau']?>"><img src="thumb/290x230/1/<?=_upload_baiviet_l.$tintucs[$i]['photo']?>" alt="<?=$tintucs[$i]['ten_'.$lang]?>"></a><?php } ?>
                <div class="noidung">
                    <h3><a href="<?=$tintucs[$i]['tenkhongdau']?>"><?=$tintucs[$i]['ten_'.$lang]?></a></h3>
                    <p class="mota"><?=$tintucs[$i]['mota_'.$lang]?></p>
                    <a class="xemthem" href="<?=$tintucs[$i]['tenkhongdau']?>">Xem chi tiết</a>
                </div>
                <?php if($j==2){ ?><a class="hover_zoom img" href="<?=$tintucs[$i]['tenkhongdau']?>"><img src="thumb/290x230/1/<?=_upload_baiviet_l.$tintucs[$i]['photo']?>" alt="<?=$tintucs[$i]['ten_'.$lang]?>"></a><?php } ?>
            </div>
            <?php if(($i+1)%2==0||($i+1)>=count($tintucs)){ $j = 0; ?></div><?php } } ?>
        </div>
    </div>
</div>