<div id="header">
	<div class="head_t">
		<div class="margin_auto khung_flex flex_center">
			<marquee><?=$row_setting['slogan_'.$lang]?></marquee>
			<?php include _template."layout/addon/lienket.php"; ?>
		</div>
	</div>
	<div class="header">
		<div class="margin_auto khung_flex flex_center">
			<div id="logo"><a href="./"><img src="thumb/255x130/2/<?=_upload_hinhanh_l.$logo['photo_vi']?>" alt="logo"></a></div>
			<div id="banner"><a href="./"><img src="thumb/650x130/2/<?=_upload_hinhanh_l.$banner['photo_vi']?>" alt="banner"></a></div>
			<div class="hotline">
				<label>Hỗ Trợ 24/7</label>
				<?php foreach ($arr_hotline as $key => $value) { ?>
				<span><?=$value?></span>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div id="mainmenu"><?php include _template."layout/menu.php"; ?></div>