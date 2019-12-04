<?php
  $d->reset();
  $sql = "select id,tenkhongdau,ten_$lang from #_product_list where type='product' and hienthi=1 order by stt,id";
  $d->query($sql);
  $product_list = $d->result_array();
?>
<ul class="navigation">
  <?php if(count($product_list) > 0){ 
    foreach ($product_list as $key => $row_l) { 
      $d->reset();
      $sql = "select id,tenkhongdau,ten_$lang from #_product_cat where type='product' and hienthi=1 order by stt,id";
      $d->query($sql);
      $product_cat = $d->result_array();
    ?>
    <li><a href="san-pham/<?=$row_l['tenkhongdau']?>"><?=$row_l['ten_'.$lang]?></a>
      <?php if(count($product_cat) > 0){ ?>
        <ul>
          <?php foreach ($product_cat as $key => $row_c) { ?>
            <li><a href="san-pham/<?=$row_l['tenkhongdau']?>/<?=$row_c['tenkhongdau']?>"><?=$row_c['ten_'.$lang]?></a></li>
          <?php } ?>
        </ul>
      <?php } ?>
    </li>
  <?php } } ?>
</ul>