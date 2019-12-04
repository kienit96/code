<?php

	$d->reset();
	$sql = "select tenkhongdau,ten_$lang,ngaytao,thumb,giaban,masp from #_product where hienthi=1 and type='product' and noibat!=0 order by id desc limit 0,12";
	$d->query($sql);
	$product_deal = $d->result_array();

?>

 
<aside id="thongtin">
<div class="margin_auto">

		<div class="thanh_deal"><h4><span>Hot</span>deal - <?=_giamgiamoingay?> <a href="san-pham/giam-gia-moi-ngay"><?=_xemtatca?></a></h4></div>
		<div class="hotdeal">
			<ul>
			<?php for($j=0;$j<count($product_deal);$j++){?>
				 <li class="item">
                    <?php if($product_deal[$j]['giamgia']>0){?>
                    <div class="giamgia">-<?=$product_deal[$j]['giamgia']?> %</div>
                    <?php } ?>
                    <div class="img"><a href="san-pham/<?=$product_deal[$j]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product_deal[$j]['thumb']?>" alt="<?=$product_deal[$j]['ten_'.$lang]?>" /></a></div>
                    <h3><a href="san-pham/<?=$product_deal[$j]['tenkhongdau']?>.html"><?=$product_deal[$j]['ten_'.$lang]?></a></h3>
                    <p class="masp"><?=$product_deal[$j]['masp']?></p>
                    <p class="giaban"><span> <?php if($product_deal[$j]['giaban']==0) echo 'Liên hệ'; else echo number_format ($product_deal[$j]['giaban'],0,",",",").' '.VND ; ?></span></p>
                </li> 
			<?php } ?>
			</ul>
		</div>

</div>
</aside>