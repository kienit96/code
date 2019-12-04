<?php
	$d->reset();
	$sql_setting = "select * from #_bgweb where type='footer' limit 0,1";
	$d->query($sql_setting);
	$footer = $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bghead' limit 0,1";
	$d->query($sql_setting);
	$bghead = $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bgsanpham' limit 0,1";
	$d->query($sql_setting);
	$bgsanpham = $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bgnhantin' limit 0,1";
	$d->query($sql_setting);
	$bgnhantin = $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bgcongtrinh' limit 0,1";
	$d->query($sql_setting);
	$bgcongtrinh = $d->fetch_array();
?>
<style>
	#header{
		<?php if($bghead['photo']!=""){ ?>background: url(<?=_upload_hinhanh_l.$bghead['photo']?>) <?=$bghead['re_peat']?> <?=$bghead['tren']?> <?=$bghead['trai']?>;<?php } ?>
		<?php if($bghead['mauneen']!=""){ ?>background-color:<?=$bghead['mauneen']?>;<?php } ?>
		<?php if($bghead['fix_bg']!=""){ ?>background-attachment:<?=$bghead['fix_bg']?>;<?php } ?>
		background-size: cover;
	}
	#sanpham .spnoibat{
		<?php if($bgsanpham['photo']!=""){ ?>background: url(<?=_upload_hinhanh_l.$bgsanpham['photo']?>) <?=$bgsanpham['re_peat']?> <?=$bgsanpham['tren']?> <?=$bgsanpham['trai']?>;<?php } ?>
		<?php if($bgsanpham['mauneen']!=""){ ?>background-color:<?=$bgsanpham['mauneen']?>;<?php } ?>
		<?php if($bgsanpham['fix_bg']!=""){ ?>background-attachment:<?=$bgsanpham['fix_bg']?>;<?php } ?>
		background-size: cover;
	}
	#nhantin{
		<?php if($bgnhantin['photo']!=""){ ?>background: url(<?=_upload_hinhanh_l.$bgnhantin['photo']?>) <?=$bgnhantin['re_peat']?> <?=$bgnhantin['tren']?> <?=$bgnhantin['trai']?>;<?php } ?>
		<?php if($bgnhantin['mauneen']!=""){ ?>background-color:<?=$bgnhantin['mauneen']?>;<?php } ?>
		<?php if($bgnhantin['fix_bg']!=""){ ?>background-attachment:<?=$bgnhantin['fix_bg']?>;<?php } ?>
		background-size: cover;
	}
	#congtrinh{
		<?php if($bgcongtrinh['photo']!=""){ ?>background: url(<?=_upload_hinhanh_l.$bgcongtrinh['photo']?>) <?=$bgcongtrinh['re_peat']?> <?=$bgcongtrinh['tren']?> <?=$bgcongtrinh['trai']?>;<?php } ?>
		<?php if($bgcongtrinh['mauneen']!=""){ ?>background-color:<?=$bgcongtrinh['mauneen']?>;<?php } ?>
		<?php if($bgcongtrinh['fix_bg']!=""){ ?>background-attachment:<?=$bgcongtrinh['fix_bg']?>;<?php } ?>
		background-size: cover;
	}
	#footer{
		<?php if($footer['photo']!=""){ ?>background: url(<?=_upload_hinhanh_l.$footer['photo']?>) <?=$footer['re_peat']?> <?=$footer['tren']?> <?=$footer['trai']?>;<?php } ?>
		<?php if($footer['mauneen']!=""){ ?>background-color:<?=$footer['mauneen']?>;<?php } ?>
		<?php if($footer['fix_bg']!=""){ ?>background-attachment:<?=$footer['fix_bg']?>;<?php } ?>
		background-size: cover;
	}
</style>