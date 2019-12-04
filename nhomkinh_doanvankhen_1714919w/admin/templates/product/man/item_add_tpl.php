<script type="text/javascript">
	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'product_photo';
			var value = $(this).val();
			var ten = 'stt';
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value,ten: ten},
				success: function(result) {
				}
			});
		});
		$('.delete_images').click(function(){
			if (confirm('Bạn có muốn xóa hình này ko ? ')) {
				var id = $(this).attr('title');
				var table = 'product_photo';
				var links = "../upload/product/";
				$.ajax ({
					type: "POST",
					url: "ajax/delete_images.php",
					data: {id:id,table:table,links:links},
					success: function(result) { 
					}
				});
				$(this).parent().slideUp();
			}
			return false;
		});
		$('.themmoi').click(function(e) {
			$.ajax ({
				type: "POST",
				url: "ajax/khuyenmai.php",
				success: function(result) { 
					$('.load_sp').append(result);
				}
			});
		});
		$('.delete').click(function(e) {
			$(this).parent().remove();
		});
		
	});
	$(function(){
		$(".states").select2();
        $(".states_tags").change(function(){
        	$tags = $(this).val();
        	
        	if($tags>0){
        		$("#states_tags .tags_name").append("<p class='delete_tags'>"+$("#states_tags option:selected").text()+"<input name='tags[]' value='"+$tags+"'  type='hidden' /> <span></span> </p>");
        	}
        	$("#states_tags .delete_tags span").click(function(){
        		$(this).parent().remove();
        	});
        });
        $(".states_size").change(function(){
        	$tags = $(this).val();
        	
        	if($tags>0){
        		$("#states_size .tags_name").append("<p class='delete_tags'>"+$("#states_size option:selected").text()+"<input name='sizes[]' value='"+$tags+"'  type='hidden' /> <span></span> </p>");
        	}
        	$("#states_size .delete_tags span").click(function(){
        		$(this).parent().remove();
        	});
        });
        $(".states_color").change(function(){
        	$tags = $(this).val();
        	
        	if($tags>0){
        		$("#states_color .tags_name").append("<p class='delete_tags'>"+$("#states_color option:selected").text()+"<input name='colors[]' value='"+$tags+"'  type='hidden' /> <span></span> </p>");
        	}
        	$("#states_color .delete_tags span").click(function(){
        		$(this).parent().remove();
        	});
        });
        $(".delete_tags span").click(function(){
        	$(this).parent().remove();
        });

        $("#tinhthanh").change(function(event) {
        	/* Act on the event */
        	var id_tinh = $(this).val();
        	$.ajax({
        		url: 'ajax/tinhthanh.php',
        		type: 'POST',
        		data: {id_tinh: id_tinh},
        		success:function(data){
        			$('#quanhuyen').html(data);
        		}
        	});
        });
        $("#quanhuyen").change(function(event) {
        	/* Act on the event */
        	var id_tinh = $(this).val();
        	$.ajax({
        		url: 'ajax/quanhuyen.php',
        		type: 'POST',
        		data: {id_tinh: id_tinh},
        		success:function(data){
        			$('#phuong').html(data);
        		}
        	});
        });
        $("#phuong").change(function(event) {
        	/* Act on the event */
        	var id_ward = $(this).val();
        	$.ajax({
        		url: 'ajax/street.php',
        		type: 'POST',
        		data: {id_ward: id_ward},
        		success:function(data){
        			$('#duong').html(data);
        		}
        	});
        });
    });
	
</script>
<?php
function get_main_list()
{
	global $item;
	$sql="select * from table_product_list where type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_list" name="id_list" data-level="0" data-type="'.$_GET['type'].'" data-table="table_product_cat" data-child="id_cat" class="main_select select_danhmuc">
	<option value="">Chọn danh mục 1</option>';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		if($row["id"]==(int)@$item["id_list"])
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
	}
	$str.='</select>';
	return $str;
}
function get_main_thuonghieu()
{
	global $item;
	$sql="select * from table_tieude where type='thuonghieu' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_thuonghieu" name="id_thuonghieu" class="main_select select_danhmuc">
	<option value="">Chọn thương hiệu</option>';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		if($row["id"]==(int)@$item["id_thuonghieu"])
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
	}
	$str.='</select>';
	return $str;
}

