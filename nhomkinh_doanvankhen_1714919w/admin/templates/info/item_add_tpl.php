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
		$('.delete_images').click(function(){
			if (confirm('Bạn có muốn xóa hình này ko ? ')) {
				var id = $(this).attr('title');
				var table = 'baiviet_photo';
				var links = "../upload/baiviet/";
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
		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'baiviet_photo';
			var value = $(this).val();
			var ten = $(this).data('ten');
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value,ten: ten},
				success: function(result) {
				}
			});
		});
	});

</script>
<form name="supplier" id="validate" class="form" action="index.php?com=info&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="control_frm" style="margin-top:25px;">
		<div class="bc">
			<ul id="breadcrumbs" class="breadcrumbs">
				<li><a href="index.php?com=info&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Cập nhật <?=$title_main?></span></a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="widget">
		<div class="title chonngonngu">
			<ul>
				<?php foreach ($arr_lang as $key => $l) { ?>
					<li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS validate[required]" title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" class="tiengviet" /><?=$config['langs'][$l]?></a></li>
				<?php } ?>
			</ul>
		</div>	
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
			<div class="formRow">
				<label>Hình Hiện Tại :</label>
				<div class="formRight">

					<div class="mt10"><img src="<?=_upload_hinhanh.$item['photo']?>" width="<?=_width_thumb?>"  alt="NO PHOTO" width="100" /></div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if($config_seos != "false"){ ?>
		<?php if($config_img == "true"){ ?>
			<div class="formRow">
				<label>Hình ảnh: </label>
				<div class="formRight">
					<div class="note"> width : <?php echo _width_thumb_img;?> px , Height : <?php echo _height_thumb_img;?> px </div>
					<div class="clear"></div>
					<a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a> 
					<?php if(count($ds_photo)!=0){?>       
						<?php for($i=0;$i<count($ds_photo);$i++){?>
							<div class="item_trich">
								<img class="img_trich" width="150" height="100" src="<?=_upload_baiviet.$ds_photo[$i]['photo']?>" />
								<input type="text" rel="<?=$ds_photo[$i]['id']?>" data-ten="stt" value="<?=$ds_photo[$i]['stt']?>" class="update_stt" />
								<input type="text" rel="<?=$ds_photo[$i]['id']?>" data-ten="ten" value="<?=$ds_photo[$i]['ten']?>" class="update_stt" />
								<a class="delete_images" title="<?=$ds_photo[$i]['id']?>"><img src="images/delete.png"></a>
							</div>
						<?php } ?>
					<?php }?>
				</div>
				<div class="clear"></div>
			</div> 		
		<?php } ?>
		<?php if($link=='true'){ ?>
			<div class="formRow">
				<label>Link</label>
				<div class="formRight">
					<input type="text" name="link" title="Nhập link" id="link" class="tipS validate[required]" value="<?=@$item['link']?>" />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php foreach ($arr_lang as $key => $l) { ?>
			<?php if($config_name == 'true'){ ?>
				<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
					<label>Tiêu đề nhỏ (<?=$config['langs'][$l]?>)</label>
					<div class="formRight">
						<input type="text" name="name_<?=$l?>" title="Nhập tiêu đề" id="name_<?=$l?>" class="tipS validate[required]" value="<?=@$item['name_'.$l]?>" />
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if($config_ten=='true'){ ?>
				<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
					<label>Tiêu đề (<?=$config['langs'][$l]?>)</label>
					<div class="formRight">
						<input type="text" name="ten_<?=$l?>" title="Nhập tên danh mục" id="ten_<?=$l?>" class="tipS validate[required]" value="<?=@$item['ten_'.$l]?>" />
					</div>
					<div class="clear"></div>
				</div>
				<?php if($config_url!='false'){ ?>
					<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
						<label>Url</label>
						<div class="formRight">
							<span class="changetitle button tipS blueB">Cập nhật url</span>
							<input type="text" name="tenkhongdau" title="Nhập Url" id="tenkhongdau" class="tipS validate[required]" value="<?=@$item['tenkhongdau']?>" />
						</div>
						<div class="clear"></div>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if($config_mota=='true'){ ?>
				<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
					<label><?=$_GET['type']=="footer"?"Nội dung 1":"Mô tả"?> (<?=$config['langs'][$l]?>)</label>
					<div class="<?=$config_mota_ck!="true"?'formRight':'ck_editor'?>">
						<textarea rows="10" id="mota_<?=$l?>" name="mota_<?=$l?>"><?=@$item['mota_'.$l]?></textarea>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if($config_noidung=='true'){ ?>
				<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
					<label>Nội Dung (<?=$config['langs'][$l]?>)</label>
					<div class="ck_editor">
						<textarea id="noidung_<?=$l?>" name="noidung_<?=$l?>"><?=@$item['noidung_'.$l]?></textarea>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
		<?php } ?>
		<?php } ?>
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
						<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho sản phẩm" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label>Description:</label>
					<div class="formRight">
						<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
						<input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<div class="formRow">
				<div class="formRight">
					<input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id_cat']?>" />
					<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</form>   
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
					</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\<input type="text" name="ten[]" class="stthinh" placeholder="Nhập tên" />\
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
					</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\<input type="text" name="ten[]" class="stthinh" placeholder="Nhập tên" />\
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