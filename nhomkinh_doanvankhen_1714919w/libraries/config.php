<?php 
	/**
	 * NINA Framework
	 * Vertion 1.0
	 * Author NINA Co.,Ltd. (nina@nina.vn)
	 * Copyright (C) 2015 NINA Co.,Ltd. All rights reserved
	*/
	if(!defined('_lib')) die("Error");

	include_once _lib."AntiSQLInjection.php";
	function nettuts_error_handler($number, $message, $file, $line, $vars)
	{
		if ( ($number !== E_NOTICE) && ($number < 2048) ) {
			include 'templates/error_tpl.php';
			die();
		}
	}
	//set_error_handler('nettuts_error_handler');
	error_reporting(0);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$config['salt']='@#$fd_!34^1111119w';
	 
	$config_url=$_SERVER["SERVER_NAME"].'/nhomkinh_doanvankhen_1714919w';
	
	$config['debug']=0;    #Bật chế độ debug dành cho developer
	$config['index']=0; 

	$config['lang']= "vi";
	$config['langs'] = array('vi'=>'Tiếng Việt','en'=>'english');
	$config['lang_img'] = array('vi'=>'vi.png','en'=>'en.png');

	$config_email="info@demo50.ninavietnam.com.vn";
	$config_pass="BaSTHSDNiF";
	$config_ip="116.193.76.23";

	$config['login']['attempt'] = 5;
	$config['login']['delay'] = 5;

	$sitekey = '6LdFh6EUAAAAADrTvPsUq_dZX3zzA0JtJhLI-nuI';
	$secretkey = '6LdFh6EUAAAAAKjpkM3IQfNJyuRcps8oOlRMwALq';


	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = '1714919w';
	$config['database']['refix'] = 'table_';
?>