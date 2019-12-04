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
	});
</script>
<div class="control_frm" style="margin-top:25px;">
	<div class="bc">
		<ul id="breadcrumbs" class="breadcrumbs">
			<li><a href="index.php?com=setting&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
			<li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
		$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=setting&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	
	
	<div class="widget">
		<div class="title chonngonngu">
			<ul>
			<?php foreach ($arr_lang as $key => $l) { ?>
				<li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS" title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" /><?=$config['langs'][$l]?></a></li>
			<?php } ?>
			</ul>
		</div>	
		<?php foreach ($arr_lang as $key => $l) { ?>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Tên Công Ty (<?=$config['langs'][$l]?>)</label>
			<div class="formRight">
				<input type="text" name="ten_<?=$l?>" title="Nhập tên công ty (<?=$config['langs'][$l]?>)" id="ten_<?=$l?>" class="tipS validate[required]" value="<?=@$item['ten_'.$l]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php foreach ($arr_lang as $key => $l) { ?>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Slogan (<?=$config['langs'][$l]?>)</label>
			<div class="formRight">
				<input type="text" name="slogan_<?=$l?>" title="Nhập tên công ty (<?=$config['langs'][$l]?>)" id="slogan_<?=$l?>" class="tipS validate[required]" value="<?=@$item['slogan_'.$l]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<div class="formRow hidden">
			<label>Từ khóa tìm kiếm</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['datve']?>" name="datve" title="keyword tìm kiếm" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['email']?>" name="email" title="Nhập địa chỉ email" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hotline</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['hotline']?>" name="hotline" title="Nhập hotline" class="tipS" />
				<div class="note hidden">Nếu nhiều hơn 2 số nhập cách nhau bởi dấu "-"</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow hidden">
			<label>Note hotline</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['dienthoai']?>" name="dienthoai" title="Nhập số điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Zalo</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['oaid']?>" name="oaid" title="Nhập số điện thoại" class="tipS" />
				<div class="note">Không nhập khảng cách</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow hidden">
			<label>Giá sốc</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['giasoc']?>" name="giasoc" title="Giá sốc" class="tipS conso" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow hidden">
			<label>Tư vấn</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['tuvan']?>" name="tuvan" title="Nhập số điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	
		<?php foreach ($arr_lang as $key => $l) { ?>
		<div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
			<label>Địa chỉ (<?=$config['langs'][$l]?>)</label>
			<div class="formRight">
				<input type="text" name="diachi_<?=$l?>" title="Nhập tên công ty (<?=$config['langs'][$l]?>)" id="diachi_<?=$l?>" class="tipS validate[required]" value="<?=@$item['diachi_'.$l]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<div class="formRow">
			<label>Website</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['website']?>" name="website" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	
		<div class="formRow">
			<label>FanPage Facebook</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['facebook']?>" name="facebook" title="Nhập link fanpage facebook" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Messenger</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['googleplus']?>" name="googleplus" title="Messenger" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_vi active">
			<label>Thời gian hoạt động</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['giomocua']?>" name="giomocua" title="Nhập thời gian làm việc" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<!-- <div class="formRow lang_hidden lang_vi active">
			<label>Hiển thị mục tin tức ngoài trang chủ</label>
			<div class="formRight">
				<select name="hotrokh">
					<option <?php if(@$item['hotrokh'] == '0'){echo 'selected';}  ?> value="0">Ẩn</option>
					<option <?php if(@$item['hotrokh'] == '1'){echo 'selected';}  ?> value="1">Hiện</option>
				</select>
			</div>
			<div class="clear"></div>
		</div> -->
		<div class="formRow hidden">
			<label>Đóng dấu ảnh </label>
			<div class="formRight">
				 <div class="mt10"><img src="../upload/watermark.png"  alt="NO PHOTO" /></div><br>
				<input type="file" id="dongdau" name="dongdau" />
				<div class="note">Ảnh [.png,.PNG] - (ctr + f5 sau khi up hình)</div>
			</div>
			<div class="clear"></div>
		</div>
</div>
<div class="widget">
	<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
		<h6>Google Map</h6>
	</div>	
	<div class="formRow ">
		<label>Hình ảnh map</label>
		<div class="formRight">
			<div class="mt10"><img src="../upload/map.png"  alt="NO PHOTO" width="200" /></div><br>
			<input type="file" id="imgmap" name="imgmap" />
			<div class="note">575x350 (px)</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Link</label>
		<div class="formRight">
			<input type="text" value="<?=@$item['link_map']?>" name="link" title="Link google map" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tọa độ</label>
		<div class="formRight">
			<input type="text" value="<?=@$item['toado']?>" name="toado" title="Tọa độ" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>iframe map:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code iframe" class="tipS" name="iframe"><?=@$item['iframe_map']?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Chọn phương thức</label>
		<div class="formRight">
			<select name="phuongthuc" class="main_select">
				<option <?php if($item['phuongthuc'] == 0){echo 'selected';} ?> value="0">Dùng link</option>
				<option <?php if($item['phuongthuc'] == 1){echo 'selected';} ?> value="1">Dùng iframe</option>
			</select>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="widget">
	<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
		<h6>Phân trang</h6>
	</div>	
	<div class="formRow">
		<label>Page home</label>
		<div class="formRight">
			<input type="text" value="<?=@$item['page1']?>" name="page1" title="Page home" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Page trang trong</label>
		<div class="formRight">
			<input type="text" value="<?=@$item['page2']?>" name="page2" title="Page trang trong" class="tipS" />
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
			<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho website" class="tipS" />
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
	<div class="formRow">
		<label>Analyrics:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code Analytics" class="tipS" name="analytics"><?=@unzip_chuanhoa($item['analytics'])?></textarea>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="formRow">
		<label>Code head:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code header" class="tipS" name="code_head"><?=@unzip_chuanhoa($item['code_head'])?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Code body:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code body" class="tipS" name="code_body"><?=@unzip_chuanhoa($item['code_body'])?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Code footer:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code footer" class="tipS" name="code_footer"><?=@unzip_chuanhoa($item['code_footer'])?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>V chat :</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code vchat" class="tipS" name="vchat"><?=@unzip_chuanhoa($item['vchat'])?></textarea>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="formRow">
		<div class="formRight">
			<input type="hidden" name="id" id="id_this_setting" value="<?=@$item['id']?>" />
			<input type="submit" class="blueB"  value="Hoàn tất" />
		</div>
		<div class="clear"></div>
	</div> 			
</div>


</form>   