<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nguyễn Đình Hiếu - 01212.901.191</title>
</head>
<style>
.bigTitle{text-align:center;font-size:18px;font-weight:bold;color:#ff0000;}
.bangGiaVangContainer{padding:5px 0 5px 0}
.capNhat{text-align:center;padding:5px 0;}
.capNhatDate{font-style:italic;background:url(http://hcm.24h.com.vn/ttcb/giavang/images/update-bg.gif) repeat;padding:5px 8px;overflow:hidden;height:18px;margin:3px 0;}
.capNhatNum{font-size:18px;font-weight:bold;color:#ff0000;/*background:url(../images/update-bg.gif) repeat-x;*//*padding:2px 5px;*//*margin:0 3px*/}

.tb-giaVang{background:#e2c089;}
.giaVangHeader{background:url(../images/giaVangHeader.gif) repeat-x;height:40px;margin: 1px 0 0 0;text-align:center;font-weight:bold;color:#000;}
.giaVangHeaderDate{color:#ff0000;font-style:italic;}

.giaVangHeader2{background:#d99528;height:28px;margin:1px;padding:0 0 0 10px;font-weight:bold;color:#fff;}
.cellWhite{background:#fff;padding:0 0 0 10px;height:28px;}
.cellGrey{background:#f4f4f4;padding:0 0 0 10px;height:28px;}
.cellYellow{background:#fffdd6;padding:0 0 0 10px;height:28px;font-weight:bold;}
.loaiVang{font-weight:bold;color:#000;}
.loaiVangSub{padding-left:30px;}
.priceUp{color:#029906;padding-right:3px;}
.priceDown{color:#ff0000;padding-right:3px;}

</style>
<body>
<?php
function cuop_thoitiet($url)
{
	$link = $url;
	$centent = file_get_contents($link);
	$meno = explode('<div class="marTB10">',$centent);
	$centent = $meno[0];
	$meno = explode('<div align="center" class="marT10">',$centent);
	$centent = $meno[1];
	return '<div align="center" class="marT10">'.$centent;	
}
?>
<?=cuop_thoitiet('http://hcm.24h.com.vn/ttcb/giavang/giavang.php')?>
</body>
</html>