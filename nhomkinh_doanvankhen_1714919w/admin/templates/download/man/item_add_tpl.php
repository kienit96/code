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

    $sql="select * from table_download_list where type='".$_GET['type']."' order by stt asc";

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

        	            <li><a href="index.php?com=download&act=man"><span>Quản lý  <?=$title_main?></span></a></li>

                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>

        </ul>

        <div class="clear"></div>

    </div>

</div>

<form name="supplier" id="validate" class="form" action="index.php?com=download&act=save&type=<?=$_GET['type']?>" method="post" enctype="multipart/form-data">

	<div class="widget">

		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />

			<h6>Nhập dữ liệu</h6>

		</div>

		<div class="title chonngonngu">

			<ul>

				<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>

				<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>

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

		<!-- <div class="formRow">

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

			

			<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="100" /></div>

			</div>

			<div class="clear"></div>

		</div>

		<?php } ?> -->



		<div class="formRow lang_hidden lang_vi active">
			<label>Tiêu đề</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Tiêu đề (Tiếng anh)</label>
			<div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên danh mục" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">

			<label>Tải File :</label>

			<div class="formRight">

            	<input type="file" id="file_download" name="file_download" />

				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

				<div class="note"> Type  : rar , zip , xls , xlsx , pdf , doc , docx , ppt , pptx </div>

			</div>

			<div class="clear"></div>

		</div>

        <?php if($_GET['act']=='edit'){?>

		<div class="formRow">

			<label>File Hiện Tại :</label>

			<div class="formRight">

			

			<div class="mt10"><?=$item['file']?></div>

			</div>

			<div class="clear"></div>

		</div>

		<?php } ?>

       

       

        

		

        <div class="formRow">

          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>

          <div class="formRight">

           

            <input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />

            <label for="check1">Hiển thị</label>            

          </div>

          <div class="clear"></div>

        </div>

        <div class="formRow">

            <label>Số thứ tự: </label>

            <div class="formRight">

                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">

            </div>

            <div class="clear"></div>

        </div>

		

		

		<div class="formRow">

			<div class="formRight">

                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />

                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />

            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />

            	<a href="index.php?com=download&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>

			</div>

			<div class="clear"></div>

		</div>

		

	</div>  

	

</form>        </div>