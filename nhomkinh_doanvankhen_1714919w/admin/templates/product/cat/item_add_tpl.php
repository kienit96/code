

<script type="text/javascript">		

	function TreeFilterChanged2(){		

				$('#validate').submit();		

	}

	$(document).ready(function() {

		$('.chonngonngu li a').click(function(event) {

			var lang = $(this).attr('href');

			$('.chonngonngu li a').removeClass('active');

			$(this).addClass('active');

			$('.lang_hidden').removeClass('active');

			$('.lang_'+lang).addClass('active');

			return false;

		});

	});

</script>

<?php

  function get_main_list()

  {

    $sql="select * from table_product_list where type='".$_GET['type']."' order by stt asc";

    $stmt=mysql_query($sql);

    $str='

      <select id="id_list" name="id_list" onchange="select_list()" class="main_select">

      <option value="">Chọn danh mục 1</option>';

    while ($row=@mysql_fetch_array($stmt)) 

    {

      if($row["id"]==(int)@$_REQUEST["id_list"])

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

        	<li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Danh mục cấp 2</span></a></li>

            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>

        </ul>

        <div class="clear"></div>

    </div>

</div>



<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_cat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
			<ul>
			<?php foreach ($arr_lang as $key => $l) { ?>
				<li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS" title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" /><?=$config['langs'][$l]?></a></li>
			<?php } ?>
			</ul>
		</div>	
		<div class="formRow">

			<label>Chọn danh mục </label>

			<div class="formRight">

			<?=get_main_list()?>

			</div>

			<div class="clear"></div>

		</div>	
		<?php if($config_images == "true"){ ?>
		<div class="formRow">

			<label>Tải hình ảnh:</label>

			<div class="formRight">

            	<input type="file" id="file" name="file" />

				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

			</div>

			<div class="clear"></div>

		</div>

        <?php if($_GET['act']=='edit_cat'){?>

		<div class="formRow">

			<label>Hình Hiện Tại :</label>

			<div class="formRight">

			

			<div class="mt10"><img src="<?=_upload_product.$item['photo']?>" max-width="100%"  alt="NO PHOTO"  /></div>

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
                    <option value="450x545" <?php if($item['mapx']=='450x545'){ echo 'selected="selected"';}?>>450px x 545px</option>
                    <option value="450x265" <?php if($item['mapx']=='450x265'){ echo 'selected="selected"';}?>>450px x 265px</option>
                </select>
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

            	<a href="index.php?com=product&act=man_cat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>

			</div>

			<div class="clear"></div>

		</div>



	</div>

</form>        </div>
