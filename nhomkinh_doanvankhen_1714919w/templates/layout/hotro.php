<?php
  $d->reset();
  $sql = "select id,ten_$lang,mota,email,photo from #_tieude where hienthi=1 and type ='hotro' order by stt,id asc";
  $d->query($sql);
  $row_yahoo = $d->result_array();
?>
<div id="hotro">
  <div class="box_hotro">
    <?php foreach ($row_yahoo as $key => $val) { 
      $d->reset();
      $sql = "select id,mota,photo from #_product_photo where hienthi=1 and id_product = '".$val['id']."' and type = 'hotro' order by stt,id asc";
      $d->query($sql);
      $ds_photo = $d->result_array();
    ?>
    <div class="hotro">
      <div class="thongtin">
        <img src="thumb/115x115/1/<?=_upload_tieude_l.$val['photo']?>" alt="<?=$val['ten_'.$lang]?>">
        <div class="noidung">
          <label><?=$val['ten_'.$lang]?></label>
          <p><?=$val['mota']?></p>
          <?php if(count($ds_photo) > 0){ ?>
          <div class="link_lk">
            <?php foreach ($ds_photo as $key => $value) { ?>
            <a href="<?=$value['mota']?>" target="_blank"><img src="thumb/29x29/2/<?=_upload_product_l.$value['photo']?>" alt="<?=$val['ten_'.$lang]?>"></a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <p>Email: <?=$val['email']?></p>
    </div>
    <?php } ?>
  </div>
 </div>