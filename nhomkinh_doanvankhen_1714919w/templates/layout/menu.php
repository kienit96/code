<?php
  $d->reset();
  $sql = "select id,tenkhongdau,ten_$lang from #_product_list where hienthi=1 and type='product' order by stt,id asc";
  $d->query($sql);
  $product_list_menu = $d->result_array();
?>
<div class="margin_auto">
  <nav class="menu_top"> 
    <ul>
      <li class="icon <?=$com==""?'active':''?>"><a href="./">Trang chủ</a></li>
      <li class="icon <?=$com=="gioi-thieu"?'active':''?>"><a href="gioi-thieu">Giới Thiệu</a></li>
      <li class="icon <?=$com=="san-pham"?'active':''?>"><a href="san-pham">Sản Phẩm</a>
        <?php if(count($product_list_menu) > 0){  ?>
        <ul>
          <?php foreach ($product_list_menu as $key => $rl) { ?>
            <li class="<?=$idl==$rl['id']?'active':''?> <?=$key+1==count($product_list_menu)?'end':''?>"><a href="<?=$rl['tenkhongdau']?>"><?=$rl['ten_'.$lang]?></a></li>
          <?php } ?> 
        </ul>
        <?php } ?>
      </li>
      <li class="icon <?=$com=="dich-vu"?'active':''?>"><a href="dich-vu">Dịch vụ</a></li>
      <li class="icon <?=$com=="tin-tuc"?'active':''?>"><a href="tin-tuc">Tin Tức</a></li>
      <li class="icon <?=$com=="lien-he"?'active':''?>"><a href="lien-he">Liên Hệ</a></li>
      <li class="search"><?php include _template."layout/addon/timkiem.php"; ?></li>
    </ul>
  </nav>
</div>
<div class="header_mm">
  <a href="#menu_mm"><span></span></a>
</div>