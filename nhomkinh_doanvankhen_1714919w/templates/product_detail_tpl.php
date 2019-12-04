<div id="info">
  <div class="margin_auto">
    <?php include _template."layout/dieuhuong_detail.php";?>
    <div class="product_ct">
      <div class="khung_product_detail">
        <div class="frame_images " >
          <div class="app-figure" id="zoom-fig">
            <a href="<?=_upload_product_l.$row_detail['photo']?>" id="Zoom-1" class="MagicZoom" title="<?=$row_detail['ten_'.$lang]?>.">
              <img onerror="this.src='https://placehold.it/520x460'" src="thumb/520x460/1/<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" /></a>
            </div>
            <div class="selectors"><?php include _template."layout/jssor.php";?> </div>
          </div>
          <div class="khung_thongtin">
            <h1><?=$row_detail['ten_'.$lang]?></h1>
            <div class="gia">
              <label>Giá: </label>
              <span class="giaban"><?=$row_detail['giaban']!=0?number_format($row_detail['giaban'],0, ',', '.').'&nbsp;đ':'Liên Hệ'?></span>
              <?php if($row_detail['giacu'] != 0){ ?>&nbsp;&nbsp;<span class="giacu"><?=number_format($row_detail['giacu'],0, ',', '.')?>&nbsp;đ</span><?php } ?>
            </div>
            <?php if($row_detail['masp']!=""){ ?><div><label>Mã SP: </label><?=$row_detail['masp']?></div><?php } ?>
            <?php if($row_detail['mota_'.$lang]!=""){ ?><div class="mota"><?=$row_detail['mota_'.$lang]?></div><?php } ?>
            <div class="addthis_inline_share_toolbox"><div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div></div>
          </div>
        </div>
        <div id="container_product">
          <div class="noidung_tab">
            <ul id="tabs">
              <li class="active" ><a data-id="tab-1">Chi tiết sản phẩm</a></li>
              <li class="" ><a data-id="tab-2">Bình Luận</a></li>
            </ul>
            <div class="clear"></div>
            <div id="tab-1" class="tabct tab_show">
              <?php if($row_detail['noidung_'.$lang] != ''){ ?>
                <div class="noidung_ta"><?=$row_detail['noidung_'.$lang]?></div>
              <?php }else{ ?>
               <div class="updating">Nội dung đang cập nhật</div>
             <?php } ?>
           </div>
           <div id="tab-2" class=" tabct tab_hidden">
            <?=get_social('','comment');?>
          </div>
        </div>
        <div class="khung_other">
          <div class="title"><h4><?=$title_detail?> khác</h4></div>
          <div class="owl_sp"> 
            <?php foreach($product as $k=>$row) { ?>
              <div class="item">
                <div class="bao_item">
                      <div class="img">
                        <a class="hover_zoom" href="<?=$row['tenkhongdau']?>"><img onerror="this.src='https://placehold.it/260x230'" src="thumb/260x230/1/<?=_upload_product_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>"></a>
                      </div>
                      <div class="noidung">
                          <h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3>
                          <div class="gia">Giá:&nbsp;
                              <?php if($row['giaban'] != 0) { ?><span class="giaban"><?=number_format($row['giaban'],0, ',', '.')?>đ</span>
                              <?php }else{ ?><span class="giaban">Liên Hệ</span><?php } ?>
                            <?php if($row['giacu'] != 0){?><span class="giacu"><?=number_format($row['giacu'],0, ',', '.')?>đ</span><?php } ?>
                          </div> 
                      </div>
                    </div>
                </div>
          <?php } ?>
        </div> 
      </div>
    </div>
  </div>
</div>
</div>
<h2 class="visit_hidden"><?=$title_detail?></h2>