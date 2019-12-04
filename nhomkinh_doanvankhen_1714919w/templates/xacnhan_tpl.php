<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
	remove_pro_thanh($_REQUEST['pid'],$com);
}
else if($_REQUEST['command']=='clear'){
	unset($_SESSION['cart']);
}
?>
<div id="info">
	<div class="margin_auto">
		<div id="sanpham">
			<div class="title"><h2><?=_xacnhanthanhtoan?></h2></div>
			<form method="post" name="frm_order" action="http://<?=$config_url?>/noidia_php/do.php" enctype="multipart/form-data"  id="frm_order"> </form>
			<div class="khung">

				<table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">
					<tr class="menu_giohang" >
						<td class="res_cart"><?=_stt?></td>
						<td><?=_sanpham?></td>
						<td><?=_soluong?></td>
						<td class="res_cart"><?=_tonggia?></td>
						<td><?=_xoa?></td>
					</tr>
					<?php 
					if(is_array($_SESSION['cart'])){
						$max=count($_SESSION['cart']);
						for($i=0;$i<$max;$i++){
							$pid=$_SESSION['cart'][$i]['productid'];
							$q=$_SESSION['cart'][$i]['qty'];
							$mau = $_SESSION['cart'][$i]['mausac'];
							$size = $_SESSION['cart'][$i]['size'];
							$pname=get_product_name($pid);
							if($q==0) continue;
							?>
							<tr class="form_giohang">
								<td width="5%" class="res_cart"><?=$i+1?></td>
								<td width="46%" class="tt_cart"><a href="san-pham/<?=$pid?>/<?=changeTitle($pname)?>.html">
									<img onerror="this.src='images/default.png';" src="upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>" class='img' />
									<h3><?=$pname?> </h3>
									<span><?=_gia?> : <?=number_format(get_price($pid),0, ',', '.')?>&nbsp;đ</span>
								</a></td>
								<td width="8%"><?=$q?></td>                    
								<td width="10%" class="res_cart capnhat_price_<?=$pid?>"><?=number_format(get_price($pid)*$q,0, ',', '.')?>&nbsp;đ</td>
								<td width="10%"><img src="images/icon/disabled.png" border="0" onclick="xoa(<?=$pid?>)" width="20" style="cursor: pointer;" /></td>
							</tr>
						<?php } ?>
						<tr class="tonggia">
							<td colspan="7" ><?=_tonggia?> : <b class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
						</tr>
					<?php }	else{ echo "<tr bgColor='#FFFFFF'><td colspan='5'>"._bankhongcosanphamnaotronggiohang."</td>"; } ?>
				</table>
				<div class="xacnhan">
					<div class="khungxn">
						<h4><?=_xacnhanthongtingiaohang?></h4>
						<p><label><b><?=_hoten?> :</b> <?=$_POST['ten']?></label></p>
						<p><label><b><?=_diachi?> : </b><?=$_POST['diachi']?></label></p>
						<p><label><b><?=_dienthoai?> :</b> <?=$_POST['dienthoai']?></label></p>
						<p><label><b>Email : </b><?=$_POST['email']?></label></p>
						<p><label><b><?=_noidung?> : </b><?=$_POST['noidung']?></label></p>
					</div>
					<div class="phuongthuc">
						<h4><?=_phuongthucthanhtoan?> </h4>
						<?php foreach ($thanhtoan as $key => $tt) { ?>
						<div class="pt">
								<label><input type="radio" name="phuongthuc" value="<?=$tt['ten_'.$lang]?>" /><?=$tt['ten_'.$lang]?></label>
								<div class="noidung"><?=$tt['noidung_'.$lang]?></div>
							
						</div>
						<?php } ?>
					</div>
				</div>

				<div style=" float:right; padding-bottom:20px; padding-top:20px;" align="center">
					<input  id="submit_thanhtoan" title='<?=_thanhtoan?>' alt='<?=_thanhtoan?>' align="right" type="button" name="next" value="<?=_thanhtoan?>" style="cursor:pointer;" style="padding:2px;" class="g_muatiep"/>
				</div>

			</form>
		</div>              
	</div>
</div>
</div>