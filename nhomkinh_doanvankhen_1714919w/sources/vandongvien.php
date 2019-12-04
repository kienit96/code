<?php  if(!defined('_source')) die("Error");

		@$idc =  addslashes($_GET['idc']);
		@$idl =  addslashes($_GET['idl']);
		@$idi =  addslashes($_GET['idi']);
		@$ids =  addslashes($_GET['ids']);
		@$id =  addslashes($_GET['id']);
		#các sản phẩm khác======================
		$select_pro = " id,thumb,ten_$lang,tenkhongdau,mota_$lang ";
		//$idl = $_GET['com'];

		if($id!=''){

			$d->reset();
			$sql_detail = "select * from #_baiviet where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$id."'";
			$d->query($sql_detail);
			$row_detail = $d->fetch_array();

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['mota_'.$lang].'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';


			$d->reset();
			$sql = "select $select_pro from #_baiviet where hienthi=1 and type='".$type_bar."' and id!='".$row_detail['id']."' order by stt,ngaytao desc";
			$d->query($sql);
			$tintuc_khac = $d->result_array();

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} else {

			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' ";
			$where .= $where_tk;
			$where .= " order by stt,ngaytao desc ";

			$sql = "select $select_pro from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);


		}
		
			
?>