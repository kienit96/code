<div id="info">
      
      <div class="khung">       

      <div class="thanh_title"><h2><?=$title_detail?></h2></div>

      <div class="dieuhuong">  
          <a href="trang-chu.html" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
          <a href="<?=$com?>.html" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      </div>
      
      <div>
      <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){  ?> 
        <div class="vandongvien">
            <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$tintuc[$i]['thumb']?>" border="0" align="left"  /></a>
            <h3><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" ><?=$tintuc[$i]['ten_'.$lang]?></a></h3>
        </div>
       <?php }?>
       </div>
       <div align="center" ><div class="paging"><?=$paging?></div></div>

      </div>
</div> 