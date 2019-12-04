<?php

  $d->reset();
  $sql = "select * from #_baiviet_list where hienthi=1 and type='hoidap' order by stt,id desc ";
  $d->query($sql);
  $hoidap_list = $d->result_array();

?>

<div class="margin_auto">
    <div class="hoidap">
        <div class="thanh_vs"><h4>Hỏi - Đáp</h4></div>
        <?php for($i=0;$i<count($hoidap_list);$i++){
          $d->reset();
          $sql = "select ten_$lang,mota_$lang,tenkhongdau,thumb from #_baiviet where hienthi=1 and type='hoidap' and id_list='".$hoidap_list[$i]['id']."' order by stt,id desc ";
          $d->query($sql);
          $hoidap = $d->result_array();
        ?>
        <div class="hoidap_khung">
          <h4><?=$hoidap_list[$i]['ten_'.$lang]?></h4>
          <ul>
          <?php for($j=0;$j<count($hoidap);$j++){?>
              <li>
                  <?php if($j==0){?>
                  <a href="hoi-dap/<?=$hoidap[$j]['tenkhongdau']?>.html"><img src="<?=_upload_baiviet_l.'52x41x1/'.$hoidap[$j]['thumb']?>" alt="<?=$hoidap[$j]['ten_'.$lang]?>" /></a>
                  <h3><a href="hoi-dap/<?=$hoidap[$j]['tenkhongdau']?>.html"><?=$hoidap[$j]['ten_'.$lang]?></a></h3>
                  <?php } else { ?>
                  <h3><a href="hoi-dap/<?=$hoidap[$j]['tenkhongdau']?>.html"> <i class="fa fa-plus" aria-hidden="true"></i> <?=$hoidap[$j]['ten_'.$lang]?></a></h3>
                  <?php } ?>
                  
              </li>
          <?php } ?>
          </ul>
        </div>
        <?php } ?>
    </div>
</div>