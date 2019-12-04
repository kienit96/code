<div id="info">
  <div class="margin_auto">     
    <div>
      <div class="dieuhuong">  
        <a href="trang-chu.html" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
        <a href="<?=$com?>.html" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      </div>
      <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){  
        $size = filesize(_upload_hinhanh_l.$tintuc[$i]['file'])/(1024*1024);
        $type = explode('.', $tintuc[$i]['file']);
      ?> 
        <div class="download_box">
          <div class="khung">
            <img src="<?=_upload_hinhanh_l.$tintuc[$i]['thumb']?>" border="0" alt='<?=$tintuc[$i]['ten']?>' align="left" width="230"  />
            <h3><?=$tintuc[$i]['ten_'.$lang]?></h3>
            <p><?=$type[1]?> - <?=round($size,2)?>MB </p>
            <a href="<?=_upload_hinhanh_l.$tintuc[$i]['file']?>" target="_blank">Download</a>
          </div>
        </div>
       <?php }?>
     </div>
     <div align="center" ><div class="paging"><?=$paging?></div></div>
  </div> 
</div> 