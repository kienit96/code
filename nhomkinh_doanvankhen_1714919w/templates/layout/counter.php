<?php
    $d->reset();
    $sql= "select ten_$lang,id,giatri,photo from #_tieude where type='thongke' and hienthi != 0 order by stt,id desc";
    $d->query($sql);
    $thongke = $d->result_array();
?>
<div class="margin_auto">
	<div class="box_counter">
		<?php foreach ($thongke  as $key => $tk) { ?>
		<div class="counter">
			<img src="thumb/50x50/2/<?=_upload_tieude_l.$tk['photo']?>" alt="">
			<div class="number"><span class="count"><?=$tk['giatri']?></span></div>
			<h3><?=$tk['ten_'.$lang]?></h3>
		</div>
		<?php } ?>
	</div>
</div>