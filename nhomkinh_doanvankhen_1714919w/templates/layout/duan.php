<?php 
  $d->reset();
  $sql= "select id,tenkhongdau,ten_$lang,photo,name_$lang from #_baiviet where type='duan' and noibat != 0 and hienthi != 0 order by stt,id desc";
  $d->query($sql);
  $duan_nb = $d->result_array();
?>
<div id="duan">
  <div class="margin_auto">
    <div class="title"><h2>Dự án đã thực hiện</h2><p><?=$row_setting['slogan_'.$lang]?></p></div>
    <?php if(count($duan_nb) > 0){ ?>
    <div class="box_duan">
      <?php foreach ($duan_nb as $key => $row) { ?>
      <div class="duan">
        <a class="hover_zoom" href="<?=$row['tenkhongdau']?>"><img src="thumb1/560x450/1/<?=_upload_baiviet_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>"></a>
        <div class="noidung">
          <h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3>
          <p>Khu vực: <span><?=$row['name_'.$lang]?></span></p>
          <a class="xemthem" href="<?=$row['tenkhongdau']?>">Xem Thêm</a>
        </div>
      </div>
      <?php } ?>
    </div>
    <a class="xemtatca" href="du-an">Xem thêm&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
  </div>
</div>