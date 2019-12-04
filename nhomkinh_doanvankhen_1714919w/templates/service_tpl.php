<div id="info">
  <div class="margin_auto">     
    <?php include _template."layout/dieuhuong_detail.php";?>
    <?php if(count($tintuc) > 0){ ?>
      <div class="baiviet2">
        <?php foreach ($tintuc as $key => $row) { ?>
          <div class="baiviet2_it" >
            <div class="img">
              <a class="hover_zoom" href="<?=$row['tenkhongdau']?>"><img onerror="this.src='http://placehold.it/560x440'" src="thumb/560x440/1/<?=_upload_baiviet_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>"></a>
            </div>
            <div class="noidung">
              <h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3>
              <p><?=$row['mota_'.$lang]?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div align="center" ><div class="paging"><?=$paging?></div></div>
    <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
  </div>
</div>
<h2 class="visit_hidden"><?=$title_detail?></h2>