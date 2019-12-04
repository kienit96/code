<?php

	if($source == "product"){
		$table = "product";
	}else{
		$table = "baiviet";
	}

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_".$table."_list where id='".$row_detail['id_list']."' ";
	$d->query($sql);
	$row_detail_list = $d->fetch_array();

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_".$table."_cat where id='".$row_detail['id_cat']."' ";
	$d->query($sql);
	$row_detail_cat = $d->fetch_array();

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_".$table."_item where id='".$row_detail['id_item']."' ";
	$d->query($sql);
	$row_detail_item = $d->fetch_array();
?>
<div class="dieuhuong">  
	<a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
	<?php if($temp_detail != "true"){ ?><a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a><?php } ?>
	<?php if($row_detail_list['id'] !=''){?>
	<a href="<?=$row_detail_list['tenkhongdau']?>" title="<?=$row_detail_list['ten_'.$lang]?>" itemprop="url" ><span itemprop="title"><?=$row_detail_list['ten_'.$lang]?></span></a> 
	<?php } ?>
	<?php if($row_detail_cat['id']!=''){?>
	<a href="<?=$row_detail_cat['tenkhongdau']?>" title="<?=$row_detail_cat['ten_'.$lang]?>" itemprop="url" ><span itemprop="title"><?=$row_detail_cat['ten_'.$lang]?></span></a>
	<?php }  ?>
	<?php if($row_detail_item['id']!=''){?>
	<a title="<?=$row_detail_item['ten_'.$lang]?>" itemprop="url" href="<?=$row_detail_item['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_item['ten_'.$lang]?></span></a>
	<?php } ?>
	<?php if($row_detail['ten_'.$lang]!=""){ ?>
	<a title="<?=$row_detail['ten_'.$lang]?>" itemprop="url" href="<?=$row_detail['tenkhongdau']?>"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a>
	<?php } ?>
</div>
