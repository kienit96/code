<div id="info">
  <div class="margin_auto">     
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
    </div>
    <?php if(count($tintuc) > 0){ ?>
      <div id="tknoithat" class="clearfix">
          <div class="baiviet2">
            <?php foreach ($tintuc as $key => $tk) { ?>
            <div class="tknoithat">
              <a class="hover_zoom" href="<?=$tk['tenkhongdau']?>"><img src="thumb/372x230/1/<?=_upload_baiviet_l.$tk['photo']?>" alt="<?=$tk['ten_'.$lang]?>"></a>
              <div class="icon"><img src="thumb/32x32/2/<?=_upload_baiviet_l.$tk['icon']?>" alt="<?=$tk['ten_'.$lang]?>"></div>
              <h3><a href="<?=$tk['tenkhongdau']?>"><?=$tk['ten_'.$lang]?></a></h3>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php }else{ ?><div class="updating"><?=_noidungdangcapnhat?></div><?php } ?>
    </div>
    <div align="center" ><div class="paging"><?=$paging?></div></div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>