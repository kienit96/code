<?php
	if(count($_SESSION['cart']) == 0){
		transfer("Bạn chưa nua sản phẩm nào ! ", "./",false);
	}

	$d->reset();
	$sql = "select id,ten_$lang,noidung_$lang from #_baiviet where type = 'thanhtoan' and hienthi != 0 order by stt,id asc";
	$d->query($sql);
	$thanhtoan = $d->result_array();
?>