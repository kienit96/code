<div id="info">
<div id="sanpham">
    <div class="thanh_title"><h2><?=$title_detail?></h2></div>      
    <div class="khung">
    <div class="dieuhuong">  
          <a href="trang-chu.html" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
          <a href="<?=$com?>.html" itemprop="url" title="Ship hàng rẻ"><span itemprop="title">Ship hàng rẻ</span></a>
    </div>

 	<div class="shiphangre">
 	<form action="" method="post" name="frm_shiphang" accept-charset="utf-8">
 		<table cellspacing="0" cellpadding="0" border="0" width="100%">
 			<tbody>
 				<tr>
 					<td width="70%">
 						<div class="tt_ship">
 							<h2><?=$row_setting['ten_'.$lang]?></h2>
							<p>Địa chỉ : <?=$row_setting['diachi_'.$lang]?></p>
							<p>Hotline : <?=$row_setting['hotline']?></p>
 						</div>
 					</td>
 					<td class="sobill" width="30%">
 						<p>Số bill gửi : 01062017 </p>
 					</td>
 				</tr>

 				<tr>
 					<td width="70%">
 						<table cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td width="50%"><p>Người gửi : <input type="text" name="nguoigui" value="<?=$_GET['khachhang']?>" class="validate[required]" /></p> </td>
								<td width="50%"><p>Người nhận : <input type="text" name="nguoinhan" class="validate[required]" /></p></td>
							</tr>
							<tr>
								<td><p>Địa chỉ : <input type="text" name="diachi_gui" class="validate[required]" /></p></td>
								<td><p>Địa chỉ : <input type="text" name="diachi_nhan" class="validate[required]" /></p></td>
							</tr>
							<tr>
								<td><p>Điện thoại : <input type="text" name="dienthoai_gui" value="<?=$_GET['dienthoai']?>" class="validate[required]" /></p></td>
								<td><p>Điện thoại : <input type="text" name="dienthoai_nhan" class="validate[required]" /></p></td>
							</tr>
 						</table>
 					</td>
 					<td class="chuyenphat" width="30%">
 					<?php for($i=0;$i<count($row_chuyenphat);$i++){?>
 						<p><input name="chuyenphat" class="validate[required]" id="load_h<?=$i?>" type="radio" value="<?=$row_chuyenphat[$i]['id']?>" /> <label for="load_h<?=$i?>"><?=$row_chuyenphat[$i]['ten_'.$lang]?></label></p>
 					<?php } ?>
 					</td>
 				</tr>

 				<tr>
 					<td class="xacnhan_kh" colspan="2">
 						<table cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td width="30%">
									<h4>Thu hộ (COD)</h4>
									<p>
									<select name="tinhthanh" id="tinhthanh" class="validate[required]">
										<option value="">Chọn tỉnh thành</option>
										<?php for($i=0;$i<count($tinhthanh);$i++){?>
										<option value="<?=$tinhthanh[$i]['id']?>"><?=$tinhthanh[$i]['ten']?></option>
										<?php } ?>
									</select>
									<select name="quanhuyen" id="quanhuyen" class="validate[required]">
										<option value="">Chọn quận huyện</option>
										<?php for($i=0;$i<count($quanhuyen);$i++){?>
										<option value="<?=$quanhuyen[$i]['id']?>"><?=$quanhuyen[$i]['ten']?></option>
										<?php } ?>
									</select>
									</p>
									<p>Số tiền <input type="text" value="" name="sotien" readonly="" /></p>
									<p><input class="validate[required]" id="nguoitt_1" type="radio" name="nguoithanhtoan" name="1" /> <label for="nguoitt_1">Người gửi thanh toán</label></p>
									<p><input class="validate[required]" id="nguoitt_2" type="radio" name="nguoithanhtoan" name="2" /> <label for="nguoitt_2">Người nhận thanh toán</label></p>
								</td>
								<td width="40%">
									<h4>Xác nhận khách hàng</h4>
									<p>Đề nghị khách hàng không được phép gửi các hàng hóa vị phạm qui định nhà nước , hàng cấm lưu thông</p>
									<p><label>Chọn ngày gửi</label>
									<input type="text" value="" name="ngaygui" class="validate[required]"  /></p>
									<p><label>Email xác nhận</label>
									<input type="text" value="" name="email" class="validate[required]" /></p>
								</td>
								<td width="30%">
									<h4>Thông tin hàng hóa</h4>
									<p><label>Tên Hàng</label>
									<input type="text" value="" name="tenhang" class="validate[required]" /></p>
									<p><textarea name="noidung" id="noidung" placeholder="Nhập nội dung" rows ="5"></textarea></p>
									
								</td>
							</tr>
							
 						</table>
 						 
 					</td>
 					
 				</tr>

 			</tbody>
 		</table>
 		<p><button id="guiyeucau" type="submit">Gửi yêu cầu</button></p>
 		</form>
</div>
         
		   
 
</div></div></div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tinhthanh').change(function(event) {
			/* Act on the event */
			var tinhthanh = $(this).val();
			$.ajax({
	            type:'POST',
	            url:'ajax/quanhuyen.php',
	            data:{id_tinh:tinhthanh},
	            success: function(result) {
	            	$('#quanhuyen').html(result);
	            }
          	});
		});
	});
</script>