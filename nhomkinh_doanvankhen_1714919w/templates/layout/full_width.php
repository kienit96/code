<?php  
	$d->reset();
	$sql= "select photo_$lang,ten_$lang,mota_$lang,icon_$lang,link from #_photo where hienthi=1 and type='slider' order by stt,id desc ";
	$d->query($sql);
	$slide_show = $d->result_array();
?>
<div class="skdslider <?php if($template != 'index'){echo 'trangtrong';} ?>">
    <ul id="demo3" class="slides">
	   <?php for($i=0;$i<count($slide_show);$i++){?>
	        <li class="wow slideInRight">
	        	<img src="thumb/1366x555/1/<?=_upload_hinhanh_l.$slide_show[$i]['photo_'.$lang]?>" alt="<?=$slide_show[$i]['ten_'.$lang]?>" />
	        	<div class="mota">
	        		<img src="thumb/320x210/2/<?=_upload_hinhanh_l.$slide_show[$i]['icon_'.$lang]?>" alt="<?=$slide_show[$i]['mota_'.$lang]?>">
	        		<div class="khung">
	        			<p><?=$slide_show[$i]['mota_'.$lang]?></p>
	        			<a target="_blank" href="<?=$slide_show[$i]['link']?>"><?=_xemthem?></a>
	        		</div>
	        	</div>
	        </li>
	    <?php } ?>    
	</ul> 
</div>