<?php
	$d->reset();
	$sql="select * from #_lang_define order by id desc";
	$d->query($sql);
	$define = $d->result_array();
	foreach($define as $v){
		@define($v["ten"], $v["lang_".$lang]==''?$v["ten"]:$v["lang_".$lang]);
	}
?>