<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $('#foo4').carouFredSel({
            width: 915,
            height: 'auto',
            prev: '#prev13',
            next: '#next13',
            auto: true,
            scroll: 1
        });
    });
</script>
<style type="text/css" media="all">
.list_carousel_4 {
	width: 100%;
	float:left;
	position:relative;
	border-top:0px;
	background: url(images/bong_dm.png) no-repeat bottom center;
	margin:10px 0px 0px 0px;
}
.list_carousel_4 ul {
	margin: 0;
	width: 100%;
	padding: 0;
	list-style: none;
	display: block;
}
.list_carousel_4 li {
	display: block;
	float: left;
	margin: 0px 4px 0px 4px;
	text-align:center;
	position:relative;
	width: 220px;
	top: 0px;
}
.list_carousel_4 li a{ float: left; }
.list_carousel_4 li h3{ color: #003593; text-transform: capitalize; font-size:14px; padding: 5px 0px 0px 0px; padding: 5px; font-family: 'RobotoRegular'; font-weight: bold;}
.list_carousel_4 li:hover h3{color: #d91500;}
.list_carousel_4 li p{ color: #666; padding: 5px;}
.list_carousel_4 li img{
	width:100%;
	height: 160px;
}
.list_carousel_4 li:hover{ opacity:0.8;}
.list_carousel_4 li:after{ content: ''; width: 100%; float: left; height: 9px; background: url(images/bong_ct.png) no-repeat; }
.list_carousel_4.responsive {
	width: auto;
	margin-left: 0;
}
.clearfix {
	float: none;
	clear: both;
}
.prev13{ width: 41px; height: 36px; position: absolute; z-index: 10; background: url(images/left.png) no-repeat; top: 50px; left: 20px;}
.next13{ width: 41px; height: 36px; position: absolute; z-index: 10; background: url(images/right.png) no-repeat; top: 50px; right: 20px;}
</style>

<?php
    $d->reset();
    $sql= "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,photo from #_product where hienthi=1 and type='product' and noibat!=0 order by stt,id desc";
    $d->query($sql);
    $dichvu = $d->result_array();
?>
<div class="list_carousel_4">
	<!--<a href="#prev14" id="prev14" class="prev14"></a>
	<a href="#next14" id="next14" class="next14"></a>-->
    <div class="clearfix"></div>
	<ul id="foo4">
    <?php for($j=0,$count_ch=count($dichvu);$j<$count_ch;$j++){?>
		<li>
		<a href="bat-dong-san/<?=$dichvu[$j]['tenkhongdau']?>.html">
			<img src="<?=_upload_product_l?>220x160x1/<?=$dichvu[$j]['photo']?>" alt="<?=$dichvu[$j]['ten_'.$lang]?>" />
            <h3><?=$dichvu[$j]['ten_'.$lang]?></h3>

        </a>
        <div class="clearfix"></div>
        </li>
	<?php } ?>
	</ul>
</div>
        
        
        
		
