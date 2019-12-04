<?php	if(!defined('_source')) die("Error");
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	switch($act){
		case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
		case "save":
		save_gioithieu();
		break;

		default:
		$template = "index";
	}
	function get_gioithieu(){
		global $d, $item;
		$sql = "select * from #_setting limit 0,1";
		$d->query($sql);
		//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
		$item = $d->fetch_array();
	}
	function save_gioithieu(){
		global $d,$arr_lang;
		$file_name=images_name($_FILES['file']['name']);
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		$data['oaid'] = $_POST['oaid'];
		foreach ($arr_lang as $key => $l) {
			$data['ten_'.$l] = $_POST['ten_'.$l];
			$data['slogan_'.$l] = $_POST['slogan_'.$l];
			$data['diachi_'.$l] = $_POST['diachi_'.$l];
		}	
		if (!empty($_FILES['dongdau']['name'])) {
			delete_file('../upload/watermark.png');
			$watermark = upload_image("dongdau", 'png|PNG', '../upload/','watermark');
			clear();
		}
		if (!empty($_FILES['imgmap']['name'])) {
			delete_file('../upload/map.png');
			delete_file('../upload/map_thumb.png');
			$map = upload_image("imgmap", 'png', '../upload/','map');
			create_thumb($map, 575, 350, '../upload/','map_thumb','png');
			clear();
		}
		$data['datve'] = $_POST['datve'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['website'] = $_POST['website'];
		$data['link_map'] = $_POST['link'];
		$data['toado'] = $_POST['toado'];
		$data['phuongthuc'] = $_POST['phuongthuc'];
		$data['facebook'] = $_POST['facebook'];
		$data['googleplus'] = $_POST['googleplus'];
		$data['toado'] = $_POST['toado'];
		$data['hotline'] = $_POST['hotline'];
		$data['giomocua'] = $_POST['giomocua'];
		$data['hotrokh'] = $_POST['hotrokh'];
		$data['goiga'] = $_POST['goiga'];
		$data['tuvan'] = $_POST['tuvan'];

		$data['page1'] = $_POST['page1'];
		$data['page2'] = $_POST['page2'];

		$data['code_head'] = magic_quote($_POST['code_head']);
		$data['code_body'] = magic_quote($_POST['code_body']);
		$data['code_footer'] = magic_quote($_POST['code_footer']);
		$data['analytics'] = magic_quote($_POST['analytics']);
		$data['vchat'] = magic_quote($_POST['vchat']);
		$data['iframe_map'] = magic_quote($_POST['iframe']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];							

		$d->reset();
		$d->setTable('setting');
		if($d->update($data))
			redirect("index.php?com=setting&act=capnhat");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
	}
	function clear(){
		$dir = "../nina@#cache";
		// Open a directory, and read its contents
		if (is_dir($dir)){
			if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false){
					if($file != '.htaccess' && $file != 'index.html'){
						unlink($dir.'/'.$file);
					}
				}
				closedir($dh);
			}
		}
	}
?>