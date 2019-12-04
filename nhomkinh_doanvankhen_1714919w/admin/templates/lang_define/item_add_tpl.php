<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	    <li><a href="index.php?com=lang_define&act=man&curPage=<?=$_REQUEST['curPage']?>"><span>Ngôn Ngữ</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    
    
</div><!--end control_frm-->



<form name="supplier" id="validate" class="form" action="index.php?com=lang_define&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>		
    <div class="formRow lang_hidden lang_vi active">
      <label>Tên Biến</label>
      <div class="formRight">
        <input type="text" name="ten" title="Nhập tên danh mục" id="ten" class="tipS validate[required]" value="<?=@$item['ten']?>" />
      </div>
      <div class="clear"></div>
    </div>
    <?php $arr_lang = explode('|', $config['lang']); foreach ($arr_lang as $key => $l) { ?>
    <div class="formRow lang_hidden lang_vi active">
      <label>Lang <?=$config['langs'][$l]?></label>
      <div class="formRight">
        <input type="text" name="lang_<?=$l?>" title="<?=$config['langs'][$l]?>" id="ten" class="tipS <?=$key==0?'validate[required]':''?>" value="<?=@$item['lang_'.$l]?>" />
      </div>
      <div class="clear"></div>
    </div>
    <?php } ?>
    <div class="formRow">
      <label>Hình Ảnh</label>
      <div class="formRight">
         <div class="mt10"><img src="<?=_upload_hinhanh.$item['ten']?>.png"  alt="NO PHOTO" /></div><br>
        <input type="file" id="file" name="file" />
        <div class="note"> width : 30px , Height : 30px </div>
      </div>
      <div class="clear"></div>
    </div>
  </div><!--end tab_gaconit-->
        
		
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>            
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
	
	
		<div class="formRow">
			<div class="formRight">

                
                
                <input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="hidden" name="referer_link" value="<?=$_SERVER['HTTP_REFERER']?>" />
	<input type="submit" value="Lưu" class="blueB" />
	<input type="button" value="Thoát" onclick="javascript:window.location='<?=$_SERVER['HTTP_REFERER']?>'" class="blueB" />
                
                
			</div>
			<div class="clear"></div>
		</div>     
	
		
	</div>  
	
	</form>



</div>

