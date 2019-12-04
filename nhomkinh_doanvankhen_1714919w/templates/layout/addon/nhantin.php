<?php 
	$d->reset();
 	$sql = "select id,ten_$lang,mota_$lang,photo,name_$lang,link from #_info where type='nhantin'";
 	$d->query($sql);
  	$nhantin = $d->fetch_array(); 
?>
<div id="nhantin">
	<div class="margin_auto">
		<div class="nhantin">
			<div class="title_nt">
				<h4><?=$nhantin['name_'.$lang]?></h4>
				<p><?=$nhantin['ten_'.$lang]?></p>
			</div>
			<div class="mota_nt"><?=$nhantin['mota_'.$lang]?></p></div>
			<form action="" name="dknhantin" class="dknhantin" enctype="multipart/form-data"  accept-charset="UTF-8" method="post">
				<input class="input" type="email" name="email" id="exampleInputEmail" placeholder="Nhập email củ bạn..."  aria-describedby="emailHelp" required>
				<input type="submit" value="" />
			</form>
			<div class="loading"><img src="images/loading.gif"></div>
		</div>
	</div>
</div>