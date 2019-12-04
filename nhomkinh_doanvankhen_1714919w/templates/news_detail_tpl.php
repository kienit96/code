<div id="info">
  <div class="margin_auto"> 
    <?php include _template."layout/dieuhuong_detail.php";?>     

    <div class="noidung_detail">
      <p class="ngaydang">Ngày đăng : <span><?=date('d/m/Y - g:i A',$row_detail['ngaytao']);?></span></p>
      <div class="noidung"><?=$row_detail['noidung_'.$lang]?></div>
      <div class="addthis_inline_share_toolbox"><div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div></div>
      <?=get_social('','comment');?>
    </div>
    <?php if(count($tintuc) > 0){ ?>
    <div class="title"><h4>Bài viết liên quan</h4></div>
    <div class="tinkhac">
      <ul>
        <?php foreach($tintuc as $tinkhac){ ?>
          <li><a href="<?=$tinkhac['tenkhongdau']?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <?=$tinkhac['ten_'.$lang]?></a></li>
        <?php }?>
      </ul>
    </div> 
    <?php } ?>
  </div>
</div>  