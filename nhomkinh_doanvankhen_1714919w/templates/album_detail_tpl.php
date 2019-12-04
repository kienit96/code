<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong   ">  
      <a href="./" itemprop="url" title="Trang chủ"><span itemprop="title">Trang chủ</span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      <?php if($album_detail_list['id']!=''){?>
      <a href="<?=$album_detail_list['tenkhongdau']?>" title="<?=$album_detail_list['ten_'.$lang]?>" itemprop="url" ><span itemprop="title"><?=$album_detail_list['ten_'.$lang]?>      </span> </a> 
      <?php } ?>
      <a title="<?=$album_detail['ten_'.$lang]?>" itemprop="url" href="<?=$album_detail['tenkhongdau']?>"><span itemprop="title"><?=$album_detail['ten_'.$lang]?></span></a>
    </div>
    <?php if(count($album_images) > 0){?>
        <div class="khung_album">
         <?php for($j=0;$j<count($album_images);$j++){ ?>
          <div class="album_images">
            <a data-fancybox="album" href="<?=_upload_album_l.$album_images[$j]['photo']?>" title="<?=$album_images[$j]['ten_'.$lang]?>">
              <img src="thumb/566x440/1/<?=_upload_album_l.$album_images[$j]['photo']?>" alt="<?=$album_images[$j]['tenkhongdau']?>">
            </a>
          </div>
        <?php }?>
      </div>
    <?php } else { ?><div class="updating">Nội dung đang cập nhật</div><?php }?>
  </div>
</div>