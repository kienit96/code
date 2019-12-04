<?php
	$d->reset();
	$sql = "select * from #_yahoo where hienthi=1 order by stt,id desc ";
	$d->query($sql);
	$row_yahoo = $d->result_array();
?>
<script>
    $(document).ready(function(){
		$('.hotro_right').hover(function(){
			$('.hotro_right .noidung_20').slideDown(800);
		},function(){
			$('.hotro_right .noidung_20').slideUp(800);
		}); 
	}); 	
</script>
<div class="hotro_right">
<p class="hotro_tt"><img src="images/httt.png" alt='icon' /></p>

<div class="noidung_20">
<div class="hotline_r"><span> Hotline:  <?=$row_setting['hotline']?></span></div>
<?php for($i=0,$count_ya=count($row_yahoo);$i<$count_ya;$i++){?>
	<div class="yahoo">
	    <p class="hinh col-md-12">
	    <a href="ymsgr:sendIM?<?=$row_yahoo[$i]['yahoo']?>"><img src="images/yahoo.png" title="yahoo" alt=""></a>
	    <a href="Skype:<?=$row_yahoo[$i]['skyper']?>?chat"> <img src="images/skyper.png" title="skyper" alt=""> </a>
	    <span><?=$row_yahoo[$i]['ten']?></span>
	    </p>
	    <p class="dienthoai col-md-5 col-sm-5 col-xx-12 col-xs-12"><?=$row_yahoo[$i]['dienthoai']?></p>
	    <p class="email col-md-7 col-sm-7 col-xx-12 col-xs-12"><?=$row_yahoo[$i]['email']?></p>
	 </div>
<?php }?>
</div>
</div>