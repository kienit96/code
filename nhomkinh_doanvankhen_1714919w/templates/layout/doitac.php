<?php
    $d->reset();
    $sql= "select id,link,ten_$lang,photo_vi from #_photo where hienthi=1 and type='doitac' order by stt asc";
    $d->query($sql);
    $doitac = $d->result_array();

    if(count($doitac) > 0){
?>
<div id="doitac">
	<div class="margin_auto">
		<div class="owl_doitac">
		    <?php for($j=0,$count_ch=count($doitac);$j<$count_ch;$j++){ ?>
				<div class="doitac hover_zoom"><a target="_blank" href="<?=$doitac[$j]['link'];?>"><img src="thumb/185x100/2/<?=_upload_hinhanh_l.$doitac[$j]['photo_vi']?>" alt="<?=$doitac[$j]['ten_'.$lang]?>" /></a></div>
		    <?php } ?>
		</div>
	</div>
</div>
<?php } ?>