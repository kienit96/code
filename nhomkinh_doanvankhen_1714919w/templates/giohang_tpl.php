<?php  
	if($_GET['command']=='delete' && $_GET['pid']>0){
		remove_pro_thanh($_GET['pid'],$_GET['size'],$_GET['color'],$com);
	}
	else if($_GET['command']=='clear'){
		unset($_SESSION['cart']);
	}
?>
<div id="info">
	<div class="margin_auto">
		<h4 class="title_cart">Giỏ hàng (<?=count($_SESSION['cart'])?>) sản phẩm</h4>
		<form method="post" name="frm_order" action="thanh-toan" enctype="multipart/form-data"  id="frm_order">
			<?php if(count($_SESSION['cart']) > 0){  ?>
				<div class="giohang_tk">
					<table border="0" cellpadding="5px" cellspacing="1px" width="100%">
						<tr class="menu_giohang" >
							<td class="center">Sản phẩm</td>
							<td class="center">Số Lượng</td>
							<td class="res_cart center">Tổng Giá</td>
						</tr>
						<?php 
						$max=count($_SESSION['cart']);
						for($i=0;$i<$max;$i++){
							$pid=$_SESSION['cart'][$i]['productid'];					
							$q=$_SESSION['cart'][$i]['qty'];
							$pname=get_product_name($pid);
							if($q==0) continue;

							?>
							<tr class="form_giohang">
								<td width="30%" class="tt_cart"><a href="<?=changeTitle($pname)?>">
									<img onerror="this.src='http://placehold.it/80x80'" src="thumb/80x80/1/upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>" class='img' />
									<h3><?=$pname?> </h3>
									<span>Giá Bán : <?=number_format(get_price($pid),0, ',', '.')?>&nbsp;₫</span>
								</a><i class="fa fa-trash-o" aria-hidden="true" onclick='xoa(<?=$pid?>,"<?=$_SESSION['cart'][$i]['size']?>","<?=$_SESSION['cart'][$i]['mausac']?>")' ></i></td>

								<td class="center" width="8%"><input type="number" min="1" max="100" name="<?=$pid?>" value="<?=$q?>" class="capnhat_sl" /></td>                    
								<td  width="10%" class="res_cart center capnhat_price_<?=$pid?>"><?=number_format(get_price($pid)*$q,0, ',', '.')?>&nbsp;₫</td>
							</tr>
						<?php } ?>
					</table>
					<div class="cart_actions">
						<a href="bo-suu-tap"> < Tiếp tục mua hàng</a>
					</div>
				</div>
				<div class="cart-summary ">
					<div class="isfixed">
						<h4>Hóa đơn của bạn</h4>
						<div class="summary">
							<p>Tạm Tính: <span class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;₫</span></p>
							<p>Tổng tiền: <span class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;₫</span></p>
							<a class="dathang" href="thanh-toan">Tiến hành đặt hàng</a>
						</div>
					</div>
				</div>
			<?php }	else{ ?>
				<div class="updating">Bạn không có sản phẩm trong giỏ hàng</div>
			<?php } ?>
		</form>
	</div>           
</div>