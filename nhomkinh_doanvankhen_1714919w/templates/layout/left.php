<?php
  $d->reset();
  $sql = "select tenkhongdau,ten_$lang,id from #_product_list where hienthi=1 and type='product' order by stt asc";
  $d->query($sql);
  $product_list_l = $d->result_array();

  $d->reset();
  $sql= "select photo_vi,link from #_photo where type='banner'";
  $d->query($sql);
  $banner = $d->fetch_array();
?>
<div id="left">
  <div class="isfixed">
    <div class="danhmuc">
      <h4>Danh mục sản phẩm</h4>
      <ul class="danhmuc_l">
        <?php foreach ($product_list_l as $key => $rl) { ?>
          <li <?php if($rl['tenkhongdau'] == $idl){echo 'class="active"';} ?>><a href="<?=$rl['tenkhongdau']?>"> + <?=$rl['ten_'.$lang]?></a></li>
        <?php } ?>
      </ul>
    </div>
    <div class="danhmuc"><a href="<?=$banner['link']?>"><img src="thumb/270x573/1/<?=_upload_hinhanh_l.$banner['photo_vi']?>" alt="banner"></a></div>
  </div>
</div>