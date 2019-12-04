<?php
    $d->reset();
    $sql = "select photo,thumb,ten_vi,tenkhongdau from #_album where hienthi=1 and type='album' order by stt,id desc";
    $d->query($sql);
    $album = $d->result_array();    
?>
<script type="text/javascript">

	$(document).ready(function(e) {

		$('.owl_carousel_album').owlCarousel({
			    loop:true,
			    margin:0,
			    responsiveClass:true,
			    autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
			    responsive:{

			        0:{

			            items:1,

			            nav:false,

			        },

			        600:{

			            items:1,

			            nav:false

			        },

			        1000:{

			            items:2,

			            nav:false,

			        }

			    }

		})

	});

</script>

<div class="margin_auto">
		<div class="thanh_title"><h4>Thanh toán</h4>
		</div>
		<ul class="owl_carousel_album">
	    <?php for($j=0,$count_ch=count($album);$j<$count_ch;$j++){
	    ?>
			<li>
				<div class="album_it">
					<a href="hinh-anh/<?=$album[$j]['tenkhongdau']?>.html" target="_blank"><img src="<?=_upload_album_l.$album[$j]['thumb']?>"></a>  
				</div>				
	        </li>
		<?php } ?>
		</ul>
</div>