<div id="info">
  <div class="margin_auto">     
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
    </div>
    <?php if(count($tintuc) > 0){ $temp = 0; foreach ($tintuc as $key => $cn) { $temp++; if($temp == 1){$thumb = '584x586';}else if($temp == 4){ $thumb = '584x280';}else{$thumb = '282x280';} if($key==0||$key%4==0){ ?><div class="khung_camnang"><?php } ?>
    <div class="camnang">
      <a class="hover_zoom" href="<?=$cn['tenkhongdau']?>"><img src="thumb/<?=$thumb?>/1/<?=_upload_baiviet_l.$cn['photo']?>" alt="<?=$cn['ten_'.$lang]?>"></a>
      <div class="noidung">
        <h3><a href="<?=$cn['tenkhongdau']?>"><?=$cn['ten_'.$lang]?></a></h3>
        <p class="mota"><?=$cn['mota_'.$lang]?></p>
        <p class="date-view"><span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=date('d/m/Y',$cn['ngaytao'])?></span><span class="view"><i class="fa fa-eye" aria-hidden="true"></i><?=$cn['luotxem']?></span></p>
      </div>
    </div>
    <?php if(($key+1)%4==0||($key+1)>=count($tintuc)){ $temp = 0; ?></div><?php } } }else{ ?><div class="updating"><?=_noidungdangcapnhat?></div><?php } ?>
    </div>
    <div align="center" ><div class="paging"><?=$paging?></div></div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>