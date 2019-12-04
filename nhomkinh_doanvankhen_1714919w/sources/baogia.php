<?php 
	//Thành phố
	$d->reset();
	$sql = "select id,ten_$lang from #_tieude where type='country'";
	$d->query($sql);
	$country = $d->result_array();
	//Loại xây dựng
	$d->reset();
	$sql = "select id,ten_$lang,photo from #_tieude where type='property'";
	$d->query($sql);
	$property = $d->result_array();
	
	//Thời gian dự kiến
	$d->reset();
	$sql = "select id,ten_$lang from #_tieude where type='time'";
	$d->query($sql);
	$time = $d->result_array();
	
	//Phong cách
	$d->reset();
	$sql = "select id,ten_$lang from #_tieude where type='style'";
	$d->query($sql);
	$phongcach = $d->result_array();
	
	//trình trạng
	$d->reset();
	$sql = "select id,ten_$lang from #_tieude where type='status'";
	$d->query($sql);
	$status = $d->result_array();


	if(!empty($_POST)){
		$secretKey = "6Ldgw2oUAAAAAIjKxL4Gf4ieJJ6lEsTVrGVHoKNt";
		$recaptcha = $_POST['g-recaptcha-response'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$recaptcha."&remoteip=".$ip);
		$responseKeys = json_decode($response,true);
		if(intval($responseKeys["success"]) !== 1) {
			transfer("Mã xác nhận không chính xác.", getCurrentPageURL());
		}else{
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
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			$body .= '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thông tin dự toán công trình</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Tỉnh/ Thành phố:</th><td>'.$_POST['country'].'</td>
				</tr>
				<tr>
					<th>Loại xây dựng :</th><td>'.$_POST['property'].'</td>
				</tr>
				<tr>
					<th>Trình trạng căn nhà :</th><td>'.$_POST['status'].'</td>
				</tr>
				<tr>
					<th>Diện tích :</th><td>'.$_POST['dientich'].'</td>
				</tr>
				<tr>
					<th>Kinh phí hiện có :</th><td>'.number_format($_POST["kinhphi"],0, ",", ".").'&nbsp; đ</td>
				</tr>
				<tr>
					<th>Thời gian dự tính :</th><td>'.$_POST['time'].'</td>
				</tr>
				<tr>
					<th>Vay vốn :</th><td>'.$_POST['vay'].'</td>
				</tr>
				<tr>
					<th>Phong cách :</th><td>'.$_POST['style'].'</td>
				</tr>
				<tr>
					<th>Ưu tiên :</th><td>'.$_POST['priority'].'</td>
				</tr>';
			$body .= '</table>';
			
			$data1['country'] = magic_quote($_POST['country']);
			$data1['property'] = magic_quote($_POST['property']);
			$data1['trinhtrang'] = magic_quote($_POST['status']);
			$data1['dientich'] = magic_quote($_POST['dientich']);
			$data1['kinhphi'] = (float)$_POST['kinhphi'];
			$data1['thoigian'] = magic_quote($_POST['time']);
			$data1['vay'] = magic_quote($_POST['vay']);
			$data1['style'] = magic_quote($_POST['style']);
			$data1['priority'] = magic_quote($_POST['priority']);
			$data1['ten'] = magic_quote($_POST['ten']);
			$data1['diachi'] = magic_quote($_POST['diachi']);
			$data1['dienthoai'] = magic_quote($_POST['dienthoai']);
			$data1['email'] = magic_quote($_POST['email']);
			$data1['tieude'] = magic_quote($_POST['tieude']);
			$data1['noidung'] = magic_quote($_POST['noidung']);
			$data1['type'] = 'baogia';
			$data1['ngaytao'] = time();
			$d->setTable('contact');
			$d->insert($data1);

			$mail->Body = $body;
			if($mail->Send())
			{	
				transfer("Thông tin liên hệ được gửi . Cảm ơn.", "");
			} else {
				transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "lien-he",false);
			}
		}
	}
?>