<div id="info">
  	<div class="margin_auto">
	    <div class="dieuhuong   ">  
	      <a href="./" itemprop="url" title="Trang chủ"><span itemprop="title">Trang Chủ</span></a>
	      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
	    </div>
    	<div class="box_doitac">
    		<?php if(count($doitac) > 0){ foreach ($doitac as $key => $row) { ?>
    		<a target="_blank" href="<?=$row['link']?>"><img src="thumb/152x93/1/<?=_upload_hinhanh_l.$row['photo_vi']?>" alt="<?=$row['ten_'.$lang]?>"></a>
    		<?php } }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
    	</div>
	</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>