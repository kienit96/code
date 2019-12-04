<?php if(!defined('_source')) die("Error");

$d->reset();
$sql = "select noidung_$lang,title,keywords,description,mota_$lang from #_info where type='".$type_bar."' ";
$d->query($sql);
$row_detail = $d->fetch_array();

if(!empty($_POST)){
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
			include_once "phpMailer/class.phpmailer.php";	
			$mail = new PHPMailer();
			$mail->IsSMTP(); // Gọi đến class xử lý SMTP
			$mail->Host       = $config_ip; // tên SMTP server
			$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
			$mail->Username   = $config_email; // SMTP account username
			$mail->Password   = $config_pass;  
			//Thiet lap thong tin nguoi gui va email nguoi gui
			$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
			$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
			/*=====================================
			 * THIET LAP NOI DUNG EMAIL
			*=====================================*/
			//Thiết lập tiêu đề
			$mail->Subject    = '['.$_POST['ten'].']';
			$mail->IsHTML(true);
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr> 
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			$data1['ten'] = magic_quote($_POST['ten']);
			$data1['diachi'] = magic_quote($_POST['diachi']);
			$data1['dienthoai'] = magic_quote($_POST['dienthoai']);
			$data1['email'] = magic_quote($_POST['email']);
			$data1['tieude'] = magic_quote($danhmuc);
			$data1['noidung'] = magic_quote($_POST['noidung']);
			$data1['type'] = $_POST['type'];
			$data1['ngaytao'] = time();
			$d->setTable('contact');
			$d->insert($data1);

			$mail->Body = $body;
			if($data1['photo']){
				$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
			}
			if($mail->Send())
			{	
				transfer("Thông tin liên hệ được gửi . Cảm ơn.",$pageURL);
			} else {
				transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.","",false);
			}
	    } else {
	        transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi","",false);
	    }

	} 
}
?>