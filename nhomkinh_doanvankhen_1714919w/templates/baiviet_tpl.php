<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      <a href="<?=getCurrentPageURL()?>" itemprop="url" title="<?=$row_detail['ten_'.$lang]?>"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a>
    </div>
    <div class="khung_bv">
      <div class="list_bv">
        <ul class="isfixed">
          <li><h4>Phong thủy</h4></li>
          <?php foreach ($baiviet as $key => $bv) { ?>  
          <li class="bv <?=$com==$bv['tenkhongdau'] || $key == 0 ?'active':''?>" data-id="<?=$bv['id']?>">
            <a style="<?=$bv['photo']!=''?'background: url('._upload_baiviet_l.$bv['photo'].') no-repeat center; background-size: cover;':''?><?=$bv['color']!=''?'color:'.$bv['color']:''?>" href="<?=$bv['tenkhongdau']?>"><?=$bv['ten_'.$lang]?></a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <div class="noidung_bv"><?=$row_detail['noidung_'.$lang]?></div>
    </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>