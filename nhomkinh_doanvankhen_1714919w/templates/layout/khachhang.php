<?php
	$d->reset();
  $sql= "select * from #_baiviet where hienthi=1 and type='thaydoi' order by stt,id desc";
  $d->query($sql);
  $khachhang = $d->result_array();
?>
<div class="margin_auto">
  <div class="suthaydoi">
    <?php foreach ($khachhang as $key => $kh) { if($key==0||$key%2==0){ ?><div class="suthaydoi_it"><?php } ?>
    <div class="std">
      <div class="img"><a href="<?=$kh['tenkhongdau']?>"><img src="thumb/271x286/1/<?=_upload_baiviet_l.$kh['photo']?>"></a></div> 
      <div class="mota"><?=$kh['mota_'.$lang]?></div>    
    </div>
    <?php if(($key+1)%2==0||($key+1)>=count($khachhang)){ ?></div><?php } } ?>
  </div>
</div>