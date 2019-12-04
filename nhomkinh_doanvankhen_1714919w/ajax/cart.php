<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~8192);
@define ( '_lib' , '../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."functions_giohang.php";
include_once _lib."class.database.php";
$d = new database($config['database']);

$act = magic_quote(trim(strip_tags($_POST['act'])));
switch($act){
	case "dathang":
	order();
	break;
	case "delete":
	delete();
	break;
	case "update":
	update();
	break;
	default:
	break;
}
function order()
{
	global $d;
	$id = intval($_POST['id']);
	$soluong = intval($_POST['soluong']);

	addtocart($id,$soluong);
	$return['thongbao'] = _themsanphamvaogiohangthanhcong.'.<br /><a class="xemgiohang" href="thanh-toan.html">'._giohang.'</a>';
	$return['total'] = get_order_total();
	$return['sl'] = count($_SESSION['cart']);
	echo json_encode($return);
}
function delete()
{
	global $d;
	$id = intval($_POST['id']);
	remove_product($id);	
	$return['soluong'] = count($_SESSION['cart']);
	$return['tongtien'] = number_format(get_order_total(),0, ',', '.').' đ';	
	echo json_encode($return);
}
function update()
{
	global $d;
	$soluong = intval($_POST['soluong']);
	$vitri = intval($_POST['vitri']);
	$id = intval($_POST['id']);
	$_SESSION['cart'][$vitri]['qty'] = $soluong;
	$return['tonggia'] = number_format(get_price($id)*$soluong,0, ',', '.').' đ';
	$return['tongtien'] = number_format(get_order_total(),0, ',', '.').' đ';
	echo json_encode($return);
}
?>   