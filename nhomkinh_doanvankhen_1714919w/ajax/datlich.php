<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

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
	        if(isset($_POST)){
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
				/*=====================================
				 * THIET LAP NOI DUNG EMAIL
				*=====================================*/
				//Thiết lập tiêu đề
				$mail->Subject    = 'Mail đặc lịch hẹn';
				$mail->IsHTML(true);
				//Thiết lập định dạng font chữ
				$mail->CharSet = "utf-8";	
				$body = '<table>';
				$body .= '
					<tr> 
						<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
						<th colspan="2">Thư đặt lịch từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
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
						<th>Dịch vụ :</th><td>'.$_POST['dichvu'].'</td>
					</tr>
					<tr>
						<th>Thời gian :</th><td>'.$_POST['thoigian'].'</td>
					</tr>';
				$body .= '</table>';
				$mail->Body = $body;
				if($mail->Send())
				{	
					$data['email'] = magic_quote($_POST['email']);
					$data['ten'] = magic_quote($_POST['ten']);
					$data['dienthoai'] = magic_quote($_POST['dienthoai']);
					$data['diachi'] = magic_quote($_POST['diachi']);
					$data['tieude'] = magic_quote($_POST['dichvu']); 
					$data['noidung'] = $_POST['thoigian'];
					$data['type'] = magic_quote($_POST['type']);
					$data['hienthi'] = 0;
					$data['ngaytao'] = time();
					$d->setTable('newsletter');
					if($d->insert($data)){
						echo 1;
					}
					else{
						echo 0;
					}
				} else {
					echo 0;
				}
			}
	    } else {
	        echo 0;
	    }

	} 
?>