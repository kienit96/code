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

	$id = $_POST['id'];

	$d->reset();
	$sql_detail = "select * from #_product where type='product' and id='".$id."'";
	$d->query($sql_detail);
	$row_detail = $d->fetch_array();

	$arr_size = explode(",", $row_detail['size']);

	$d->reset();
	$sql= "select id,ten_$lang from #_tieude where type='color' and id_parent = '".$row_detail['id']."' order by id,stt desc";
	$d->query($sql);
	$arr_color = $d->result_array();
?>
<div id="sp_info">
	<div class="khung_thongtin khung_thongtin_ajax">
		<h1><?=$row_detail['ten_'.$lang]?></h1>
		<div class="gia">
			<label>Giá: </label>
			<span class="giaban"><?=$row_detail['giaban']!=0?number_format($row_detail['giaban'],0, ',', '.').'&nbsp;₫':'Liên Hệ'?></span>
			<?php if($row_detail['giacu'] != 0){ ?>&nbsp;&nbsp;<span class="giacu"><?=number_format($row_detail['giacu'],0, ',', '.')?>&nbsp;₫</span><?php } ?>
		</div>
		<?php if(count($arr_color) > 0){ ?>
			<div class="color">
				<label>Chọn màu: </label>
				<?php for ($i=0; $i < count($arr_color); $i++) { 
					$d->reset();
					$sql= "select id,photo,ten_$lang from #_tieude where type='color' and id = '".$arr_color[$i]['id']."'";
					$d->query($sql);
					$color = $d->fetch_array();
					?>
					<span data-id="<?=$color['id']?>" data-color="<?=$color['ten_'.$lang]?>" <?=$i==0?'class="active"':''?>><img src="thumb/25x25/2/<?=_upload_tieude_l.$color['photo']?>" alt="<?=$color['ten_'.$lang]?>"><?=$color['ten_'.$lang]?></span>
				<?php } ?>
			</div>
		<?php } ?>
		<?php if($row_detail['size'] != ""){ ?>
			<div class="size">
				<label>Chọn size: </label>
				<?php for ($i=0; $i < count($arr_size); $i++) { 
					$d->reset();
					$sql= "select id,ten_$lang from #_tieude where type='size' and id = '".$arr_size[$i]."'";
					$d->query($sql);
					$size = $d->fetch_array();
					?>
					<span <?=$i==0?'class="active"':''?> data-size="<?=$size['ten_'.$lang]?>"><?=$size['ten_'.$lang]?></span>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="buynow buynow_details">
			<label>Số lượng:</label>
			<input  type="number" id="quanlity_details" class="form-control input-number" value="1" min="1" max="100">
		</div>
		<div class="add_to_cart">
			<a data-pid="<?=$row_detail['id']?>" data-pqty="1" data-gia="<?=$row_detail['giaban']?>" data-loai="buy" class="buy show_giasoc">Giỏ hàng</a>
			<a data-pid="<?=$row_detail['id']?>" data-pqty="1" data-gia="<?=$row_detail['giaban']?>" data-loai="muangay" class="muangay show_giasoc">Mua ngay</a>
		</div> 
		<?php if($row_detail['mota_'.$lang]!=""){ ?><div class="mota"><?=$row_detail['mota_'.$lang]?></div><?php } ?>
		<?php if($row_detail["tags"]!=''){?>
			<div class="tags">Tags: &nbsp; <?=show_tags($row_detail["tags"],'tag')?></div>
		<?php } ?>
		<div class="addthis_inline_share_toolbox"><div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div></div>
	</div>
</div>
