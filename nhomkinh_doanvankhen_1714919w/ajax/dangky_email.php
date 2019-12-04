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
	        $d->reset();
			$sql = "select id from #_newsletter where dienthoai='".$_POST['dienthoai']."'";
			$d->query($sql);
			$maill = $d->result_array();
			
			if(count($maill)!=0){
				echo 1;
			} else {
				if(isset($_POST)){
					$data['email'] = magic_quote($_POST['email']);
					/*
					$data['dienthoai'] = magic_quote($_POST['dienthoai']);
					$data['ten'] = magic_quote($_POST['ten']);
					$data['noidung'] = magic_quote($_POST['noidung']);
					$data['diachi'] = magic_quote($_POST['diachi']);
					*/
					$data['type'] = magic_quote($_POST['type']);
					$data['hienthi'] = 0;
					$data['ngaytao'] = time();
					$d->setTable('newsletter');
					if($d->insert($data))
						echo 0;
					else
						echo 2;
				}
			}
	    } else {
	        echo 2;
	    }

	} 
?>