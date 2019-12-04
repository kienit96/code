<style>
	.toolbar{
	  background: #1f73cd;
	  display: inline-block;
	  width: 100%;
	  padding: 10px 0;
      left: 0;
	  bottom: 0;
	  position: fixed;
	  z-index: 9999999;
	  height: auto;
	  display: none;
	  /*box-shadow: 0 -1px 2px 1px #00000038;*/
	}
	.toolbar ul{
		list-style: none;
	  	padding: 0;
	}
	.toolbar ul li{
	  text-align: center;
	  float: left;
	  width: calc(100% / 4);
	  line-height: 1;
	}
	.toolbar ul li a{
	  display: block;
	  width: 100%;
	}
	.toolbar ul li a span {
		font-weight: 400;
		color: #ffffff;
		font-size: 14px;
		display: block;
	}
	.toolbar ul li a img {
		height: 15px;
		width: auto;
		margin-bottom: 5px;
	}
	.wrap_multiphone {display: none; position:  absolute;bottom: 60px;left: 10px;border-radius: 10px;border: 1px solid #ddd;padding: 5px 20px;background: #fff;}

    .wrap_multiphone a {
        color: #333 !important;
        display: block;
        line-height: 25px !important;
    }
	@media(max-width: 1000px){
		.toolbar{display: block;}
	}
</style>
<?php $arr_hotline = explode('-', $row_setting['hotline']); ?>
<div class="toolbar">
	<ul>
		<li class="goidien">
			<a  target="_blank"  id="goidien" title="title">
				<img src="images/i1.png" alt="images">
				<span>Gọi điện</span>
			</a>
			<div class="wrap_multiphone clearfix">
                <?php foreach ($arr_hotline as $key => $hl) { ?>
                <a href="tel:<?=$hl?>">Gọi: +<?=$hl?></a>
                <?php } ?>
            </div>
		</li>
		<li class="goidien">
			<a target="_blank"  id="sms" title="title">
				<img src="images/i2.png" alt="images">
				<span>SMS</span>
			</a>
			<div class="wrap_multiphone clearfix">
                <?php foreach ($arr_hotline as $key => $hl) { ?>
                <a href="sms:<?=$hl?>">sms: +<?=$hl?></a>
                <?php } ?>
            </div>
		</li>
		<li>
			<a target="_blank"  id="chatzalo" href="https://zalo.me/<?=str_replace(" ","",$row_setting['oaid'])?>" title="title">
				<img src="images/i3.png" alt="images">
				<span>zalo</span>
			</a>
		</li>
		<li>
			<a target="_blank" id="chiduong" href="https://google.com/maps/place/<?=$row_setting['toado']?>" title="title">
				<img src="images/i5.png" alt="images">
				<span>Chỉ đường</span>
			</a>
		</li>
	</ul>
</div>
<script>
    $(document).ready(function() {
        $('.goidien').click(function(event) {
            $('.wrap_multiphone').fadeOut();
            if($(this).hasClass('actived')) {
                $(this).removeClass('actived');
                $(this).find('.wrap_multiphone').fadeOut();
            }
            else {
                $(this).addClass('actived');
                $(this).find('.wrap_multiphone').fadeIn();
            }
        });
    });
</script>