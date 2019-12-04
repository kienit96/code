<?php
	error_reporting(0);
	session_start();
	$session=session_id();
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');
    
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	
	$d = new database($config['database']);
	
	$id_map = $_POST['id'];
		
	$d->reset();
	$sql = "select * from #_chinhanh where hienthi=1 and type='chinhanh' and id='".$id_map."' order by stt,id desc ";
	$d->query($sql);
	$chinhanh = $d->fetch_array();
	
?>

<script>
function initialize_chi() {
    var myLatlng = new google.maps.LatLng(<?=$chinhanh['toado']?>);
    var mapOptions = {
        zoom: 14,
        center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map_canvas_chinhanh'), mapOptions);

    var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'><?=$chinhanh['ten_'.$lang]?></th></tr><tr><th><?=_diachi?> : <?=$chinhanh['diachi_'.$lang]?></th></tr><tr><th><?=_dienthoai?> : <?=$chinhanh['dienthoai']?></th></tr><tr><th>Email : <?=$chinhanh['email']?></th></tr></table>";

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "<?=$chinhanh['ten_'.$lang]?>"
    });
    infowindow.open(map, marker);
}
</script>
<div id="map_canvas_chinhanh"></div>