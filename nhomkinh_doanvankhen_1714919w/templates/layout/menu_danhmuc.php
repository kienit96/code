<?php
  $d->reset();
  $sql = "select id,tenkhongdau,ten_$lang from #_product_list where hienthi=1 and type='product' order by stt,id asc";
  $d->query($sql);
  $product_list = $d->result_array();
?>
<div id="menu_left" class="<?=$com!=''?'detail':''?>">
  <div class="box_left">
    <h4><a href="san-pham">Danh mục sản phẩm</a></h4>
    <?php if(count($product_list) > 0){ ?>
      <div class="left">
        <div class="menu_left">
          <?php  if(count($product_list) > 0) { ?><ul><?php for($i=0,$count_c=count($product_list);$i<$count_c;$i++){ 
            $d->reset();
            $sql = "select ten_vi,photo,tenkhongdau,ngaytao from #_product_cat where hienthi=1 and type='product' and id_list = ".$product_list[$i]['id']." order by stt,id desc";
            $d->query($sql);
            $product_cat = $d->result_array();
          ?>
             <li>
              <a href="<?=$product_list[$i]['tenkhongdau']?>"><?=$product_list[$i]['ten_'.$lang]?></a> 
              <?php if(count($product_cat) > 0){ ?>
                <ul class="menu_left_child">
                  <?php  for($k=0,$count_i=count($product_cat);$k<$count_i;$k++){  ?>
                  <li><a href="<?=$product_cat[$k]['tenkhongdau']?>"><?=$product_cat[$k]['ten_'.$lang]?></a></li>
                  <?php } ?>
                </ul>
              <?php }  ?>
             </li>
            <?php } ?></ul><?php }  ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>