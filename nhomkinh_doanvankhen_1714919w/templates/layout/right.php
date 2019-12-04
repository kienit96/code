<?php

    $d->reset();
    $sql = "select ten_$lang,tenkhongdau from #_baiviet where hienthi=1 and type='nhadat' order by stt,id desc";
    $d->query($sql);
    $row_nhadat = $d->result_array();

?>
<div id="right">

      <div class="danhmuc">
      <div class="thanh">Công cụ tìm kiếm</div>
      <div class="left">
        <?php include _template."layout/addon/timkiem_nc.php";?>
      </div>
      </div>

			<div class="danhmuc">
      <div class="thanh">Tin nhà đất mới</div>
            <div class="left">
            <div class="menu_left">
              <ul>
                <?php for($i=0,$count_nd=count($row_nhadat);$i<$count_nd;$i++){?>
                 <li><a href="tin-nha-dat/<?=$row_nhadat[$i]['tenkhongdau']?>.html"><?=$row_nhadat[$i]['ten_'.$lang]?></a></li>
                <?php } ?>
              </ul>
              </div>
              </div>
      </div>

      <div class="danhmuc">
      <div class="thanh">Tin tức mới</div>
            <div class="left">
              <?php include _template."layout/run_image.php";?>
              </div>
      </div>

      <div class="danhmuc">
      <div class="thanh">Fanpage Facebook</div>
            <div class="left">
              <?=get_social($row_setting['facebook'],'fanpage',230,300);?> 
              </div>
      </div>

    

</div>