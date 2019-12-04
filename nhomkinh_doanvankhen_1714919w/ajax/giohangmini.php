<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_lib' , '../libraries/');

	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$sum=0;
	
	$data = "<ul>";
	$max = count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){ 
		$pid=$_SESSION['cart'][$i]['productid'];	
		$q=$_SESSION['cart'][$i]['qty'];
		$pname = get_product_name($pid);
		$price = get_price($pid);
		$note = "";
		$size=$_SESSION['cart'][$i]['size'];
		$color=$_SESSION['cart'][$i]['mausac'];
		if($size != ''){
			$note .= "<p>Size: ".$size."</p>";
		}
		if($color != ''){
			$note .= "<p>color: ".$color."</p>";
		}
		$sum+=$price*$q;
		if($q==0) continue;
		$data .= '<li id="mini_'.$pid.'"><a href="'.changeTitle($pname).'" target="_blank"><img src="upload/product/'.get_thumb($pid).'" width="80" height="120" alt="'.$pname.'" class="cart-img"></a><h3><a href="'.changeTitle($pname).'" target="_blank">'.$pname.'</a></h3><p class="gia">'.number_format($price*$q,0, ',', '.').'&nbsp;₫</p>'.$note.'<a class="cart-less">x</a><span>'.$q.'</span><a class="cart-remove" data-id="'.$pid.'" data-color="'.$color.'" data-size="'.$size.'" title="Xóa sản phẩm">Xóa</a></li>';
	}
	$data .= "</ul>";
    $total = number_format($sum,0, ',','.').'&nbsp;đ';
	$result = array('data' => $data,'total' => $total);
	echo json_encode($result);
?>