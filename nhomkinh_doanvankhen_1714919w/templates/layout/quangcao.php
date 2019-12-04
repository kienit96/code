<?php 
	$d->reset();
	$sql= "select photo_vi,ten_vi,link from #_photo where hienthi=1 and type='quangcao' order by stt,id desc ";
	$d->query($sql);
	$quangcao = $d->result_array();
?>
<div id="quangcao">
	<div class="slick_qc">
		<?php foreach ($quangcao as $key => $qc) { ?>
		<a target="_blank" href="<?=$qc['link']?>" class="img"><img src="thumb/1366x350/1/<?=_upload_hinhanh_l.$qc['photo_vi']?>" alt="<?=$qc['ten_'.$lang]?>"></a>
		<?php } ?>
	</div>
</div>