<?php
	$d->reset();
  	$sql= "select id,tenkhongdau,ten_$lang,photo,mota_$lang,color from #_baiviet where hienthi=1 and type='quytrinh' order by stt,id desc limit 0,6";
  	$d->query($sql);
  	$quytrinh = $d->result_array();
?>
<div class="margin_auto">
	<div class="thanh_title title_c white"><h2 data-length="2">quy trình thực hiện</h2></div>
	<div class="box_quytrinh">
		<?php foreach ($quytrinh as $key => $qt) { ?>
		<div class="quytrinh">
			<div class="box">
				<a href="<?=$qt['tenkhongdau']?>"><img data-lazy="thumb/60x60/2/<?=_upload_baiviet_l.$qt['photo']?>" src="thumb/60x60/2/<?=_upload_baiviet_l.$qt['photo']?>" alt="<?$qt['ten_'.$lang]?>"></a>
				<h3><a href="<?=$qt['tenkhongdau']?>"><?=$qt['ten_'.$lang]?></a></h3>
			</div>
		</div>
		<?php } ?>
		<div class="line"></div>
	</div>
</div>