<div id="info">

    <div id="sanpham">

     <div class="khung_in">
    <div class="title"><h2><?=$title_detail?></h2> </div>
    <ul>
		<?php if(count($product)!=0){?>
        <?php foreach ($product as $key => $row) {
          if($row['type'] == 'noidia'){
            $url = 'noi-dia';
          }else{
            $url = 'quoc-te';
          }
         ?>
             <li class="item col-md-4 col-sm-4 col-xx-6 col-xs-6">
              <div class="img hover_img">
                <a href="<?=$url?>/<?=$row['tenkhongdau']?>.html">
                    <img onerror="this.src='thumb/375x252/2/images/default.png';" alt="<?=$row['tenkhongdau']?>" src="thumb/375x252/1/<?=_upload_product_l.$row['photo']?>" />
                </a>
              </div>
              <div class="noidung">
                <h3><a href="<?=$url?>/<?=$row['tenkhongdau']?>.html"><?=$row['ten_'.$lang]?></a></h3>
                <?php if($row['giaban'] != 0){ ?>
                <span class="giaban"><?=number_format($row['giaban'],0, ',', '.')?>&nbsp;đ</span>
                <?php } if($row['giacu'] != 0){ ?>
                <span class="giacu"><?=number_format($row['giacu'],0, ',', '.')?>&nbsp;đ</span>
                <?php } if($row['giaban'] == 0 && $row['giaban'] == 0) {?>
                  <p><span>Giá: </span>Liên hệ</p>
                <?php } ?>
                <a href="<?=$url?>/<?=$row['tenkhongdau']?>.html" class="giohang add"><?=_chitiet?></a>
              </div>
            </li> 

        <?php } ?>

		<?php } else { ?>

    <div style="text-align:center; color:#FF0000; font-weight:900; font-size:22px; text-transform:uppercase;"> Chưa Có Tin Cho Mục này . </div>

    <?php }?>



</ul>

<div class="clear"></div>

<div class="paging"><?=$paging?></div> 



</div>

</div>

</div>

<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>





<div style='display:none'>

<div id='inline_content'></div>

</div>