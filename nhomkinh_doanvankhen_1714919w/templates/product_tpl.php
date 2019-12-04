<div id="info">
  <div class="margin_auto">
    <?php include _template."layout/dieuhuong_detail.php";?>
    <?php if(count($product) > 0){ ?>
    <div class="sanpham">
      <?php foreach ($product as $key => $row) { ?>
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
    <?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>	
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>