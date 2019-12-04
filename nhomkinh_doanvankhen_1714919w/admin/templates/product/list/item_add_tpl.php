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
		$('.update_link').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'product_photo';
			var value = $(this).val();
			var ten = 'mota';

			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value,ten: ten},
				success: function(result) {
				}
			});
		});
		$('.update_ten_vi').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'product_photo';
			var value = $(this).val();
			var ten = 'ten_vi';

			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value,ten: ten},
				success: function(result) {
				}
			});
		});
		$('.update_ten_en').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'product_photo';
			var value = $(this).val();
			var ten = 'ten_en';

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
<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Danh mục cấp 1</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
			<ul>
			<?php foreach ($arr_lang as $key => $l) { ?>
				<li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS" title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" /><?=$config['langs'][$l]?></a></li>
			<?php } ?>
			</ul>
		</div>	
		<?php if($config_images == "true"){ ?>
		<div class="formRow">
			<label>Hình ảnh :</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit_list'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			<div class="mt10"><img src="<?=_upload_product.$item['photo']?>" width="<?=_width_thumb?>"  alt="NO PHOTO" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>
		<?php foreach ($arr_lang as $key => $l) { ?>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Tiêu đề (<?=$config['langs'][$l]?>)</label>
			<div class="formRight">
                <input type="text" name="ten_<?=$l?>" title="Nhập tên danh mục" id="ten_<?=$l?>" class="tipS validate[required]" value="<?=@$item['ten_'.$l]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Url</label>
			<div class="formRight">
				<span class="changetitle button tipS blueB">Cập nhật url</span>
                <input type="text" name="tenkhongdau" title="Nhập Url" id="tenkhongdau" class="tipS validate[required]" value="<?=@$item['tenkhongdau']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php	if($config_mota == "true"){?>
			<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
				<label>Mô tả(<?=$config['langs'][$l]?>)</label>
				<div class="<?=$config_mota_ck!="true"?'formRight':'ck_editor'?>">
					<textarea rows="5" id="mota_<?=$l?>" name="mota_<?=$l?>"><?=@$item['mota_'.$l]?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php } ?> 
		<?php if($mapx =='true'){?>
        <div class="formRow">
            <label>Kích thướt ảnh :</label>
            <div class="formRight">
                <select name="mapx" class="main_select select_danhmuc">
                    <option value="326x286" <?php if($item['mapx']=='326x286'){ echo 'selected="selected"';}?>>326px x 286px</option>
                    <option value="527x286" <?php if($item['mapx']=='527x286'){ echo 'selected="selected"';}?>>527px x 286px</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
		<?php if($mau  == "true"){ ?>
		 <div class="formRow">
			<label>Màu </label>
			<div class="formRight">
                <input type="text" name="color" title="Nhập color" id="color" class="tipS color" value="<?=@$item['color']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_quangcao == "true"){ ?>
		<div class="formRow">
			<label>Tải icon:</label>
			<div class="formRight">
            	<input type="file" id="file" name="quangcao" />
				<img src="./images/question-button.png" alt="Upload icon" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb_qc;?> px , Height : <?php echo _height_thumb_qc;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit_list'){?>
		<div class="formRow">
			<label>icon :</label>
			<div class="formRight">
			<div class="mt10"><img src="<?=_upload_product.$item['quangcao']?>"  alt="NO PHOTO" width="<?_width_thumb_qc?>" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>
		<?php if($config_img == "true"){ ?>
		<div class="formRow">
		  <label>Hình ảnh : </label>
		  <div class="note formRight"> width : <?php echo _width_thumb_qc*$ratio_;?> px , Height : <?php echo _height_thumb_qc*$ratio_;?> px </div>
		  <div class="formRight">
		  	
		     <a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a>                
		    <?php if($_GET['act'] == 'edit_list'){?>
		      <?php if(count($ds_photo) !=0 ){?>       
		            <?php  for($i=0;$i<count($ds_photo);$i++){?>
		              <div class="item_trich">
		                  <img class="img_trich" width="<?_width_thumb_qc?>" height="<?_height_thumb_qc?>" src="<?=_upload_product.$ds_photo[$i]['photo']?>" />
		                  <input type="text" link="<?=$ds_photo[$i]['mota']?>" rel="<?=$ds_photo[$i]['id']?>" value="<?=$ds_photo[$i]['stt']?>" class="update_stt tipS" />
		                  <a class="delete_images" title="<?=$ds_photo[$i]['id']?>"><img src="images/delete.png"></a>
		              </div>
		            <?php } ?>
		      <?php }?>
		    <?php }?>
		  </div>
		  <div class="clear"></div>
		</div>
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

            	<a href="index.php?com=product&act=man_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>



			</div>

			<div class="clear"></div>

		</div>

	</div>

</form>        
</div>

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