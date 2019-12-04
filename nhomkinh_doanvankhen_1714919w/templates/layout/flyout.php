<?php
  	$d->reset();
  	$sql = "select id,tenkhongdau,ten_$lang,photo,quangcao from #_product_list where type='product' and hienthi=1 and noibat != 0 order by stt,id";
  	$d->query($sql);
  	$rowl = $d->result_array();

  	$d->reset();
    $sql_banner_top= "select photo_$lang from #_photo where type='logo'";
    $d->query($sql_banner_top);
    $logo_top = $d->fetch_array();
?>
<div id="left_nav">
	<div class="fix_nav">
		<div class="flyout-trigger" style="">
			<span class="flyout-trigger__bar"></span>
			<span class="flyout-trigger__bar"></span>
			<span class="flyout-trigger__bar"></span>
		</div>
		<div class="txt_nav"><div class="txt_slogan"><?=$row_setting['ten_'.$lang]?></div></div>
		<div class="flyout">
			<div class="flyout_inner">
				<div class="flyout_logo"><a href="./"><img src="thumb/245x45/2/<?=_upload_hinhanh_l.$logo_top['photo_'.$lang]?>" alt="logo" /></a></div>
				<div class="flyout_menu">
					<nav class="mainNav accordion-nav">
						<ul>
							<?php foreach ($rowl as $key => $rl) { ?>
							<li><a href="<?=$rl['tenkhongdau']?>"><?=$rl['ten_'.$lang]?></a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>		
	</div>
</div>