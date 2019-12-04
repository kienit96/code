<div class="cart-mini" id="cart_mini">	
	<h3 class="title_cartmini">Giỏ hàng</h3>
	<span class="close" title="Đóng lại"></span>
	<div id="cart_loader">
		<div class="inner">
		<?php if(count($_SESSION['cart'])>0){ ?>
		<ul>
		<?php 
			$sum = 0;
			$max=count($_SESSION['cart']);
			for($i=0;$i<$max;$i++){
				$pid=$_SESSION['cart'][$i]['productid'];	
				$q=$_SESSION['cart'][$i]['qty'];
				$size= $_SESSION['cart'][$i]['size'];
				$color=$_SESSION['cart'][$i]['mausac'];
				$pname = get_product_name($pid);
				$price = get_price($pid);
				$sum+=$price*$q;
				if($q==0) continue;
		?>
			<li id="mini_<?=$pid?>"><a href="<?=changeTitle($pname)?>" target="_blank"><img src="upload/product/<?=get_thumb($pid)?>" width="80" height="120" alt="<?=$pname?>" class="cart-img"></a><h3><a href="<?=changeTitle($pname)?>" target="_blank"><?=$pname?></a></h3><p class="gia"><?=number_format($price*$q,0, ',','.')?>&nbsp;₫</p><?=$size!=''?'<p>Size: '.$size.'</p>':''?><?=$color!=''?'<p>Color: '.$color.'</p>':''?><a class="cart-less">x</a><span><?=$q?></span><a class="cart-remove" data-id="<?=$pid?>" data-size="<?=$size?>" data-color="<?=$color?>" title="Xóa sản phẩm">Xóa</a></li>
		<?php } ?>
			</ul>
		<?php }else{ ?><div class="updating">Không có sản phẩm trong giỏ hàng</div><?php } ?>
		</div>
		<p class="total">Tổng giá : <b id="gio_hang_tong"><?=number_format($sum,0, ',','.')?>&nbsp;₫</b></p>
		<a href="gio-hang" class="cart-enter">Vào giỏ hàng</a>
	</div>
</div> 