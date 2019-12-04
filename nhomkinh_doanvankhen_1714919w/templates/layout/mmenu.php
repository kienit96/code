<nav id="menu_mm">
  <ul>
    <li class="icon <?=$com==""?'active':''?>"><a href="./">Trang chủ</a></li>
    <li class="icon <?=$com=="gioi-thieu"?'active':''?>"><a href="gioi-thieu">Giới Thiệu</a></li>
    <li class="icon <?=$com=="san-pham"?'active':''?>"><a href="san-pham">Sản Phẩm</a>
      <?php if(count($product_list_menu) > 0){  ?>
      <ul>
        <?php foreach ($product_list_menu as $key => $rl) { ?>
          <li class="<?=$idl==$rl['id']?'active':''?> <?=$key+1==count($product_list_menu)?'end':''?>"><a href="<?=$rl['tenkhongdau']?>"><?=$rl['ten_'.$lang]?></a></li>
        <?php } ?> 
      </ul>
      <?php } ?>
    </li>
    <li class="icon <?=$com=="dich-vu"?'active':''?>"><a href="dich-vu">Dịch vụ</a></li>
    <li class="icon <?=$com=="tin-tuc"?'active':''?>"><a href="tin-tuc">Tin Tức</a></li>
    <li class="icon <?=$com=="lien-he"?'active':''?>"><a href="lien-he">Liên Hệ</a></li>
  </ul>
</nav>
<link  rel="stylesheet" href="js/mmmenu/jquery.mmenu.all.css" />
<script src="js/mmmenu/jquery.mmenu.all.min.js"></script>
<script>
  $(function() {
    $('nav#menu_mm').mmenu({
      extensions        : [ 'effect-slide-menu', 'shadow-page', 'shadow-panels', 'theme-dark'  ],
      keyboardNavigation    : true,
      screenReader      : false,
      counters        : true,
      navbar  : {
        title : 'Mobile menu'
      }
    });
  });
</script>