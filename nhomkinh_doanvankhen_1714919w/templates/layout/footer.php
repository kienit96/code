<?php
	$d->reset();
    $sql= "select noidung_$lang,mota_$lang from #_info where type='footer'";
    $d->query($sql);
    $footer = $d->fetch_array();

    $d->reset();
    $sql = "select thumb_$lang,photo_$lang,hienthi,link from #_photo where type='bocongthuong'";
    $d->query($sql);
    $bocongthuong = $d->fetch_array();

    $d->reset();
    $sql = "select id,tenkhongdau,ten_$lang from #_baiviet where type='chinhsach' order by id,stt desc";
    $d->query($sql);
    $chinhsach = $d->result_array();
?>
<div id="footer" >
	<div class="footer margin_auto">
        <div class="thongtin_ct">
            <div class="noidung"><?=$footer['noidung_'.$lang]?></div>
        </div>
        <div class="chinhsach">
            <h4 class="tieude_f">Chính sách khách hàng</h4>
            <ul>
                <?php foreach ($chinhsach as $key => $cs) { ?>
                <li><a href="<?=$cs['tenkhongdau']?>"><?=$cs['ten_'.$lang]?></a></li>
                <?php } ?>
            </ul>
            <?php /* if($bocongthuong['hienthi']!=0){ ?><a class="bocongthuong" href="<?=$bocongthuong['link']?>" target="_blank"><img src="thumb/177x66/2/<?=_upload_hinhanh_l.$bocongthuong['photo_vi']?>" alt="bộ công thuong"></a><?php } */ ?>
        </div>
        <div class="facebook">
            <h4 class="tieude_f">Fanpage</h4>
            <?php include _template."layout/addon/fanpage.php"; ?>
        </div>
	</div>
</div>
<div class="coppy"><p>Copyright © 2019 <span><?=$row_setting['ten_'.$lang]?></span>. Design By <span>Nina Co., Ltd</span></p></div>
<div class="bando">
  <?php if($row_setting['phuongthuc'] == 0){ ?><a href="<?=$row_setting['link_map']?>" target="_blank"><img src="upload/map.png" alt="map"></a><?php }else if($row_setting['phuongthuc']== 1){ ?> <?=$row_setting['iframe_map']?> <?php } ?>
</div>