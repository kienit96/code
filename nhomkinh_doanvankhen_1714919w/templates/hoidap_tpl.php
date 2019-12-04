<?php
  $d->reset();
  $sql = "select * from #_contact where type='cauhoi'and hienthi != 0 order by stt desc";
  $d->query($sql);
  $cauhoi = $d->result_array();
?>
<div id="info">
  <div class="margin_auto">
    <div class="thanh_title"><h2><?=$title_detail?></h2> </div>
    <div class="dieuhuong">  
        <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
        <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
    </div>
    <div id="nhantin" class="hoidap">
      <?php include _template."layout/addon/nhantin.php"; ?>
    </div>  
    <div class="khung_sp">
      <?php foreach ($cauhoi as $key => $ch) { ?>
      <div class="cauhois">
        <p><?=$ch['noidung']?></p>
        <div class="noidung">
          <p><b>Họ và Tên: </b><?=$ch['ten']?></p>
          <p><b>Email: </b><?=$ch['email']?></p>
          <p><b>Điện thoại: </b><?=$ch['dienthoai']?></p>
          <p><b>Địa chỉ: </b><?=$ch['diachi']?></p>
          <div class="traloi">
            <span>Trả lời</span>
            <p><?=$ch['ghichu']?></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div> 