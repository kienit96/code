<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "man":
	get_items();
	$template = "yahoo/items";
	break;
	case "add":
	$template = "yahoo/item_add";
	break;
	case "edit":
	get_item();
	$template = "yahoo/item_add";
	break;
	case "save":
	save_item();
	break;
	case "delete":
	delete_item();
	break;

	default:
	$template = "index";
}
function get_items(){
	global $d, $items, $paging;


	if(isset($_GET['type'])){
		$type = "&type=".$_GET['type'];
	}
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);
		if($multi=='show'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_yahoo SET hienthi =1 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=yahoo&act=man".$type);			
		}

		if($multi=='hide'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_yahoo SET hienthi =0 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=yahoo&act=man".$type);			
		}

		if($multi=='del'){
			for($i=0;$i<$count;$i++){							
				$sql = "delete from table_yahoo where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			

			}
			redirect("index.php?com=yahoo&act=man".$type);			
		}				
	}

	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_yahoo where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_yahoo SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_yahoo SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}

	$sql="SELECT count(id) AS numrows FROM #_yahoo";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];

	$pageSize=10;
	$offset=5;

	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;	

	$where = "";
	if($_GET['type'] != ""){
		$where = " where type = '".$_GET['type']."'";
	}	

	$sql = "select * from #_yahoo $where order by stt,id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link='index.php?com=yahoo&act=man'.$type;		
}
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man".$type);
	if(isset($_GET['type'])){
		$type = "&type=".$_GET['type'];
	}
	$where = "";
	if($_GET['type'] != ""){
		$where = " and type = '".$_GET['type']."'";
	}

	$sql = "select * from #_yahoo where id='".$id."'".$where;
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=yahoo&act=man".$type);
	$item = $d->fetch_array();
}
function save_item(){
	global $d;

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man".$type);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if(isset($_GET['type'])){
		$type = "&type=".$_GET['type'];
	}
	if($id){ // cap nhat
		$id =  themdau($_POST['id']);
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['yahoo'] = $_POST['yahoo'];
		$data['skype'] = $_POST['skype'];
		$data['zalo'] = $_POST['zalo'];
		$data['stt'] = $_POST['num'];
		$data['type'] = $_GET['type'];
		$data['hienthi'] = isset($_POST['active']) ? 1 : 0;
		$data['ngaysua'] = time();

		$d->setTable('yahoo');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=yahoo&act=man".$type);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=yahoo&act=man".$type);
	}else{ // them moi
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['yahoo'] = $_POST['yahoo'];
		$data['zalo'] = $_POST['zalo'];
		$data['skype'] = $_POST['skype'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['num'];
		$data['hienthi'] = isset($_POST['active']) ? 1 : 0;
		$data['ngaytao'] = time();

		$d->setTable('yahoo');
		if($d->insert($data))
			redirect("index.php?com=yahoo&act=man".$type);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=yahoo&act=man".$type);
	}
}
function delete_item(){
	global $d;
	if(isset($_GET['type'])){
		$type = "&type=".$_GET['type'];
	}
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);


		// xoa item
		$sql = "delete from #_yahoo where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=yahoo&act=man".$type);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=yahoo&act=man".$type);
	}else transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man".$type);
}
#--------------------------------------------------------------------------------------------- photo
?>