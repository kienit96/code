<?php
  $d->reset();
  $sql = "select id,tenkhongdau,ten_$lang,mota_$lang,photo,ngaytao from #_album where type='congtrinh' and hienthi = 1 and noibat != 0 order by id,stt limit 0,6";
  $d->query($sql);
  $congtrinh = $d->result_array();  
?>
<div id="congtrinh">
  <div class="margin_auto">
    <div class="title"><p><?=$row_setting['slogan_'.$lang]?></p><h4>Công trình tiêu biểu</h4></div>
    <?php if(count($congtrinh) > 0){ ?>
    <div class="box_congtrinh">
      <?php foreach ($congtrinh as $key => $ct) { 
        $d->reset();
        $sql = "select id,photo from #_album_photo where type='congtrinh' and id_album = '".$ct['id']."'";
        $d->query($sql);
        $congtrinh_photo = $d->result_array();
      ?>
      <div class="congtrinh">
        <a class="img" style=" display: block; width: 100%; height: 270px; background: url(<?=_upload_album_l.$ct['photo']?>) no-repeat center; background-size: cover;"></a>
        <div class="noidung">
          <p class="ngaydang"><?=make_date($ct['ngaytao'],"vi").", ".date('d/m/Y',$ct['ngaytao'])?></p>
          <h3><a data-fancybox="ct_<?=$ct['id']?>" href="<?=_upload_album_l.$ct['photo']?>"><?=$ct['ten_'.$lang]?></a></h3>
          <p class="mota"><?=$ct['mota_'.$lang]?></p>
        </div>
        <?php foreach ($congtrinh_photo as $key => $ctp) { ?>
        <a href="<?=_upload_album_l.$ctp['photo']?>" data-fancybox="ct_<?=$ct['id']?>"></a>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
    <a class="xemtatca" href="cong-trinh">Xem tất cả công trình [+]</a>
    <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
  </div>
</div>