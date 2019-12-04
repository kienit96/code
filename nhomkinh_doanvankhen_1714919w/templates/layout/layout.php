<?php
    $d->reset();
    $sql = "select photo,thumb,ten_vi,tenkhongdau,id,mota_vi from #_album where hienthi=1 and type='Layout' order by stt,id desc limit 0,1";
    $d->query($sql);
    $album = $d->fetch_array();    

    $sql = "select * from #_album_photo where id_album='".$album['id']."' and type='Layout' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();	
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
		<div class="thanh_title"><h4><?=$album['ten_vi']?></h4>
			<p><?=$album['mota_vi']?></p>
		</div>
		<ul class="owl_carousel_album">
	    <?php for($j=0,$count_ch=count($ds_photo);$j<$count_ch;$j++){
	    ?>
			<li>
				<div class="album_it">
					<a href="hinh-anh/<?=$album['tenkhongdau']?>.html" target="_blank"><img src="<?=_upload_album_l.$ds_photo[$j]['thumb']?>"></a>  
				</div>				
	        </li>
		<?php } ?>
		</ul>
</div>