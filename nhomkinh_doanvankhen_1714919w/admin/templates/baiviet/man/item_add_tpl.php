
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
			var table = 'baiviet_photo';
			var value = $(this).val();
			var ten = $(this).attr('ten');
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value,ten:ten},
				success: function(result) {
				}
			});
		});

		$('.delete_images').click(function(){
			if (confirm('Bạn có muốn xóa hình này ko ? ')) {
				var id = $(this).attr('title');
				var table = 'baiviet_photo';
				var links = "<?=_upload_baiviet;?>";
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

</script>
<?php

function get_main_list()
{
	global $item;
	$sql="select * from table_baiviet_list where type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_list" name="id_list" data-level="0" data-type="'.$_GET['type'].'" data-table="table_baiviet_cat" data-child="id_cat" class="main_select select_danhmuc">
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

function get_main_cat()
{
	global $item;
	$sql="select * from table_baiviet_cat where id_list='".$item['id_list']."' and type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_cat" name="id_cat" data-level="1" data-type="'.$_GET['type'].'" data-table="table_baiviet_item" data-child="id_item" class="main_select select_danhmuc">
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
	$sql="select * from table_baiviet_item where id_cat='".$item['id_cat']."' and type='".$_GET['type']."' order by stt asc";
	$stmt=mysql_query($sql);
	$str='
	<select id="id_item" name="id_item" data-level="2" data-type="'.$_GET['type'].'" data-table="table_baiviet_sub" data-child="id_sub" class="main_select select_danhmuc">
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
	$sql="select * from table_baiviet_sub where id_item='".$item['id_item']."' and type='".$_GET['type']."' order by stt asc";
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


?>

<div class="wrapper">

	<div class="control_frm" style="margin-top:25px;">
		<div class="bc">
			<ul id="breadcrumbs" class="breadcrumbs">
				<li><a href="index.php?com=baiviet&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm <?=$title_main?></span></a></li>
				<li class="current"><a href="#" onclick="return false;">Thêm</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>

	<form name="supplier" id="validate" class="form" action="index.php?com=baiviet&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
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
			<?php if($config_images=='true'){ ?>
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

						<div class="mt10"><img src="<?=_upload_baiviet.$item['photo']?>"  alt="NO PHOTO" width="100" /></div>
					</div>
					<div class="clear"></div>
				</div>
			<?php } } ?>

			<?php if($config_images360=='true'){?>
			<div class="formRow">
				<label>Tải hình ảnh (360):</label>
				<div class="formRight">
					<input type="file" id="file" name="file360" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> width : <?php echo _width_thumb_360*$ratio_;?> px , Height : <?php echo _height_thumb_360*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>
			<?php if($_GET['act']=='edit'){?>
				<div class="formRow">
					<label>Hình Hiện Tại :</label>
					<div class="formRight">

						<div class="mt10"><img src="<?=_upload_baiviet.$item['photo360']?>"  alt="NO PHOTO" width="100" /></div>
					</div>
					<div class="clear"></div>
				</div>
			<?php } } ?>
				<?php if($config_icon == 'true'){?>
					<div class="formRow">
						<label>Tải icon:</label>
						<div class="formRight">
							<input type="file" id="file" name="icon" />
							<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
							<div class="note"> width : <?php echo _width_thumb_icon;?> px , Height : <?php echo _height_thumb_icon;?> px </div>
						</div>
						<div class="clear"></div>
					</div>
					<?php if($_GET['act']=='edit'){?>
						<div class="formRow">
							<label>icon Hiện Tại :</label>
							<div class="formRight">

								<div class="mt10"><img src="<?=_upload_baiviet.$item['icon']?>"  alt="NO PHOTO" width="56px" height="50px" /></div>
							</div>
							<div class="clear"></div>
						</div>
					<?php } } ?>
					<?php if($color=='true'){?>
						<div class="formRow lang_hidden lang_vi active">
							<label>color:</label>
							<div class="formRight">
								<input type="text" class="color" name="color" size="8" title="Nhập màu nền" class="tipS validate[required]" value="<?=@$item['color']?>"  />
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					<?php if($config_img=='true'){ ?>
						<div class="formRow">
							<label>Hình ảnh kèm theo: </label>
							<div class="formRight"><div class="note"> width : <?php echo _width_thumb_img?> px , Height : <?php echo _height_thumb_img?> px </div></div>
							<div class="formRight">
								<a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a>         
								<?php if($act=='edit'){?>
									<?php if(count($ds_photo)!=0){?>       
										<?php for($i=0;$i<count($ds_photo);$i++){?>
											<div class="item_trich">
												<img class="img_trich" width="140px" height="110px" src="<?=_upload_baiviet.$ds_photo[$i]['photo']?>" />
												<input type="text" ten="stt" rel="<?=$ds_photo[$i]['id']?>" value="<?=$ds_photo[$i]['stt']?>" placeholder="Nhập số thứ tự" class="update_stt tipS" />
												<a class="delete_images" title="<?=$ds_photo[$i]['id']?>"><img src="images/delete.png"></a>
											</div>
										<?php } ?>
									<?php }?>

								<?php }?>
							</div>
							<div class="clear"></div>
						</div> 
					<?php } ?>
					<?php if($config_img2=='true'){ ?>
						<div class="formRow">
							<label>Hình ảnh Kéo ảnh: (2 Ảnh) </label>
							<div class="formRight">
								<a class="file_input" data-jfiler-name="files2" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a>         
								<?php if($act=='edit'){?>
									<?php if(count($ds_photo2)!=0){?>       
										<?php for($i=0;$i<count($ds_photo2);$i++){?>
											<div class="item_trich">
												<img class="img_trich" width="140px" height="110px" src="<?=_upload_baiviet.$ds_photo2[$i]['photo']?>" />
												<input type="text" ten="stt" rel="<?=$ds_photo2[$i]['id']?>" value="<?=$ds_photo2[$i]['stt']?>" placeholder="Nhập số thứ tự" class="update_stt tipS" />
												<a class="delete_images" title="<?=$ds_photo2[$i]['id']?>"><img src="images/delete.png"></a>
											</div>
										<?php } ?>
									<?php }?>

								<?php }?>
							</div>
							<div class="clear"></div>
						</div> 
					<?php } ?>
					<?php if($links=='true'){ ?>
						<div class="formRow active">
							<label><?=$_GET['type']=='camnhan'?'Vote':'Link'?>:</label>
							<div class="formRight">
								<input type="text" name="link" title="Nhập tên danh mục" id="link" class="tipS validate[required]" value="<?=@$item['link']?>" />
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					<?php foreach ($arr_lang as $key => $l) { ?>
					<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
						<label><?=$_GET['type']=="phongthuy"?'Năm sinh':'Tiêu đề ('.$config['langs'][$l].')'?></label>
						<div class="formRight">
							<input type="text" name="ten_<?=$l?>" title="Tiêu đề <?=$config['langs'][$l]?>" id="ten_<?=$l?>" class="tipS validate[required]" value="<?=@$item['ten_'.$l]?>" />
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
					<?php if($config_name  != "false"){ ?>
					<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
						<label><?=$_GET['type']=='duan'?'Khu Vực':'Nghề Nghiệp'?></label>
						<div class="formRight">
							<input type="text" name="name_<?=$l?>" title="Khu vực" id="name_<?=$l?>" class="tipS validate[required]" value="<?=@$item['name_'.$l]?>" />
						</div>
						<div class="clear"></div>
					</div>
					<?php } ?>
					<?php if($config_mota=='true'){ ?>
						<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
							<label>Mô tả (<?=$config['langs'][$l]?>)</label>
							<div class="<?=$config_mota_ck=="true"?'ck_editor':'formRight'?>">
								<textarea rows="4" cols="" id="mota_<?=$l?>" name="mota_<?=$l?>"><?=@$item['mota_'.$l]?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					<?php if($config_thongtin == "true"){ ?>
						<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
							<label>Mô tả dài (<?=$config['langs'][$l]?>)</label>
							<div class="formRight">
								<div class="note">Nhập mô tả hiển thị ngoài trang chủ</div>
							</div>
							<div class="ck_editor">
								<textarea id="thongtin_<?=$lang?>" name="thongtin_<?=$lang?>"><?=@$item['thongtin_'.$lang]?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					<?php if($config_noidung == "true"){ ?>
						<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
							<label>Nội Dung (<?=$config['langs'][$l]?>)</label>
							<div class="ck_editor">
								<textarea id="noidung_<?=$l?>" name="noidung_<?=$l?>"><?=@$item['noidung_'.$l]?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					<?php } ?>
					<?php } ?>
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
					<?php if($config_seo != "false"){ ?>
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
					<?php } ?>
					<div class="formRow">
						<div class="formRight">
							<input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
							<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
							<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
							<a href="index.php?com=baiviet&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
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
							</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập stt" />\
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
							</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập stt" />\
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
