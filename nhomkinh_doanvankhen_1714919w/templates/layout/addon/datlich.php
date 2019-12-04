<?php
  $d->reset();
  $sql= "select id,tenkhongdau,ten_$lang,photo,mota_$lang,mapx from #_baiviet where hienthi=1 and type='dichvu' order by stt,id desc";
  $d->query($sql);
  $dichvu = $d->result_array();
?>
<div id="datlich">
	<div class="title"><h2>Đặt lịch hẹn</h2></div>
	<form name="datlich">
		<input class="input" type="text" name="ten" placeholder="Họ và Tên" required>
		<input class="input" type="text" name="diachi" placeholder="Địa chỉ" required>
		<input class="input" type="text" name="dienthoai" placeholder="Điện thoại" required>
		<input class="input" class="input" type="email" name="email" id="exampleInputEmail" placeholder="Nhập email của bạn" aria-describedby="emailHelp" required>
		<select class="input" required name="dichvu">
			<option data-gia="0" value="">Chọn dịch vụ</option>
			<?php foreach ($dichvu as $key => $row) { ?>
			<option data-gia="<?=$row['mapx']?>" value="<?=$row['ten_'.$lang]?>"><?=$row['ten_'.$lang]?></option>
			<?php } ?>
		</select>
		<input class="input" type="text" placeholder="Giá dịch vụ" readonly name="gia">
		<input class="input" type="date" name="thoigian" required="">
		<input type="submit" value="Gửi" />
	</form>
	<div class="loading"><img src="images/loading.gif"></div>
</div>