<?php  if(!defined('_source')) die("Error");
	$d->reset();
	@$id =  addslashes($_GET['id']);
	#các sản phẩm khác======================
	$sql_sort = " order by id,stt desc ";
	if($id!=''){
		$sql="select * from #_tags where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$per_page = 20; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;

		$where = " #_product where hienthi=1 and FIND_IN_SET(".$row_detail['id'].",tags) ".$sql_sort;
		$sql = "select * from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);	

		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
	} else{
		redirect('san-pham');
	}
?>