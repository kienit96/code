<?php 
  $d->reset();
  $sql = "select * from #_download_list where type='banggia' and hienthi != 0 order by stt desc";
  $d->query($sql);
  $banggia_list = $d->result_array();
?>
<div id="info">
  <div class="margin_auto">
    <div id="sanpham">  
      <div class="thanh_title"><h2><?=$title_detail?></h2></div>
      <div class="dieuhuong   ">  
          <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
          <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      </div>
      <?php if(count($banggia_list) > 0){ foreach ($banggia_list as $key => $bg_list) { 
        $d->reset();
        $sql = "select * from #_download where type='banggia' and hienthi != 0 and id_list = ".$bg_list['id']." order by stt desc";
        $d->query($sql);
        $banggia = $d->result_array();
      ?>
        <div class="banggia">
          <h4><?=$bg_list['ten_'.$lang]?></h4>
          <ul>
            <li><span>STT</span><span>Bảng gía</span><span>Xem trướt</span><span>Download</span></li>
            <?php foreach ($banggia as $key => $bg) { ?>
            <li><span><?=$key+1?></span><span><?=$bg['ten_'.$lang]?></span><span><a href="<?=_upload_hinhanh_l.$bg['file']?>" title="<?=$bg['ten_'.$lang]?>" target="_blank"><img src="images/open.png" alt="open"></a></span><span><a href="<?=_upload_hinhanh_l.$bg['file']?>" title="<?=$bg['ten_'.$lang]?>" target="_blank"><img src="images/down.png" alt="down"></a></span></li>
            <?php } ?>
          </ul>
        </div>
      <?php } } else { ?>
    <div style="width: 100%; float: left; text-align:center; color:#000000; font-family: RobotoRegular; font-size:14px; text-transform:uppercase;"><?=_noidungdangcapnhat?> </div>
    <?php }?>
      </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>