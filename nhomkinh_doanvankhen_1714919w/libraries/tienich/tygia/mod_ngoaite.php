 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
*{ font-size: 14px; font-family: 'Arial' }
.thongbao-text {    float: left;     width: 384px;padding:0 0 0 10px}
.thongbao-img {    float: left;    width: 120px;text-align:center}
.capNhat{text-align:center;padding:5px 0;margin:0 0 8px 0}
.capNhatDate{font-style:italic;background:url(http://static.24h.com.vn/images/2014/ty_gia/update-bg.gif) repeat;padding:5px 8px;overflow:hidden;height:18px;margin:3px 0;}
.capNhatNum{font-size:18px;font-weight:bold;color:#ff0000;/*background:url(http://static.24h.com.vn/images/2014/ty_gia/update-bg.gif) repeat-x;*//*padding:2px 5px;*//*margin:0 3px*/}
.tb-giaVang{background:#e7e7e7;}
.giaVangHeader{background:#cde6c3;height:40px;margin: 1px 0 0 0;text-align:center;font-weight:bold;color:#000;}
.giaVangHeaderDate{color:#ff0000;font-style:italic;}
.giaVangHeader2{background:#1c7964;height:28px;margin:1px;padding:5px;font-weight:bold;color:#fff;text-align:center}
.cellWhite{background:#fff;padding:0 5px;height:28px;text-align:right}
.cellGrey{background:#f4f4f4;padding:5px;height:28px;text-align:right}
.cellGrey-sub{background:#e6e6e6;padding:7px 0 7px 10px;height:16px;font-weight:bold;color:#000}
.cellYellow{background:#f0f9de;padding:0 5px 0 5px;height:28px;font-weight:bold;text-align:right}
.loaiVang{font-weight:bold;color:#000;}
.loaiVangSub{padding-left:20px;font-weight:bold;}
.priceUp{color:#029906;padding-right:3px;display:inline-block;text-align:right}
.priceDown{color:#ff0000;padding-right:3px;display:inline-block;text-align:right}
.priceNormal{color:#333333;padding-right:15px;display:inline-block;text-align:right}
.dangCapNhat{color:#777;font-weight:normal;font-style:italic;font-size:11px}

</style>
<body>
<?php
function cuop_thoitiet($url)
{
	$link = $url;
	$centent = file_get_contents($link);
	$meno = explode('<table width="100%" cellpadding="1" cellspacing="1" border="0" class="tb-giaVang">',$centent);
	$centent = $meno[1];
	$meno = explode('</table>',$centent);
	$centent = $meno[0];
	return '<table width="100%" cellpadding="1" cellspacing="1" border="0" class="tb-giaVang">'.$centent.'</table>';	
}
?>
<?=cuop_thoitiet('http://hcm.24h.com.vn/ttcb/tygia/tygia.php')?>
</body>
</html>