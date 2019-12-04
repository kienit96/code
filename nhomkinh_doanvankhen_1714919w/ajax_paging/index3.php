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

	if(isset($_POST))
  	{    
  		$where = "";
  		if($_POST['id'] != 0){
  			$where = " and id_list = '".$_POST['id']."'";

  			$d->reset();
			$sql = "select id,tenkhongdau,ten_$lang from #_product_list where type='product' and id = '".$_POST['id']."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();
  		}


  		$d->reset();
		$sql = "select id,tenkhongdau,ten_$lang,photo,giacu,giaban from #_product where type='product' and hienthi=1 and noibat != 0 $where order by stt,id desc limit 0,8";
		$d->query($sql);
		$product = $d->result_array();

	} 
    if(count($product) > 0){ 
?>
	<div class="sanpham">
		<?php foreach ($product as $key => $row) { ?>
		<div class="item">
			<div class="bao_item">
		      	<div class="img">
		        	<a class="hover_zoom" href="<?=$row['tenkhongdau']?>"><img onerror="this.src='https://placehold.it/520x460'" src="thumb/520x460/1/<?=_upload_product_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>"></a>
		      	</div>
		      	<div class="noidung">
		          	<h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3>
		          	<div class="gia">Giá:&nbsp;
		              	<?php if($row['giaban'] != 0) { ?><span class="giaban"><?=number_format($row['giaban'],0, ',', '.')?>đ</span>
		              	<?php }else{ ?><span class="giaban">Liên Hệ</span><?php } ?>
		          		<?php if($row['giacu'] != 0){?><span class="giacu"><?=number_format($row['giacu'],0, ',', '.')?>đ</span><?php } ?>
		          	</div> 
		      	</div>
	      	</div>
	    </div>
		<?php } ?>
	</div>
	<?php if($_POST['id'] != 0){ ?><a class="xemtatca" href="<?=$row_detail['tenkhongdau']?>">Xem thêm sản phẩm [ + ]</a><?php } ?>
<?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>