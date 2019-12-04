<?php
$d->reset();
$sql = "select * from #_yahoo where hienthi=1 order by stt,id desc ";
$d->query($sql);
$row_yahoo = $d->result_array();
?>
<div class="hotro_right">
	<div class="hotro_bt">
		<div class="hotline_bt">
			<p> <?=$row_setting['hotline']?></p>
		</div>
		<?php for($i=0,$count_ya=count($row_yahoo);$i<$count_ya;$i++){?>
			<div class="yahoo">
			    <p class="dienthoai">
			        <span><?=$row_yahoo[$i]['ten_'.$lang]?></span>
			        <b><?=$row_yahoo[$i]['dienthoai']?></b>
			        <b><?=$row_yahoo[$i]['email']?></b>
			    </p>
			</div>
		<?php }?>
	</div>
	<div id="img"><img src="images/hotrott.png"></div>
</div>
<script type="text/javascript">
	$('.hotro_right #img').click(function(event) {
      /* Act on the event */
      if($('.hotro_right').hasClass('active')){
        $('.hotro_right').removeClass('active');
      } else {
        $('.hotro_right').addClass('active');
      }
      return false;
    });
</script>