<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong">  
     <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
     <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
     <a href="<?=getCurrentPageURL()?>" itemprop="url" title="<?=$row_detail['ten_'.$lang]?>"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a>
   </div>       
   <?php //include _template."layout/left.php";?>
   <div class="noidung_detail">
    <div class="ngaydang"><?=_ngaydang?> : <?=date('d/m/Y - g:i A',$row_detail['ngaytao']);?></div>
    <div class="noidung"><?=$row_detail['noidung_'.$lang]?></div>
    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <div class="addthis_inline_share_toolbox"></div>
    <!-- <div class="addthis_native_toolbox"></div> -->
    <?=get_social('','comment');?>
  </div>
  <div class="khung_sp">
    <div class="title"><h4><?=_baivietkhac?></h4></div>
    <div class="thietkekhac owl-carousel">
      <?php foreach($tintuc as $key => $tinkhac){?>
        <div class="tknoithat">
          <a class="hover_zoom" href="<?=$tinkhac['tenkhongdau']?>"><img src="thumb/372x230/1/<?=_upload_baiviet_l.$tinkhac['photo']?>" alt="<?=$tinkhac['ten_'.$lang]?>"></a>
          <div class="icon"><img onerror="this.src='thumb/32x32/2/images/default.png';" src="thumb/32x32/2/<?=_upload_baiviet_l.$tinkhac['icon']?>" alt="<?=$tinkhac['ten_'.$lang]?>"></div>
          <h3><a href="<?=$tinkhac['tenkhongdau']?>"><?=$tinkhac['ten_'.$lang]?></a></h3>
        </div>
      <?php }?>
    </div>
  </div>
</div> 
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>   