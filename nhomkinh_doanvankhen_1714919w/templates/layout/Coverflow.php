<!--  <link rel="stylesheet" href="js/Coverflow/css/reset.css" />  -->
<?php
  $d->reset();
  $sql = "select tenkhongdau,ten_$lang,id,photo from #_product where hienthi=1 and sp_banchay != 0  and type='product' order by stt,ngaytao desc";
  $d->query($sql);
  $product_bc = $d->result_array();
?>
   <style>
		.poster-main{
			position: relative;
      margin:30px auto;
      max-width:1000px;
		}
		.poster-main .poster-list .poster-item{
			position: absolute;
			left: 0;
			top: 0;
		}
		.poster-main .poster-btn{
			position: absolute;
			top: 0;
			cursor: pointer;
		}
		.poster-main .poster-prev-btn{
			left: 0;
			background: url("images/btn_l.png") no-repeat center center;
		}
		.poster-main .poster-next-btn{
			right: 0;
			background: url("images/btn_r.png") no-repeat center center;
		}
		
	</style> 
  <div class="poster-main" id="carousel" data-setting='{
							"width":800,
							"height":300,
							"posterWidth":300,
							"posterHeight":300,
							"scale":0.8,
							"speed":1000,
							"autoPlay":true,
							"delay":3000,
							"verticalAlign":"middle"
							}'>  
   <div class="poster-btn poster-prev-btn"></div> 
   <ul class="poster-list"> 
   	<?php foreach ($product_bc as $key => $bc) { ?>
   		<li class="poster-item"><a href="san-pham/<?=$bc['tenkhongdau']?>.html"><img src="thumb/300x300/2/<?=_upload_product_l.$bc['photo']?>" alt="" width="100%" /></a></li> 
   	<?php } ?>
   </ul> 
   <div class="poster-btn poster-next-btn"></div> 
  </div> 