<?php  
    $d->reset();
    $sql = "select id,links,ten_$lang,mota_$lang from #_video where type='video'and hienthi != 0 order by stt asc";
    $d->query($sql);
    $video = $d->result_array();

    $d->reset();
    $sql = "select photo,tenkhongdau,ten_$lang,mota_$lang,ngaytao from #_baiviet where type='tintuc'and hienthi != 0 and noibat != 0 order by stt asc";
    $d->query($sql);
    $tintucs = $d->result_array();
?>
<div id="bottom">
    <div class="margin_auto">
        <div class="title"><p><?=$row_setting['slogan_'.$lang]?></p><h2>Tin tức và video clips</h2></div>
        <div class="bottom khung_flex flex_center">
            <div class="tintuc_bot">
                <?php if(count($tintucs) > 0){ ?>
                <div class="box_tintuc khung_flex">
                    <div class="news_big">
                        <a href="<?=$tintucs[0]['tenkhongdau']?>"><img src="thumb/360x200/1/<?=_upload_baiviet_l.$tintucs[0]['photo']?>" alt="<?=$tintucs[0]['ten_'.$lang]?>"></a>
                        <div class="noidung">
                            <h3><a href="<?=$tintucs[0]['tenkhongdau']?>"><?=$tintucs[0]['ten_'.$lang]?></a></h3>
                            <p class="mota"><?=$tintucs[0]['mota_'.$lang]?></p>
                            <a class="xemthem" href="<?=$tintucs[0]['tenkhongdau']?>">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="scroll_tintuc">
                        <?php for ($i=0; $i < count($tintucs); $i++) { ?>
                        <div class="tintuc">
                            <a class="hover_zoom" href="<?=$tintucs[$i]['tenkhongdau']?>"><img src="thumb/150x110/1/<?=_upload_baiviet_l.$tintucs[$i]['photo']?>" alt="<?=$tintucs[$i]['ten_'.$lang]?>"></a>
                            <div class="noidung">
                                <p class="ngaydang"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> <?=date('d-m-Y',$tintucs[$i]['ngaytao'])?></p>
                                <h3><a href="<?=$tintucs[$i]['tenkhongdau']?>"><?=$tintucs[$i]['ten_'.$lang]?></a></h3>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
            </div>
            <div class="video_bot">
                <?php if(count($video) > 0){ ?>
                <div class="iframe">
                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[0]['links']);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="slick_video">
                    <?php foreach ($video as $key => $vi) { ?>
                        <div class="vi" data-id="<?=getYoutubeIdFromUrl($vi['links']);?>"><img width="190" height="130" src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($vi['links']);?>/hqdefault.jpg" alt="<?=$vi['ten_'.$lang]?>" /></div>
                   <?php } ?>
                </div>
                <?php } else { ?><div class="updating">Nội dung đang cập nhật</div><?php }?>
            </div>    
        </div>
    </div>
</div>