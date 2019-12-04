<?php
if(count($_SESSION['cart']) == 0){
	transfer("Bạn chưa nua sản phẩm nào ! ", "./");
}
if(empty($_POST)){
	transfer("Không nhận được dữ liệu", "thanh-toan",false);
}
$d->reset();
$sql = "select id,ten_$lang,noidung_$lang from #_baiviet where hienthi=1 and type='thanhtoan' order by stt asc";
$d->query($sql);
$thanhtoan = $d->result_array();

$title_bar .= "Thanh Toán";
?>