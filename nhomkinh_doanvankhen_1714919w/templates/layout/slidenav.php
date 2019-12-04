<?php 
	$d->reset();
	$sql = "select id,ten_vi,photo,tenkhongdau,photo,ngaytao from #_product_list where hienthi=1 and type='product' order by stt,id desc";
	$d->query($sql);
	$row_list = $d->result_array();

	$d->reset();
	$sql= "select link,photo_$lang,ten_$lang from #_photo where hienthi=1 and type='apps' order by stt,id desc ";
	$d->query($sql);
	$apps = $d->result_array();
?>
<div id="mySidenav" class="sidenav">
	<div class="khung">
	  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  	<form action="" name="frm2" class="search_nav">
	  		<input type="text" autocomplete="off" name="keywords" id="name_tk" class="" placeholder="<?=_tukhoa?>">
	  		<button type="submit" value="" class="nut_tim"></button>
		</form>
	  	<ul>
	  		<li><a href="./"><?=_trangchu?></a></li>
	  		<li><a href="gioi-thieu"><?=_gioithieu?></a></li>
	  		<li class="li_sp"><a href="san-pham"><?=_sanpham?></a>
	  			<?php  if(count($row_list) > 0){ ?><i data-l="list" class="fa fa-angle-down" aria-hidden="true"></i><?php } ?>
	  			<ul class="list">
	              <?php for($j=0,$count_ct=count($row_list);$j<$count_ct;$j++){ 
	                $d->reset();
	                $sql = "select ten_vi,photo,tenkhongdau,thumb,ngaytao,id from #_product_cat where hienthi=1 and type='product' and id_list = ".$row_list[$j]['id']." order by stt,id desc";
	                $d->query($sql);
	                $product_cat = $d->result_array();
	              ?>
	               <li><a href="<?=$row_list[$j]['tenkhongdau']?>"><i class="fa fa-square" aria-hidden="true"></i><?=$row_list[$j]['ten_'.$lang]?></a><?php  if(count($product_cat) > 0){ ?><i class="fa fa-angle-down" data-l="cat" aria-hidden="true"></i><?php } ?>
	                <?php if(count($product_cat) > 0) { ?>
	                <ul class="cat">
	                  <?php  for($i=0,$count_c=count($product_cat);$i<$count_c;$i++){ 
	                    $d->reset();
	                    $sql = "select ten_vi,photo,tenkhongdau,thumb,ngaytao from #_product_item where hienthi=1 and type='product' and id_cat = ".$product_cat[$i]['id']." order by stt,id desc";
	                    $d->query($sql);
	                    $product_item = $d->result_array();
	                  ?>
	                     <li><a href="<?=$product_cat[$i]['tenkhongdau']?>"><i class="fa fa-plus-square" aria-hidden="true"></i></i><?=$product_cat[$i]['ten_'.$lang]?></a><?php  if(count($product_item) > 0){ ?><i data-l="item" class="fa fa-angle-down" aria-hidden="true"></i><?php } ?> 
	                      <?php  if(count($product_item) > 0){ ?>
	                        <ul class="item">
	                          <?php  for($k=0,$count_i=count($product_item);$k<$count_i;$k++){  ?>
	                          <li><a href="<?=$product_item[$k]['tenkhongdau']?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?=$product_item[$k]['ten_'.$lang]?></a></li>
	                          <?php } ?>
	                        </ul>
	                      <?php } ?>
	                     </li>
	                    <?php } ?>
	                </ul>
	                <?php } ?>
	               </li>
	              <?php } ?>
	            </ul>
	  		</li>
	  		<li class="li_dv"><a href="dich-vu"><?=_dichvu?></a></li>
	  		<li class="li_tt"><a href="tin-tuc"><?=_tintucsukien?></a></li>
	  		<li class="li_td"><a href="tuyen-dung"><?=_tuyendung?></a></li>
	  		<li class="li_ch"><a href="cau-hoi"><?=_cauhoithuonggap?></a></li>
	  		<li class="li_lh"><a href="lien-he"><?=_lienhe?></a></li>
	  	</ul>
	  	<p class="phone"><?=$row_setting['hotline']?></p>
	  	<div class="apps">
	  		<?php foreach ($apps as $key => $a) { ?>
	  		<a target="_blank" href="<?=$a['link']?>"><img src="thumb/394x117/1/<?=_upload_hinhanh_l.$a['photo_'.$lang]?>" alt="<?=$a['ten_'.$lang]?>"></a>
	  		<?php } ?>
	  	</div>
  	</div>
</div>
<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	}
	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	}
	$('.sidenav ul li i').click(function(){
	    var clss = $(this).attr('class');
	    var loai = $(this).data('l');
	    $(this).attr('class','')
	    if(clss == 'fa fa-angle-down'){
	      $(this).attr('class','fa fa-angle-up');
	    }else{
	      $(this).attr('class','fa fa-angle-down');
	    }
	    $(this).parents('li').children('ul.'+loai).slideToggle(300);
	});
	$('.search_nav').submit(function(){
		var timkiem = $('.search_nav input#name_tk').val();
		if(timkiem != ''){
			window.location.href="tim-kiem&keywords="+timkiem;
		}else{
			$('.search_nav input#name_tk').focus();
		}
      	
      	return false;
    });
</script>