function get_main_cat()
{
	global $item;
	$sql="select * from table_product_cat where id_list='".$item['id_list']."' and type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_cat" name="id_cat" data-level="1" data-type="'.$_GET['type'].'" data-table="table_product_item" data-child="id_item" class="main_select select_danhmuc">
	<option value="">Chọn danh mục 2</option>';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		if($row["id"]==(int)@$item["id_cat"])
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
	}
	$str.='</select>';
	return $str;
}
function get_main_item()
{
	global $item;
	$sql="select * from table_product_item where id_cat='".$item['id_cat']."' and type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_item" name="id_item" data-level="2" data-type="'.$_GET['type'].'" data-table="table_product_sub" data-child="id_sub" class="main_select select_danhmuc">
	<option value="">Chọn danh mục 3</option>';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		if($row["id"]==(int)@$item["id_item"])
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
	}
	$str.='</select>';
	return $str;
}
function get_main_sub()
{
	global $item;
	$sql="select * from table_product_sub where id_item='".$item['id_item']."' and type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_sub" name="id_sub" class="main_select">
	<option value="">Chọn danh mục 3</option>';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		if($row["id"]==(int)@$item["id_sub"])
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
	}
	$str.='</select>';
	return $str;
}

if($tag == "true"){
	//------------ tags-------------------------
	if($item['tags']!=''){
		$tags = explode(",", $item['tags']) ;
		$sql = "select id,ten_vi from #_tags where id<>'".$tags[0]."'";
		for ($i=1,$count = count($tags); $i < $count ; $i++) { 
			$sql .=" and id<> '".$tags[$i]."'";
		}
	} else {
		$sql = "select id,ten_vi from #_tags";
	}
	$d->query($sql);
	$tags_arr = $d->result_array();
	//------------end tags---------------
}
if($size == "true"){
	//------------ Size -------------------------
	if($item['size']!=''){
		$sizes = explode(",", $item['size']) ;
		$sql = "select id,ten_vi from #_tieude where type='size' and id<>'".$sizes[0]."'";
		for ($i=1,$count = count($sizes); $i < $count ; $i++) { 
			$sql .=" and id<> '".$sizes[$i]."'";
		}
	} else {
		$sql = "select id,ten_vi from #_tieude where type='size'" ;
	}
	$d->query($sql);
	$size_arr = $d->result_array();
	//------------end size---------------
}
if($mausac == "true"){
	//------------ color -------------------------
	if($item['color']!=''){
		$colors = explode(",", $item['color']) ;
		$sql = "select id,ten_vi from #_tieude where type='color' and id<>'".$colors[0]."'";
		for ($i=1,$count = count($colors); $i < $count ; $i++) { 
			$sql .=" and id<> '".$colors[$i]."'";
		}
	} else {
		$sql = "select id,ten_vi from #_tieude where type='color'" ;
	}
	$d->query($sql);
	$color_arr = $d->result_array();
	  //------------end color---------------
}

$d->reset();
$sql = "select * from #_tieude where hienthi=1 and type='huongnha' order by stt asc";
$d->query($sql);
$huongnha = $d->result_array();

$d->reset();
$sql = "select * from #_tieude where hienthi=1 and type='duan' order by stt asc";
$d->query($sql);
$duan = $d->result_array();

$d->reset();
$sql = "select * from #_tieude where hienthi=1 and type='sophongngu' order by stt asc";
$d->query($sql);
$sophongngu = $d->result_array();

$d->reset();
$sql = "select * from #_tieude where hienthi=1 and type='mucdich' order by stt asc";
$d->query($sql);
$mucdich = $d->result_array();

$d->reset();
$sql = "select * from #_place_city where hienthi=1 order by stt asc";
$d->query($sql);
$tinhthanh = $d->result_array();

$d->reset();
$sql = "select * from #_place_dist where hienthi=1 order by stt asc";
$d->query($sql);
$quanhuyen = $d->result_array();

$d->reset();
$sql = "select * from #_place_ward where hienthi=1 and id_dist='".$item['quanhuyen']."' order by stt asc";
$d->query($sql);
$phuongxa = $d->result_array();

$d->reset();
$sql = "select * from #_place_street where hienthi=1 and id_ward='".$item['phuongxa']."' order by stt asc";
$d->query($sql);
$street = $d->result_array();

