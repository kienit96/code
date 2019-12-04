<?php
  $d->reset();
  $sql = "select id,tenkhongdau,ten_$lang,photo,mota_$lang,photo from #_product_cat where type='product' and hienthi != 0 and noibat != 0 order by id,stt asc";
  $d->query($sql);
  $danhmuc = $d->result_array();
?>

<div id="danhmuc">
  <div class="margin_auto">
    <div class="title"><h2>Shop theo danh mục</h2></div>
    <?php if(count($danhmuc) > 0){ ?>
    <div class="slick_danhmuc">
      <?php foreach ($danhmuc as $key => $dm){  ?>
        <div class="dm">
          <a href="<?=$dm['tenkhongdau']?>"><img src="thumb/50x50/2/<?=_upload_product_l.$dm['photo']?>" alt="<?=$dm['ten_'.$lang]?>"/></a>
          <h3><a href="<?=$dm['tenkhongdau']?>"><?=$dm['ten_'.$lang]?></a></h3>
       </div>
      <?php  } ?>
    </div>
    <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
  </div>
</div>
