<?php
	$d->reset();
	$sql = "select * from #_lkweb where hienthi=1 and type='lienket' order by stt,id desc ";
	$d->query($sql);
	$lienket = $d->result_array();
?>
<div class="lienket">
	<p>Email: <?=$row_setting['email']?></p>
	<label>Social: </label>
	<?php for($i=0;$i<count($lienket);$i++){?>
	<a href="<?=$lienket[$i]['url']?>" target="_blank"><img src="thumb/30x30/2/<?=_upload_hinhanh_l.$lienket[$i]['photo']?>" alt="<?=$lienket[$i]['ten_'.$lang]?>" /></a>
	<?php } ?>
</div>