<?php 
	$d->reset();
    $sql = "select thumb_$lang,link,hienthi from #_photo where type='popup'";
    $d->query($sql);
    $popup = $d->fetch_array();
?>
<?php if($popup['hienthi']==1){?>
<script type="text/javascript">
	$(document).ready(function () {
		$("a.fancybox").fancybox({open:true});
		setTimeout(function(){
			$("#popub").fadeIn();
			$heightP=$(".popub").height();
			$heightW=$(window).height();
			console.log($heightW);
			console.log($heightP);
			if($heightW>$heightP){
				if($heightW-$heightP>120){
					$(".popub").css({"height":$heightP,"top":($heightW-$heightP)/2});
				}else{
					$(".popub").css({"height":$heightW-120,"top":"60px"});
				}
			}else{
				$(".popub").css({"height":$heightW-120,"top":"60px"});
			}
		},500)
		$("#popub .close_popup").click(function(){
			$("#popub").remove();
		})
		
	})
</script>
<a href="#popub" class="fancybox"></a>
<div id="popub">
	<div class="popub">
		<div class="close_popup"></div>
		<a href="<?=$popup['link']?>" >
			<img src="thumb/600x500/1/<?=_upload_hinhanh_l.$popup['photo_'.$lang]?>" alt="popup" class="img-responsive" />
		</a>
	</div>
</div>
<?php  } ?>