<?php
  $d->reset();
  $sql= "select id,ten_$lang,photo,tenkhongdau,mota_$lang from #_baiviet where hienthi=1 and type='visao' order by stt asc";
  $d->query($sql);
  $visao = $d->result_array();  

  if(count($visao) > 0){
?>
<div id="visao">
  <div class="margin_auto">
    <div class="slick_visao">
    <?php foreach ($visao as $key => $vs) { if($key==0||$key%2==0){ ?><div class="bao_visao <?=$key==2||$key%2!=0?'le':''?>"><?php } ?>
      <div class="visao">
        <a class="img"><img onerror="this.src='http://placehold.it/86x86'" src="thumb/86x86/2/<?=_upload_baiviet_l.$vs['photo']?>" alt="<?=$vs['ten_'.$lang]?>"/></a>
        <div class="noidung">
          <h3><?=$vs['ten_'.$lang]?></h3>
          <p><?=$vs['mota_'.$lang]?></p>
        </div>
      </div>
    <?php if(($key+1)%2==0||($key+1)>=count($visao)){ ?></div><?php } } ?>
    </div> 
  </div>
</div>
<?php } ?>