<div id="sanpham">
	<div class="khung spnoibat">
		<div class="margin_auto">
			<div class="title"><p><?=$row_setting['slogan_'.$lang]?></p><h2>SẢN PHẨM CỦA CHÚNG TÔI</h2></div>
			<ul class="tab_sp">
				<?php foreach ($product_list_chinh as $key => $rl) { ?>
				<li <?=$key==0?'class="active"':''?> data-id="<?=$rl['id']?>"><?=$rl['ten_'.$lang]?></li>
				<?php } ?>
			</ul>
			<div class="load_paging" data-loai="chinh"></div>
		</div>
	</div>
	<div class="khung">
		<div class="margin_auto">
			<div class="title"><p><?=$row_setting['slogan_'.$lang]?></p><h2>SẢN PHẨM KHÁC</h2></div>
			<ul class="tab_sp">
				<?php foreach ($product_list_phu as $key => $rl) { ?>
				<li <?=$key==0?'class="active"':''?> data-id="<?=$rl['id']?>"><?=$rl['ten_'.$lang]?></li>
				<?php } ?>
			</ul>
			<div class="load_paging" data-loai="phu"></div>
		</div>
	</div>
</div>