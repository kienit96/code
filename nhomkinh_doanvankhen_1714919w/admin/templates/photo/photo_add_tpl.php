<div class="control_frm" style="margin-top:25px;">

    <div class="bc">

        <ul id="breadcrumbs" class="breadcrumbs">

        	            <li><a href="index.php?com=photo&act=man_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span><?=$title_main?></span></a></li>

                                    <li class="current"><a href="#" onclick="return false;">Thêm hình ảnh</a></li>

        </ul>

        <div class="clear"></div>

    </div>

</div>

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

<form name="supplier" id="validate" class="form" action="index.php?com=photo&act=save_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

	<div class="widget">
        <div class="title chonngonngu">
            <ul>
            <?php foreach ($arr_lang as $key => $l) { ?>
                <li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS " title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" class="tiengviet" /><?=$config['langs'][$l]?></a></li>
            <?php } ?>
            </ul>
        </div>
        <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Thêm hình ảnh</h6>
		</div>
        <?php foreach ($arr_lang as $key => $l) { ?>
        <div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
            <label>Tải hình ảnh (<?=$config['langs'][$l]?>):</label>
            <div class="formRight">
                <input type="file" id="file" name="file_<?=$l?>" />
                <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb*$ratio_;?>px  - Height : <?php echo _height_thumb*$ratio_;?>px</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
            <label>Tên hình ảnh (<?=$config['langs'][$l]?>)</label>
            <div class="formRight">
                <input type="text" name="ten_<?=$l?>" title="Nhập Tên hình ảnh (<?=$config['langs'][$l]?>)" id="ten_<?=$l?>" class="tipS" value="<?=@$item['ten_'.$l]?>" />
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>	                     
        <?php if($config_mota == 'true'){ foreach ($arr_lang as $key => $l) { ?>
        <div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
            <label>Mô tả (<?=$config['langs'][$l]?>)</label>
            <div class="formRight">
                <input type="text" name="mota_<?=$l?>" title="Mô tả (<?=$config['langs'][$l]?>)" id="mota_<?=$l?>" class="tipS" value="<?=@$item['mota_'.$l]?>" />
            </div>
            <div class="clear"></div>
        </div>
        <?php } } ?>
        <?php if($config_noidung == "true"){ ?>
        <div class="formRow lang_hidden lang_vi active">
            <label>Hotline</label>
            <div class="formRight">
                <input type="text" name="noidung" title="Mô tả (<?=$config['langs'][$l]?>)" id="noidung" class="tipS" value="<?=@$item['noidung']?>" />
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
		<?php if($config_icon == "true"){ foreach ($arr_lang as $key => $l) { ?>
        <div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
            <label>hình ảnh 2 (<?=$config['langs'][$l]?>):</label>
            <div class="formRight">
                <input type="file" id="file" name="icon_<?=$l?>" />
                <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb_icon*$ratio_;?>px  - Height : <?php echo _height_thumb_icon*$ratio_;?>px</span>
            </div>
            <div class="clear"></div>
        </div>
        <?php } } ?>
        <?php if($mapx =='true'){?>
        <div class="formRow">
            <label>Kích thướt ảnh:</label>
            <div class="formRight">
                <select name="mapx" class="main_select select_danhmuc">
                    <option value="595x260" <?php if($item['mapx']=="595x260"){ echo 'selected="selected"';}?>>595px X 260px</option>
                    <option value="1200x260" <?php if($item['mapx']=="1200x260"){ echo 'selected="selected"';}?>>1200px - 260px</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
        <?php if($links=='true'){ ?>

        <div class="formRow">

            <label>Link liên kết:</label>

            <div class="formRight">

                <input type="text" id="code_pro" name="link" value=""  title="Nhập link liên kết cho hình ảnh" class="tipS" />

            </div>

            <div class="clear"></div>

        </div>
        <?php } ?>

        

        <div class="formRow">

          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>

          <div class="formRight">           

            <input type="checkbox" name="active<?=$i?>" id="check1" value="1" checked="checked" />

            <label for="check1">Hiển thị</label>           

          </div>

          <div class="clear"></div>

        </div>

        <div class="formRow">

            <label>Số thứ tự: </label>

            <div class="formRight">

                <input type="text" class="tipS" value="1" name="stt<?=$i?>" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của hình ảnh, chỉ nhập số">

            </div>

            <div class="clear"></div>

        </div>

		

	<div class="formRow">

			<div class="formRight">

            	<input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />

            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />

			</div>

			<div class="clear"></div>

		</div>	

	</div>

   

	

</form>   