?>
<div class="wrapper">
	<div class="control_frm">
		<div class="bc">
			<ul id="breadcrumbs" class="breadcrumbs">
				<li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm <?=$title_main?></span></a></li>
				<li class="current"><a href="#" onclick="return false;">Thêm</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="title chonngonngu">
				<ul>
				<?php foreach ($arr_lang as $key => $l) { ?>
					<li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS" title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" /><?=$config['langs'][$l]?></a></li>
				<?php } ?>
				</ul>
			</div>	
			<?php if($config_list=='true'){ ?>
				<div class="formRow">
					<label>Chọn danh mục 1</label>
					<div class="formRight">
						<?=get_main_list()?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if($config_cat=='true'){ ?>
				<div class="formRow">
					<label>Chọn danh mục 2</label>
					<div class="formRight">
						<?=get_main_cat()?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if($config_item=='true'){ ?>
				<div class="formRow">
					<label>Chọn danh mục 3</label>
					<div class="formRight">
						<?=get_main_item()?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if($config_sub=='true'){ ?>
				<div class="formRow">
					<label>Chọn danh mục 4</label>
					<div class="formRight">
						<?=get_main_sub()?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
		<?php if($config_thuonghieu=='true'){ ?>
		<div class="formRow">
			<label>Chọn thương hiệu</label>
			<div class="formRight">
			<?=get_main_thuonghieu()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
				<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
		<?php if($_GET['act']=='edit'){?>
			<div class="formRow">
				<label>Hình Hiện Tại :</label>
				<div class="formRight">
					<div class="mt10"><img src="<?=_upload_product.$item['photo']?>" width="<?=_width_thumb?>"  alt="NO PHOTO" width="100" /></div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($config_img != "false"){ ?>
		<div class="formRow">
			<label>Hình ảnh kèm theo: </label>
			<div class="formRight">
				<a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a> 
				<?php if($act=='edit'){?>
					<?php if(count($ds_photo)!=0){?>       
						<?php for($i=0;$i<count($ds_photo);$i++){?>
							<div class="item_trich">
								<img class="img_trich" width="140px" height="110px" src="<?=_upload_product.$ds_photo[$i]['photo']?>" />
								<input type="text" rel="<?=$ds_photo[$i]['id']?>" value="<?=$ds_photo[$i]['stt']?>" class="update_stt tipS" />
								<a class="delete_images" title="<?=$ds_photo[$i]['id']?>"><img src="images/delete.png"></a>
							</div>
						<?php } ?>
					<?php }?>
				<?php }?>
			</div>
			<div class="clear"></div>
		</div> 	
		<?php } ?>
		<?php if($giaban == "true"){ ?>
			<div class="formRow">
				<label>Giá bán</label>
				<div class="formRight">
					<input type="text" name="giaban" title="Nhập giá bán" id="giaban" class="tipS conso" value="<?=@$item['giaban']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($giacu == "true"){ ?>
			<div class="formRow">
				<label>Giá cũ</label>
				<div class="formRight">
					<input type="text" name="giacu" title="Nhập giá cũ" id="giacu" class="conso tipS" value="<?=@$item['giacu']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($giasi == "true"){ ?>
			<div class="formRow">
				<label>Giá sỉ</label>
				<div class="formRight">
					<input type="text" name="giasi" title="Nhập sỉ" id="giasi" class="conso tipS" value="<?=@$item['giasi']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($masp == "true"){ ?>
			<div class="formRow">
				<label>Mã Sản Phẩm</label>
				<div class="formRight">
					<input type="text" name="masp" title="Bản đồ" id="masp" class="tipS validate[required]" value="<?=@$item['masp']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<div class="formRow hidden">
			<label>Dung tích</label>
			<div class="formRight">
				<input type="text" name="dientich" title="Nhập dung tích" id="dientich" class="tipS" value="<?=@$item['dientich']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow hidden">
			<label>Thương Hiệu</label>
			<div class="formRight">
				<input type="text" name="lienhe" title="Nhập thương hiệu" id="lienhe" class="tipS" value="<?=@$item['lienhe']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow hidden">
			<label>Nơi sản xuất</label>
			<div class="formRight">
				<input type="text" name="video" title="Nhập nơi sản xuất" id="video" class="tipS validate[required]" value="<?=@$item['video']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php if($rate == "true"){ ?>
			<div class="formRow">
				<label>Đánh giá</label>
				<div class="formRight">
					<input type="text" name="rate" title="Nhập giá cũ" id="rate" class="conso tipS validate[required]" value="<?=@$item['rate']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($soluong == "true"){ ?>
			<div class="formRow">
				<label>Số lượng SP</label>
				<div class="formRight">
					<input type="text" name="soluong" title="Nhập giá cũ" id="soluong" class="conso tipS validate[required]" value="<?=@$item['soluong']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($mausac == "true"){ ?>
			<div class="formRow">
				<label>Colors </label>
				<div class="formRight" id="states_color">
					<select style="width:300px" class="states states_color">
						<option value="0">
							Chọn Color
						</option>
						<?php for ($i=0,$countt = count($color_arr); $i < $countt ; $i++) { ?>
							<option value="<?=$color_arr[$i]["id"]?>"><?=$color_arr[$i]["ten_vi"]?></option>
						<?php }?>
					</select>
					<div class="clear"></div>
					<div class="tags_name">
						<?php  for ($i=0,$count = count($colors); $i < $count ; $i++) { 
							$d->query("select id,ten_vi from #_tieude where type='color' and id='".$colors[$i]."'");
							$color_name = $d->fetch_array();
							?>
							<p value="<?=$color_name["id"]?>" class="delete_tags"><?=$color_name["ten_vi"]?> <span ></span> 
								<input name="color[]" value="<?=$color_name["id"]?>"  type="hidden" />
							</p>
							
						<?php }?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($size == "true"){ ?>
			<div class="formRow" id="states_size">
				<label>Sizes </label>
				<div class="formRight">
					<select style="width:300px" class="states states_size">
						<option value="0">
							Chọn Sizes
						</option>
						<?php for ($i=0,$countt = count($size_arr); $i < $countt ; $i++) { ?>
							<option value="<?=$size_arr[$i]["id"]?>"><?=$size_arr[$i]["ten_vi"]?></option>
						<?php }?>
					</select>
					<div class="clear"></div>
					<div class="tags_name">
						<?php  for ($i=0,$count = count($sizes); $i < $count ; $i++) { 
							$d->query("select id,ten_vi from #_tieude where type='size' and id='".$sizes[$i]."'");
							$size_name = $d->fetch_array();
							?>
							<p value="<?=$size_name["id"]?>" class="delete_tags"><?=$size_name["ten_vi"]?> <span ></span> 
								<input name="size[]" value="<?=$size_name["id"]?>"  type="hidden" />
							</p>
							
						<?php }?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		

		<?php if($config_bds == "true"){ ?>
		<div class="formRow">
			<label>Giá</label>
			<div class="formRight">
				<input type="text" name="video" title="Trình Trạng" id="video" class="tipS" value="<?=@$item['video']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($tag == "true"){ ?>
			<div class="formRow">
				<label>Tags </label>
				<div class="formRight" id="states_tags">
					<select style="width:300px" class="states states_tags">
						<option value="0">
							Thêm Tags
						</option>
						<?php for ($i=0,$countt = count($tags_arr); $i < $countt ; $i++) { ?>
							<option value="<?=$tags_arr[$i]["id"]?>"><?=$tags_arr[$i]["ten_vi"]?></option>
						<?php }?>
					</select>
					<div class="clear"></div>
					<div class="tags_name">
						<?php  for ($i=0,$count = count($tags); $i < $count ; $i++) { 
							$d->query("select id,ten_vi from #_tags where id='".$tags[$i]."'");
							$tags_name = $d->fetch_array();
							?>
							<p value="<?=$tags_name["id"]?>" class="delete_tags"><?=$tags_name["ten_vi"]?> <span ></span> 
								<input name="tags[]" value="<?=$tags_name["id"]?>"  type="hidden" />
							</p>
							
						<?php }?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php foreach ($arr_lang as $key => $l) { ?>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Tiêu đề (<?=$config['langs'][$l]?>)</label>
			<div class="formRight">
                <input type="text" name="ten_<?=$l?>" title="Nhập tên danh mục" id="ten_<?=$l?>" class="tipS validate[required]" value="<?=@$item['ten_'.$l]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php if($config_url  != "false"){ ?>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Url</label>
			<div class="formRight">
				<span class="changetitle button tipS blueB">Cập nhật url</span>
                <input type="text" name="tenkhongdau" title="Nhập Url" id="tenkhongdau" class="tipS validate[required]" value="<?=@$item['tenkhongdau']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_name  == "true"){ ?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>Đơn vị (<?=$config['langs'][$l]?>)</label>
				<div class="formRight">
	                <input type="text" name="name_<?=$l?>" title="Nhập tên danh mục" id="name_<?=$l?>" class="tipS validate[required]" value="<?=@$item['name_'.$l]?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php	if($config_mota == "true"){?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>Mô tả(<?=$config['langs'][$l]?>)</label>
				<div class="<?=$config_mota_ck!="true"?'formRight':'ck_editor'?>">
					<textarea rows="5" id="mota_<?=$l?>" name="mota_<?=$l?>"><?=@$item['mota_'.$l]?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php	if($config_thongso == "true"){?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>Mô tả dài(<?=$config['langs'][$l]?>)</label>
				<div class="ck_editor">
					<textarea id="thongso_<?=$l?>" name="thongso_<?=$l?>"><?=@$item['thongso_'.$l]?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($config_noidung  == "true"){ ?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>chi tiết sản phẩm (<?=$config['langs'][$l]?>)</label>
				<div class="ck_editor">
					<textarea id="noidung_<?=$l?>" name="noidung_<?=$l?>"><?=@$item['noidung_'.$l]?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($config_khuyenmai  == "true"){ ?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>Photo (<?=$config['langs'][$l]?>)</label>
				<div class="ck_editor">
					<textarea id="khuyenmai_<?=$l?>" name="khuyenmai_<?=$l?>"><?=@$item['khuyenmai_'.$l]?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($config_baohanh  == "true"){ ?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>Video (<?=$config['langs'][$l]?>)</label>
				<div class="ck_editor">
					<textarea id="baohanh_<?=$l?>" name="baohanh_<?=$l?>"><?=@$item['baohanh_'.$l]?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php } ?> 
		
		<?php /*
		
		<div class="formRow">
			<label>Hướng cửa</label>
			<div class="formRight">
				<select id="huongnha" name="huongnha" class="main_select select_danhmuc">
					<option value="">Chọn hướng cửa</option>
					<?php for ($i=0;$i<count($huongnha); $i++) { ?>
						<option value="<?=$huongnha[$i]['id']?>" <?php if($huongnha[$i]['id']==$item['huongnha']){ echo 'selected="selected"';}?> ><?=$huongnha[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Dự án</label>
			<div class="formRight">
				<select id="duan" name="duan" class="main_select select_danhmuc">
					<option value="">Chọn Dự án</option>
					<?php for ($i=0;$i<count($duan); $i++) { ?>
						<option value="<?=$duan[$i]['id']?>" <?php if($duan[$i]['id']==$item['duan']){ echo 'selected="selected"';}?> ><?=$duan[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>số phòng ngủ</label>
			<div class="formRight">
				<select id="sophongngu" name="sophongngu" class="main_select select_danhmuc">
					<option value="">Chọn số phòng ngủ</option>
					<?php for ($i=0;$i<count($sophongngu); $i++) { ?>
						<option value="<?=$sophongngu[$i]['id']?>" <?php if($sophongngu[$i]['id']==$item['sophongngu']){ echo 'selected="selected"';}?> ><?=$sophongngu[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>mục đích</label>
			<div class="formRight">
				<select id="mucdich" name="mucdich" class="main_select select_danhmuc">
					<option value="">Chọn mục đích</option>
					<?php for ($i=0;$i<count($mucdich); $i++) { ?>
						<option value="<?=$mucdich[$i]['id']?>" <?php if($mucdich[$i]['id']==$item['mucdich']){ echo 'selected="selected"';}?> ><?=$mucdich[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>*/ ?>
		<?php /*
		<div class="formRow">
			<label>Tỉnh thành</label>
			<div class="formRight">
      			<select id="tinhthanh" name="tinhthanh" class="main_select">
      				<option value="">Chọn tỉnh thành</option>
      				<?php for($i=0;$i<count($tinhthanh); $i++) { ?>
      				<option value="<?=$tinhthanh[$i]['id']?>" <?php if($tinhthanh[$i]['id']==$item['tinhthanh']){ echo 'selected="selected"';}?> ><?=$tinhthanh[$i]['ten']?></option>
      				<?php } ?>
      			</select>
      		</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Quận huyện</label>
			<div class="formRight">
				<select id="quanhuyen" name="quanhuyen" class="main_select">
					<option value="">Chọn quận huyện</option>
					<?php for($i=0;$i<count($quanhuyen); $i++) { ?>
						<option value="<?=$quanhuyen[$i]['id']?>" <?php if($quanhuyen[$i]['id']==$item['quanhuyen']){ echo 'selected="selected"';}?> ><?=$quanhuyen[$i]['ten']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Phường/ Xã</label>
			<div class="formRight">
				<select id="phuong" name="phuongxa" class="main_select select_danhmuc">
					<option value="">Chọn phường / xã</option>
					<?php for($i=0;$i<count($phuongxa); $i++) { ?>
						<option value="<?=$phuongxa[$i]['id']?>" <?php if($phuongxa[$i]['id']==$item['phuongxa']){ echo 'selected="selected"';}?> ><?=$phuongxa[$i]['ten']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Đường / Phố</label>
			<div class="formRight">
				<select id="duong" name="duong" class="main_select select_danhmuc">
					<option value="">Chọn Đường / Phố</option>
					<?php for($i=0;$i<count($street); $i++) { ?>
						<option value="<?=$street[$i]['id']?>" <?php if($street[$i]['id']==$item['duong']){ echo 'selected="selected"';}?> ><?=$street[$i]['ten']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Video</label>
			<div class="formRight">
				<input type="text" name="video" title="Nhập link video" id="video" class="tipS validate[required]" value="<?=@$item['video']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Map</label>
			<div class="formRight">
				<input type="text" name="map" title="Tọa độ bản đồ" id="map" class="tipS validate[required]" value="<?=@$item['map']?>" />
			</div>
			<div class="clear"></div>
		</div> */ ?>
		
		
		
		<div class="formRow">
			<label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
			<div class="formRight">
				
				<input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
				<label>Số thứ tự: </label>
				<input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
			</div>
			<div class="clear"></div>
		</div>
		
	</div>  
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>
		
		<div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho danh mục" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
				<input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 68 - 170 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<div class="formRight">
				<input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
				<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
				<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				<a href="index.php?com=product&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>        </div>
<script>
	$(document).ready(function() {
		$('.file_input').filer({
			showThumbs: true,
			templates: {
				box: '<ul class="jFiler-item-list"></ul>',
				item: '<li class="jFiler-item">\
				<div class="jFiler-item-container">\
				<div class="jFiler-item-inner">\
				<div class="jFiler-item-thumb">\
				<div class="jFiler-item-status"></div>\
				<div class="jFiler-item-info">\
				<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
				</div>\
				{{fi-image}}\
				</div>\
				<div class="jFiler-item-assets jFiler-row">\
				<ul class="list-inline pull-left">\
				<li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
				</ul>\
				<ul class="list-inline pull-right">\
				<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
				</ul>\
				</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
				</div>\
				</div>\
				</li>',
				itemAppend: '<li class="jFiler-item">\
				<div class="jFiler-item-container">\
				<div class="jFiler-item-inner">\
				<div class="jFiler-item-thumb">\
				<div class="jFiler-item-status"></div>\
				<div class="jFiler-item-info">\
				<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
				</div>\
				{{fi-image}}\
				</div>\
				<div class="jFiler-item-assets jFiler-row">\
				<ul class="list-inline pull-left">\
				<span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
				</ul>\
				<ul class="list-inline pull-right">\
				<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
				</ul>\
				</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
				</div>\
				</div>\
				</li>',
				progressBar: '<div class="bar"></div>',
				itemAppendToEnd: true,
				removeConfirmation: true,
				_selectors: {
					list: '.jFiler-item-list',
					item: '.jFiler-item',
					progressBar: '.bar',
					remove: '.jFiler-item-trash-action',
				}
			},
			addMore: true
		});
	});
</script>