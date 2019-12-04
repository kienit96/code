<?php  if(!defined('_source')) die("Error");
	$id =  addslashes($_GET['id']);

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang,photo,color from #_baiviet where hienthi=1 and type = '".$type_bar."' order by stt asc";
	$d->query($sql);
	$baiviet = $d->result_array();
	
	if($id!=''){
		$sql = "select * from #_baiviet where hienthi=1 and tenkhongdau='".$id."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
		$share_facebook .= '<meta property="og:type" content="website" />';
		$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
		$share_facebook .= '<meta property="og:description" content="'.$row_detail['mota_'.$lang].'" />';
		$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';

		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	}else{
		$d->reset();
		$sql = "select * from #_baiviet where hienthi=1 and id='".$baiviet[0]['id']."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();
	}
?>