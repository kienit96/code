<div id="info">
  <div class="margin_auto">   
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
    </div>
    <div class="box_khachang">
      <?php foreach ($khachhang as $key => $kh) { ?>
      <div class="khachhang">
        <a target="_blank" href="<?=$kh['link']?>"><img src="thumb/560x420/1/<?=_upload_hinhanh_l.$kh['photo_vi']?>" alt="<?=$kh['ten_'.$lang]?>"></a>
        <h3><a target="_blank" href="<?=$kh['link']?>"><?=$kh['ten_'.$lang]?></a></h3>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>