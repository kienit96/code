<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');
	if(!isset($_SESSION['lang'])){ $_SESSION['lang']='vi'; }
	$lang = $_SESSION['lang'];

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
  	include_once _lib."class.database.php";
  	$d = new database($config['database']);
  	include_once _source."lang.php";
  	include_once _source."template.php";
	include_once _lib."functions_giohang.php";
	$pageURL=getCurrentPageURL();

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
	    // Build POST request:
	    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	    $recaptcha_secret = $secretkey;
	    $recaptcha_response = $_POST['recaptcha_response'];
	    // Make and decode POST request:
	    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	    $recaptcha = json_decode($recaptcha);
	    // Take action based on the score returned:
	    if ($recaptcha->score >= 0.9) {
	    	$ten_input=$_POST['ten'];
			$diachi_input=$_POST['diachi'];
			$dienthoai_input=$_POST['dienthoai'];
			$email_input=$_POST['email'];
			$noidung_input=$_POST['noidung'];
			$phuongthuc_input=$_POST['phuongthuc'];
			$tinhthanh=$_POST['tinhthanh'];
			$phivanchuyen=$_POST['phivanchuyen'];
			$quanhuyen=$_POST['quanhuyen'];
			if($_POST['phivanchuyen']==0) $phi_vc = 'Miển phí'; else $phi_vc = number_format ($_POST['phivanchuyen'],0,",",",").' đ';
			if($_POST['email'] != ''){
				include_once "../phpMailer/class.phpmailer.php";	
				$mail = new PHPMailer();
				$mail->IsSMTP(); // Gọi đến class xử lý SMTP
				$mail->Host       = $config_ip; // tên SMTP server
				$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
				$mail->Username   = $config_email; // SMTP account username
				$mail->Password   = $config_pass;  
				//Thiet lap thong tin nguoi gui va email nguoi gui
				$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
				$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
				$mail->AddAddress($email_input, $ten_input);
				/*=====================================
				 * THIET LAP NOI DUNG EMAIL
				*=====================================*/
				//Thiết lập tiêu đề
				$mail->Subject    = '['.$_POST['ten'].']';
				$mail->IsHTML(true);
				//Thiết lập định dạng font chữ
				$mail->CharSet = "utf-8";	
				$body = '<table border="0" width="100%">';
				$body .= '
				<tr>
				<th align="left" colspan="2">
				<table width="100%">
				<tr>
				<td><font size="4">Thông tin đặt hàng từ website <a href="http://www.'.$config_url.'">www.'.$config_url.'</a></font> 
				</td>
				</tr>
				</table>
				</th>
				</tr>
				<tr>
				<th width="30%" align="left">Họ tên :</th>
					<td>&nbsp; '.$_POST['ten'].'</td>
				</tr>
				<tr>
				<th align="left">Email :</th>
					<td>&nbsp; '.$_POST['email'].'</td>
				</tr>
				<tr>
				<th align="left">Điện thoại :</th>
					<td>&nbsp; '.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
				<th align="left">Địa chỉ :</th>
					<td>&nbsp; '.$_POST['diachi'].'</td>
				</tr>
				<tr>
				<th align="left">Phương thức thanh toán :</th>
					<td>&nbsp; '.$_POST['phuongthuc'].'</td>
				</tr>
				<tr>
				<th align="left">Phí vận chuyển:</th>
					<td>&nbsp; '.$phi_vc.'</td>
				</tr>
				<tr>
				<th align="left">Nội dung :</th>
					<td >&nbsp; '.$_POST['noidung'].'</td>
				</tr>
				<tr>
				<th align="left" colspan="2">&nbsp;</th>
				</tr>
				';

				$body.='
				<tr>
				<td height="19" colspan="2" align="right" valign="top" class="content" style="background: #D2E6DD;"><span class="cat"></span>
				<table border="1" bordercolor="#0099CC" align="center" cellpadding="5px" cellspacing="5px" width="100%">';
				if(is_array($_SESSION['cart']))
				{
					$body.='<tr bgcolor="#16AAB8"><td>Thứ tự</td><td>Hình ảnh</td><td>Tên</td><td>Giá</td><td>Số lượng</td><td>Tổng giá</td></tr>';
					$max=count($_SESSION['cart']);
					for($i=0;$i<$max;$i++){
						$pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];
						$pname=get_product_name($pid);

						if($q==0) continue;
						$body.='<tr><td>'.($i+1).'</td>';
						$body.='<td> <a href="http://'.$config_url.'/'.changeTitle($pname).'" target="_blank"><img src="http://'.$config_url.'/upload/product/'.get_thumb($pid).'" width="70" /></a></td>';
						$body.='<td><a href="http://'.$config_url.'/'.changeTitle($pname).'" target="_blank">'.$pname.'</a></td>';
						$body.='<td>'.number_format(get_price($pid),0, ',', '.').'&nbsp;đ</td>';
						$body.='<td>'.$q.'</td>';                    
						$body.='<td>'.number_format(get_price($pid)*$q,0, ',', '.') .'&nbsp;đ</td>
						</tr>';
					}
					$body.='<tr><td colspan="6">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr><td> '; 
					$body.='<b> Tổng giá : '. number_format(get_order_total(),0, ',', '.') .' &nbsp;đ</b></td>
					</tr>
					</table>
					</td></tr>';
					$body.='<tr><td colspan="6">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr><td> '; 
					$body.='<b> Phí vận chuyển : '. number_format($phivanchuyen,0, ',', '.') .' &nbsp;đ</b></td>
					</tr>
					</table>
					</td></tr>';
					$body.='<tr><td colspan="6">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr><td> '; 
					$body.='<b> Thanh Toán : '. number_format(get_order_total()+$phivanchuyen,0, ',', '.') .' &nbsp;đ</b></td>
					</tr>
					</table>
					</td></tr>';
				}
				else{
					$body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
				}
				$body.=' </table><span class="cat"></span>
				</td>
				</tr>';
				$body.='
				<tr>
				<th align="left" colspan="2">&nbsp;</th>
				</tr>
				<tr><td colspan="2" align="left">
				<p><h2>'.$row_setting['ten_'.$lang].'</h2></p>
				<p>Địa chỉ : '.$row_setting['diachi_'.$lang].'</p>
				<p>Điện thoại : '.$row_setting['dienthoai'].'</p>
				<p>Email : '.$row_setting['email'].'</p>
				<p>Website : <a href="http://'.$config_url.'/">'.$row_setting['ten_'.$lang].'</a></p>
				<td> <tr>'; 
				$body .= '</table>';
				$mail->Body = $body;
				$mail->Send();
			}
			$mahoadon = madonhang('DH','order');
			$ngaydangky = time();
			$tonggia = get_order_total();
			$mathanhvien = $_SESSION['login']['mathanhvien'];
			$sql = "INSERT INTO  table_order (madonhang,hoten,dienthoai,diachi,email,httt,tonggia,noidung,ngaytao,trangthai,tinhthanh,quanhuyen,phivanchuyen,mathanhvien)  VALUES ('$mahoadon','$ten_input','$dienthoai_input','$diachi_input','$email_input','$phuongthuc_input','$tonggia','$noidung_input','$ngaydangky','1','$tinhthanh','$quanhuyen','$phivanchuyen','$mathanhvien')";
			mysql_query($sql);
			$id_order = mysql_insert_id();
			$max=count($_SESSION['cart']);
			$dem = 0;
			for($i=0;$i<$max;$i++){
				$pid = $_SESSION['cart'][$i]['productid'];
				$q = $_SESSION['cart'][$i]['qty'];
				$size = $_SESSION['cart'][$i]['size'];
				$color = $_SESSION['cart'][$i]['mausac'];
				$pname = get_product_name($pid);
				$gia = get_price($pid);
				//soluongsp($pid,-$q);
				if($q==0) continue;
				$data1['id_product'] = (int)$pid;
				$data1['id_order'] = (int)$id_order;
				$data1['ten'] = magic_quote($pname);
				$data1['gia'] = (float)$gia;
				//$data1['size'] = magic_quote($size);
				//$data1['color'] = magic_quote($color);
				$data1['soluong'] = (int)$q;
				$d->setTable('order_detail');	
				if($d->insert($data1)){
					$dem++;
				}
			}
			if($dem == $max){
				echo 1;
				unset($_SESSION['cart']);
			}else{
				echo 0;
			}
	    }else{
	    	echo 0;
	    }
	}

?>