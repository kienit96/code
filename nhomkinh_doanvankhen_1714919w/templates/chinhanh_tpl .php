<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong   ">  
      <a href="./" itemprop="url" title="Trang chủ"><span itemprop="title">Trang Chủ</span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
    </div>
    <?php if(count($hethong) > 0){ ?>
    <div class="box_hethong">
    	<ul class="list_hethong">
    		<?php foreach ($hethong as $key => $row) { ?>
    		<li <?=$key==0?'class="active"':''?> data-id="<?=$row['id']?>"><?=$row['ten_'.$lang]?></li>
    		<?php } ?>
    	</ul>
    	<div class="list_map">
    		<?php foreach ($hethong as $key => $row) { ?>
    		<div data-id="<?=$row['id']?>" class="map <?=$key==0?'active':''?>"><?=$row['mota_'.$lang]?></div>
    		<?php } ?>
    	</div>
    </div>
	<?php }else{ ?><div class="updating">Nội dung đang cập nhật</div><?php } ?>
	</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>