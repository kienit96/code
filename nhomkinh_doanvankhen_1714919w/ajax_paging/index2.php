<?php
	session_start();
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	$lang = "vi";

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	include_once _source."lang.php";
	include_once _source."template.php";

	if(isset($_POST))
  	{   
  		$where = "";
  		if($_POST['id'] != 0){
  			$where .= " and id_list = '".$_POST['id']."'";
  		}

  		$d->reset();
		$sql= "select count(*) as count from #_product where type='product' and hienthi != 0 and noibat != 0 $where order by stt,id desc ";
		$d->query($sql);
		$countp = $d->fetch_array();

		$paging = new paging_ajax();
		$paging->class_pagination = "pagination";
		$paging->class_active = "active";
		$paging->class_inactive = "inactive";
		$paging->class_go_button = "go_button";
		$paging->class_text_total = "total";
		$paging->class_txt_goto = "txt_go_button";
		$paging->per_page = 8; 	
	    $paging->page = $_POST["page"];
	    $paging->text_sql = "select id,tenkhongdau,ten_$lang,photo,masp,giacu,giaban,mota_$lang,photo1 from table_product where type='product' and hienthi != 0 and noibat != 0 $where order by stt,id desc";
	    $result_pag_data = $paging->GetResult();
		$message = "";
		$paging->data = "" . $message . "";
	} 
    if($countp['count'] > 0){ 
?>
<div class="sanpham">
	<?php while ($row = mysql_fetch_array($result_pag_data)) { ?>
	<div class="item">
      	<div class="img">
        	<a class="hover_zoom" href="<?=$row['tenkhongdau']?>"><img onerror="this.src='http://placehold.it/568x744'" src="thumb/568x744/1/<?=_upload_product_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>"></a>
        	<?=$row['giaban']!=0&&$row['giacu']!=0?'<span class="sale">'.round(((($row['giacu']-$row['giaban'])/$row['giacu'])*100),0).'% OFF</span>':''?>
      	</div>
      	<div class="noidung">
          	<h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3>
          	<div class="gia">
              	<?php if($row['giaban'] != 0) { ?><span class="giaban"><?=number_format($row['giaban'],0, ',', '.')?>đ</span>
              	<?php }else{ ?><span class="giaban">Liên Hệ</span><?php } ?>
          		<?php if($row['giacu'] != 0){?><span class="giacu"><?=number_format($row['giacu'],0, ',', '.')?>đ</span><?php } ?>
          	</div> 
      	</div>
    </div>
	<?php } ?>
</div>
<?php if($countp['count'] > $paging->per_page){ echo $paging->Load(); }?>
<?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>