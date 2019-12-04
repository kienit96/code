<?php
	$d->reset();
    $sql = "select ten_vi,mota_vi,tenkhongdau,id from #_baiviet_list where hienthi=1 and noibat != 0 and type='tienich' order by stt,id desc";
    $d->query($sql);
    $tienich_list = $d->fetch_array();

    $d->reset();
    $sql = "select ten_$lang,id,tenkhongdau,thumb,ngaytao,photo,mota_$lang from #_baiviet where hienthi=1 and type='tienich' and id_list = ".$tienich_list['id']."  order by stt,id desc";
    $d->query($sql);
    $tienich = $d->result_array();    
?>
<script type="text/javascript">

	$(document).ready(function(e) {

		$('.owl_carousel_tienich').owlCarousel({
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

			            items:2,

			            nav:false

			        },

			        1000:{

			            items:4,

			            nav:false,

			        }

			    }

		})

	});

</script>

<div class="margin_auto">
		<div class="thanh_title"><h4><?=$tienich_list['ten_vi']?></h4>
			<p><?=$tienich_list['mota_vi']?></p>
		</div>
		<ul class="owl_carousel_tienich">
	    <?php for($j=0,$count_ch=count($tienich);$j<$count_ch;$j++){
	    ?>
			<li>
				<div class="tienich_it">
					<a href="tien-ich/<?=$tienich[$j]['tenkhongdau']?>.html" target="_blank"><img src="<?=_upload_baiviet_l.$tienich[$j]['thumb']?>"></a>
					<a href="tien-ich/<?=$tienich[$j]['tenkhongdau']?>.html" target="_blank"><h3><?=catchuoi($tienich[$j]['ten_vi'],30)?></h3></a>
				</div>				
	        </li>
		<?php } ?>
		</ul>
</div>