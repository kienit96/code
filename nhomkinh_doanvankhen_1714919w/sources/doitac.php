<?php 
	$d->reset();
    $sql= "select id,link,ten_$lang,photo_vi from #_photo where hienthi=1 and type='doitac' order by stt asc";
    $d->query($sql);
    $doitac = $d->result_array();

    $d->reset();
	$sql = "select title,keywords,description from #_info where type='".$type_bar."' ";
	$d->query($sql);
	$row_seo = $d->fetch_array();

	$title_bar .= $row_seo['title'];
	$keyword_bar .= $row_seo['keywords'];
	$description_bar .= $row_seo['description'];
?>