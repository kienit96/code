<?php
	$d->reset();
	$sql = "select * from #_lkweb where hienthi=1 and type='lkchat' order by stt,id desc ";
	$d->query($sql);
	$lienket_r = $d->result_array();
?>
<div class="lienket_r">
	<?php for($i=0;$i<count($lienket_r);$i++){?>
		<a href="<?=$lienket_r[$i]['url']?>" target="_blank"><img src="thumb/39x39/2/<?=_upload_hinhanh_l.$lienket_r[$i]['photo']?>" alt="<?=$lienket_r[$i]['ten_'.$lang]?>" /></a>
	<?php } ?>
</div>