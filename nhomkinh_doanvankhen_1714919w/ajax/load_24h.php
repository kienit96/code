<?php

	$filePath = "http://www.24h.com.vn/ttcb/thoitiet/thoi-tiet-tpho-chi-minh";
	$dom = file_get_contents($filePath);

	$file = explode('<td class="thoitiet-cell" valign="top">',$dom);

	for($i=1;$i<=2;$i++){
		echo "<div class='homnay'>";
		if($i==1){ echo "<p>Hôm nay</p>";} else { echo "<p>Ngày mai</p>";}
		$file1 = explode('</td>',$file[$i]);
		echo $file1[0];
		echo "</div>";
	}
?>