<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	switch($type){
		//-------------product------------------
		case 'product':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					$config_quangcao = "false";
					$config_noibat = "true";
					$config_menu = "true";
					$config_left = "false";
					$mapx = "false";
					$mau = "false";
					$config_mota = "false";
					$config_mota_ck = "false";
					$config_img = "false";
					@define ( _width_thumb , 40 );
					@define ( _height_thumb , 40 );
					@define ( _width_thumb_qc , 590 );
					@define ( _height_thumb_qc , 210 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'cat':
					$title_main = "Danh mục cấp 2";
					$config_images = "false";
					$config_mota= "false";
					$config_mota_ck = "false";
					$config_noibat = "false";
					$mapx  = "false";
					@define ( _width_thumb , 50 );
					@define ( _height_thumb , 50 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'item':
					$title_main = "Danh mục cấp 3";
					$config_images = "false";
					$config_mota= "false";
					@define ( _width_thumb , 24 );
					@define ( _height_thumb , 18 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Sản Phẩm";
					$config_images = "true";
					$config_img = "true";
					$config_mota= "true";
					$config_mota_ck = "true";
					$config_list = "true";
					$config_cat = "false";
					$config_item = "false";
					$config_sub = "false";
					$config_thuonghieu = "false";
					$config_noidung = "true";
					$config_thongso = "false";
					$config_khuyenmai = "false";
					$config_baohanh = "false";
					$config_noibat = "true";
					$config_banchay = "false";
					$config_name = "false";
					$config_banchay2 = "false";
					$config_toptk = "false";
					$config_bds = "false";
					$giaban = "true";
					$giacu = "true";
					$giasi = "false";
					$masp = "true";
					$mausac = "false";
					$size = "false";
					$tag = "false";	
					$rate = "false";
					$soluong = "false";	
					$config_seos = "false";	
					@define ( _width_thumb , 260 );
					@define ( _height_thumb , 230 );
					@define ( _style_thumb , 2 );
					$ratio_ = 2;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'tintuc':
			$title_main = "Tin tức";
			$config_ten = "true";
			$config_name = "false";
			$config_images = "true";
			$config_img = "false";
			$config_mota = "true";
			$config_noidung = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			$config_seo = "true";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
			break;
		case 'dichvu':
			$title_main = "Dịch vụ";
			$config_ten = "true";
			$config_name = "false";
			$config_images = "true";
			$config_img = "false";
			$config_mota = "true";
			$config_noidung = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			$config_seo = "true";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
			break;
		case 'tuyendung':
			$title_main = "Tuyển Dụng";
			$config_ten = "true";
			$config_name = "false";
			$config_images = "true";
			$config_img = "false";
			$config_mota = "true";
			$config_noidung = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			$config_seo = "true";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
			break;
		case 'chinhsach':
			$title_main = "Chính Sách";
			$config_ten = "true";
			$config_name = "false";
			$config_images = "true";
			$config_mota = "true";
			$config_noidung = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			$config_seo = "true";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 250 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tuvan':
			$title_main = "Tư Vấn";
			$config_ten = "true";
			$config_name = "false";
			$config_images = "true";
			$config_mota = "true";
			$config_noidung = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			$config_seo = "true";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 250 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'visao':
			$title_main = "Vì sao chọn chúng tôi";
			$config_ten = "true";
			$config_url = "false";
			$config_name = "false";
			$config_images = "true";
			$config_mota = "true";
			$config_noidung = "false";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			$config_seo = "false";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 86 );
			@define ( _height_thumb , 86 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'hethong':
			$title_main = "Hệ Thống";
			$config_ten = "true";
			$config_url = "false";
			$config_name = "false";
			$config_images = "false";
			$config_mota = "true";
			$config_noidung = "false";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			$config_seo = "false";
			$config_seos = "false";
			$color = "false";
			$link = "false";
			@define ( _width_thumb , 55 );
			@define ( _height_thumb , 55 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------info------------------
		case 'lienhe':
			$config_mota = "false";
			$config_mota_ck = "false";
			$config_noidung = "true";
			break;
		case 'gioithieu':
			$title_main = 'Giới thiệu';
			$config_ten = 'true';
			$config_name = 'true';
			$config_url = 'false';
			$config_mota = 'true';
			$config_mota_ck = 'true';
			$config_noidung = "true";
			$config_images = "true";
			$config_img = "true";
			$config_seo = "true";
			@define ( _width_thumb , 490 );
			@define ( _height_thumb , 420 );
			@define ( _width_thumb_img , 88 );
			@define ( _height_thumb_img , 88 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'footer':
			$title_main = 'Thông tin footer';
			$config_ten = 'false';
			$config_mota = 'false';
			$config_noidung = "true";
			$config_images = "false";
			$config_seo = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 505 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'nhantin':
			$title_main = 'Đăng ký nhận tin';
			$config_ten = 'true';
			$config_name = 'true';
			$config_url = 'false';
			$config_mota = 'true';
			$config_mota_ck = 'true';
			$config_noidung = "false";
			$config_images = "false";
			$config_seo = "false";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tags':
			$title_main = 'tags';
			$config_ten = 'true';
			break;
		// background
		case 'logo':
			$title_main = 'Logo';
			@define ( _width_thumb , 255 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'banner':
			$title_main = 'Banner';
			@define ( _width_thumb , 650 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$config_hienthi = 'false';
			$links = 'false';
			$ratio_ = 1;
			break;
		case 'favicon':
			$title_main = 'Favicon';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'body':
			$title_main = 'background website';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bghead':
			$title_main = 'background header';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 175 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bgsanpham':
			$title_main = 'background sản phẩm';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bgnhantin':
			$title_main = 'background nhận tin';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bgcongtrinh':
			$title_main = 'background công trình';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$config_mota = "false";
			$config_noidung = "false";
			$config_icon = "false";
			$links = "true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 460 );	
			//@define ( _width_thumb_icon , 320 );
			//@define ( _height_thumb_icon , 210 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'quangcao':
			$title_main = "Quảng Cáo";
			$config_mota = "false";
			$config_noidung = "false";
			$config_icon = "false";
			$links = "true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 350 );	
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'congtrinh':
			$title_main = "Công trình";
			$config_mota = "true";
			$config_noibat = "true";
			$config_mota_ck = "false";
			$config_images = "true";
			$config_img = "true";
			$config_noidung = "false";
			$config_icon = "false";
			$links = "false";
			@define ( _width_thumb , 585 );
			@define ( _height_thumb , 272 );	
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bocongthuong':
		    $title_main = "Bộ công thương";
		    $config_hienthi = "true";
			@define ( _width_thumb , 116 );
			@define ( _height_thumb , 45 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links = "true";
			break;	
		case 'mangxh':
		    $title_main = "Mạng xã hội";
		    $config_images = "true";
			@define ( _width_thumb , 41 );
			@define ( _height_thumb , 41 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'lienket':
		    $title_main = "Liên kết website";
			@define ( _width_thumb , 30 );
			@define ( _height_thumb , 30 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'lkchat':
		    $title_main = "Liên kết trái";
			@define ( _width_thumb , 39 );
			@define ( _height_thumb , 39 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		//--------------defaut---------------
		case 'thanhtoan':
		    $title_main = "Hình thức thanh toán";
		    $config_images = "false";
		    $config_name = "false";
		    $config_url = "false";
		    $config_noidung = "true";
		    $config_seo = "false";
			break;
		default: 

			$source = "";

			$template = "index";

			break;

	}

	

?>