<?php
	$d->reset();
    $sql= "select * from #_photo where hienthi=1 and type='hinhanh' order by stt,id desc";
    $d->query($sql);
    $hinhanh = $d->result_array();
?>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.owl-carousel').owlCarousel({
			    loop:true,
			    margin:30,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:2,
			            nav:true
			        },
			        600:{
			            items:3,
			            nav:false
			        },
			        1000:{
			            items:5,
			            nav:false,
			            loop:false
			        }
			    }
		})
		
	});
</script>
<div class="owl-carousel load_top">
	<?php for($i=0;$i<count($hinhanh);$i++){?>
	    <div class="item1">
	      <a href="<?=$hinhanh[$i]['link']?>" class="colorbox">
	            <img src="<?=_upload_hinhanh_l.$hinhanh[$i]['thumb_'.$lang]?>" alt='<?=$hinhanh[$i]['ten_'.$lang]?>'>
	            <span><?=$hinhanh[$i]['ten_'.$lang]?></span>
	      </a>
	    </div>
	<?php } ?>
</div>