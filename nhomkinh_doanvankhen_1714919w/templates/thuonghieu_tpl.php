<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="Trang Chủ"><span itemprop="title">Trang Chủ</span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
    </div>
    <?php if(count($thuonghieu)!=0){?>
      <div class="box_thuonghieu">
        <?php for($j=0,$count_sp=count($thuonghieu);$j<$count_sp;$j++){?>
           <div class="thuonghieu">
            <a class="hover_zoom" data-fancybox="khquan" href="<?=_upload_hinhanh_l.$thuonghieu[$j]['photo_vi']?>" target="_blank"><img src="thumb/385x262/1/<?=_upload_hinhanh_l.$thuonghieu[$j]['photo_vi']?>" alt="<?=$thuonghieu[$j]['ten_'.$lang]?>" /></a>
          </div> 
        <?php } ?>
      </div>
      <div class="paging"><?=$paging?></div> 
    <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>