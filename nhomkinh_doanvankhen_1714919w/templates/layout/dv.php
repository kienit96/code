<?php
  $d->reset();
  $sql = "select ten_$lang,mota_$lang,tenkhongdau,thumb from #_baiviet where hienthi=1 and type='dv' order by stt,id desc limit 0,2";
  $d->query($sql);
  $quytrinh = $d->result_array();
?>
<div class="margin_auto">
	<h4><?=_dichvu?></h4>
	<ul>
		<?php foreach ($quytrinh as $key => $value) { ?>
		<li>
			<a href="quy-trinh/<?=$value['tenkhongdau']?>.html"><img src="<?=_upload_baiviet_l.$value['thumb']?>"></a>
			<h3><?=$value['ten_'.$lang]?></h3>
		</li>
		<?php } ?>
	</ul>
</div>