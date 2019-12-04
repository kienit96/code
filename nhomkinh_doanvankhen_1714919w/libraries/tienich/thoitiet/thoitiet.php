<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<base href="http://hcm.24h.com.vn/ttcb/thoitiet/" />
</head>
<style>

.tb-blue{background:#d0ebfa;}
.tb-grey1{background:#ececec;}
.tb-grey2{background:#e2e2e2;}

.tinh-tp{background:#0a6eba;color:#fff;padding:5px 10px;font-size:11px}
.tinh-tp strong{color:#fff;font-size:13px}
.tinh-tp h3{margin:0;padding:0;}

.nhietdo-big{font-size:24px;font-weight:bold;}
.nhietdo-big sup{font-size:18px;font-weight:bold;}
.nhietdo-small{font-size:14px;font-weight:bold;}
.nhietdo-small sup{font-size:12px;font-weight:bold;}



.thoitiet-cell{padding:5px 5px;}

.tt-sub-pic{height:65px;}
.tt-sub-text{width:105px}
.tt-sub-small{font-size:11px;}

.cac-tinh-khac{padding:10px 20px}
.cac-tinh-khac ul{margin:0;padding:0}
.cac-tinh-khac ul li{display:inline;width:170px;list-style:none;float:left;margin:0px 0px 0 0px}
.cac-tinh-khac ul li a{background:url(http://hcm.24h.com.vn/ttcb/thoitiet/images/icon-dot.gif) no-repeat 0px 5px;padding:0 0 7px 12px;display:block; color:#000000;}
.cac-tinh-khac ul li a:hover{text-decoration:underline; color:#072477;}

.marBot{margin-bottom:10px;}

.nguon{color:#666;text-align:center;padding:10px;}
.nguon a{color:#666}
a {
color: #0400fe;
}
a {
text-decoration: none;
}
.padTB10,.cac-tinh-khac{
	display:none;	
}
</style>
<body>
<?php
function cuop_thoitiet($url)
{
	$link = $url;
	$centent = file_get_contents($link);
	$meno = explode('<div class="greenBox-t">',$centent);
	$centent = $meno[0];
	$meno = explode('<div class="thoiTietBox" id="div_box_ban_tin_thoi_tiet">',$centent);
	$centent = $meno[1];
	return '<div class="thoiTietBox" id="div_box_ban_tin_thoi_tiet">'.$centent;	
}	
?>
<?=cuop_thoitiet('http://hcm.24h.com.vn/ttcb/thoitiet/thoitiet.php')?>
</body>
</html>