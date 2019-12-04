<?php if(!defined('_source')) die("Error");
		
		$d->reset();
		$sql = "select ten_$lang,id from #_tieude where hienthi=1 and type='chuyenphat' order by stt,id desc ";
		$d->query($sql);
		$row_chuyenphat = $d->result_array();

		$d->reset();
		$sql = "select * from #_tinh where hienthi=1 order by stt,id desc ";
		$d->query($sql);
		$tinhthanh = $d->result_array();

		if(!empty($_POST)){
		
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

			$data1['ten'] = $_POST['ten'];
			$data1['diachi'] = $_POST['diachi'];
			$data1['dienthoai'] = $_POST['dienthoai'];
			$data1['email'] = $_POST['email'];
			$data1['tieude'] = $_POST['tieude'];
			$data1['noidung'] = $_POST['noidung'];
			$data1['stt'] = $_POST['stt'];

			$data1['ngaytao'] = time();
			$d->setTable('contact');
			$d->insert($data1);

				
			$mail->Body = $body;

			if($data1['photo']){
				$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
			}
		
			
			if($mail->Send())
			{	
				transfer("Thông tin liên hệ được gửi . Cảm ơn.", "trang-chu.html");
			} else {
				transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "lien-he.html",false);
			}
		}
			
	
?>