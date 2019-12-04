<?php
if($_GET['command']=='delete' && $_GET['pid']>0){
	remove_pro_thanh($_GET['pid'],$com);
}
else if($_GET['command']=='clear'){
	unset($_SESSION['cart']);
}
function get_main_city($id=0)
{
    $sql="select * from table_place_city order by stt";
    $stmt=mysql_query($sql);
    $str='
        <select id="id_city" name="id_city" class="main_font">
        <option>Chọn tỉnh thành</option>            
        ';
    while ($row=@mysql_fetch_array($stmt)) 
    {
        if($row["id"]==(int)$id)
            $selected="selected";
        else 
            $selected="";
        $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';            
    }
    $str.='</select>';
    return $str;
}
?>
<div id="info">
	<div class="margin_auto">
		<form method="post" name="frm_order" action="thanh-toan" enctype="multipart/form-data"  id="submit_thanhtoan">
			<div id="checkout">
				<div class="thongtin_nhanhang">
					<div class="thongtin">
						<div class="title_dh"><h4>Thông tin mua hàng</h4></div>
						<div class="khung_dh ttnh">
							<div class="input"><span>Email: </span><input type="email" id="exampleInputEmail" placeholder="Nhập email" aria-describedby="emailHelp" name="email"></div>
							<div class="input"><span>Họ và Tên (*)</span><input required type="text" required name="ten" ></div>
							<div class="input"><span>Tỉnh/ Thành Phố (*)</span><?=get_main_city()?></div>
							<div class="input"><span>Địa chỉ (*)</span><input required type="text" required name="diachi" ></div>
							<div class="input"><span>Điện thoại (*)</span><input required type="tel" pattern="[0-9]{10}" required name="dienthoai"></div>
							<div class="input"><span>Ghi chú</span><textarea rows="5" name="noidung"></textarea></div>
							<input type="text" required value="0" hidden name="phivanchuyen">
						</div>
						<div class="loading"><img src="images/loading.gif" alt="loading"></div>
					</div>
					<div class="hinhthuc_tt">
						<div class="title_dh"><h4>Hình thức thanh toán</h4></div>
						<div class="khung_dh">
							<ul>
								<?php foreach ($thanhtoan as $key => $tt) { ?>
								<li>
									<label><div class="radio-input"><input <?=$key==0?'checked':''?> class="input-radio" type="radio" name="phuongthuc" value="<?=$tt['ten_'.$lang]?>" /></div><?=$tt['ten_'.$lang]?></label>
									<div class="noidung"><?=$tt['noidung_'.$lang]?></div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					
				</div>	
				<div class="donhang isfixed">
					<div class="title_dh"><h4>Thông tin đơn hàng</h4><a href="gio-hang">Chỉnh sửa</a></div>
					<div class="khung_dh">
						<ul class="giohang_dh">
							<?php  
							$max=count($_SESSION['cart']);
							for($i=0;$i<$max;$i++){ 
								$pid=$_SESSION['cart'][$i]['productid'];					
								$q=$_SESSION['cart'][$i]['qty'];
								$pname=get_product_name($pid);
								if($q==0) continue;
							?>
							<li>
								<div class="img"><a href="<?=changeTitle($pname)?>"><img onerror="this.src='http://placehold.it/80x80'" src="thumb/80x80/2/upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>" /></a></div>
								<div class="noidung">
									<h3><a href="<?=changeTitle($pname)?>"><?=$pname?></a></h3>
									<p>Số lượng: <?=$q?> (SP)</p>
									<p>Giá bán: <span><?=number_format(get_price($pid)*$q,0, ',', '.')?>&nbsp;₫</span></p>
								</div>
							</li>
							<?php } ?>
						</ul>
						<div class="tongtien">
							<?php /*<p class="tamtinh">Tạm tính: <span><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;₫</span></p>
							<p class="pvc">Phí vận chuyển: <span>0đ</span></p>
							<p class="thoigianvc">Thời gian vận chuyển: <span>...</span></p>*/ ?>
							<p class="total">Tổng tiền:<span><?=number_format(get_order_total(),0,',','.')?>&nbsp;₫</span></p>
							<button class="nut_dathang">Đặt Hàng</button>
						</div>
					</div>
				</div>           
			</div>

		</form>
	</div>
</div>