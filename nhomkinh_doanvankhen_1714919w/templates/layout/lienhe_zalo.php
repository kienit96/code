<?php
  $d->reset();
  $sql= "select * from #_photo where hienthi=1 and type='lienhe' order by stt,id desc";
  $d->query($sql);
  $lh_zalo = $d->result_array();
?>
<script type="text/javascript">
  $(document).ready(function(e) {
    $('.lh_zalo').owlCarousel({
          loop:true,
          margin:30,
          responsiveClass:true,
          autoplay:true,
          autoplayTimeout:2000,
          autoplayHoverPause:true,
          nav:false,
          dots: false,
          navText: ["<img src='images/left.png'>","<img src='images/right.png'>"],
          responsive:{
              0:{
                  items:2,
                  
              },
              600:{
                  items:3,
              },
              1000:{
                  items:5,    
              }
          }
    })
  });
</script>
<div class="margin_auto">
  <ul class="lh_zalo">
    <?php foreach ($lh_zalo as $key => $value) { ?>
      <li>
        <a href="<?=  $value['link'] ?>" target="_blank">
          <img src="<?=_upload_hinhanh_l.$value['thumb_'.$lang]?>" />
        </a>
        <p class="mota"><?=  $value['mota'] ?></p>
        <p class="td"><?=  $value['ten_'.$lang] ?></p>
      </li>
    <?php } ?>
  </ul>
</div>