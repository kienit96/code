<div id="info">
  <div class="margin_auto">
    <?php include _template."layout/dieuhuong_detail.php";?>  
    <div class="noidung_detail">
      <?php if($com == 'du-an'){ ?>
        <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-fit="cover" data-height="500px" max-height="auto" data-transition="dissolve" data-loop="true">
          <?php foreach ($hinhanh as $key => $val) { ?>
            <a href="<?=_upload_baiviet_l.$val['photo']?>"><img src="<?=_upload_baiviet_l.$val['photo']?>"></a>
          <?php } ?>
        </div>
      <?php } ?>
      <div class="noidung"><?=$row_detail['noidung_'.$lang]?></div>
      <div class="addthis_inline_share_toolbox"><div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div></div>
      <?=get_social('','comment');?>
    </div>
    <?php if(count($tintuc) > 0){ ?>
      <div class="khung">
        <div class="title"><h4>Bài viết liên quan</h4></div>
        <div class="owl_tinkhac owl-carousel baiviet2">
          <?php foreach($tintuc as $key => $row){?>
            <div class="baiviet2_it" >
              <div class="img">
                <a class="hover_zoom" href="<?=$row['tenkhongdau']?>"><img onerror="this.src='http://placehold.it/560x440'" src="thumb/560x440/1/<?=_upload_baiviet_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>"></a>
              </div>
              <div class="noidung">
                <h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3>
                <p><?=$row['mota_'.$lang]?></p>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    <?php } ?>   
  </div> 
</div>