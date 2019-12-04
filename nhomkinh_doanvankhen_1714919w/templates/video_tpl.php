<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      <?php if($id!=''){ ?><a href="<?=getCurrentPageURL()?>" itemprop="url" title="<?=$row_detail['ten_'.$lang]?>"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a><?php } ?>
    </div>
    <div class="box_video">
      <?php foreach ($video as $key => $vi) { ?>
      <div class="video">
        <a data-fancybox href="<?=$vi['links']?>"><img src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($vi['links'])?>/hqdefault.jpg"></a>
        <h3><a data-fancybox href="<?=$vi['links']?>"><?=$vi['ten_'.$lang]?></a></h3>
      </div>
      <?php } ?>
    </div>
  </div>
</div>