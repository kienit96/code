<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');

  if(!isset($_SESSION['lang'])) {
  $_SESSION['lang']='vi'; }
  $lang=$_SESSION['lang'];    
  $lang = "vi";

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
  include_once _lib."functions_share.php";
  include_once _lib."class.database.php";
  $d = new database($config['database']);
  include_once _source."lang.php";
	include_once _lib."functions_giohang.php";
  include_once _source."template.php";
	include_once _lib."file_requick.php";
	include_once _lib."counter.php";
	$pageURL=getCurrentPageURL();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<base href="http://<?=$config_url?>/">
<link id="favicon" rel="shortcut icon" href="thumb/40x40/2/<?=_upload_hinhanh_l.$favicon['photo_'.$lang]?>" type="image/x-icon" />
<title><?=$title_bar?></title>
<meta name="description" content="<?=$description_bar?>">
<meta name="keywords" content="<?=$keyword_bar?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="robots" content="<?php if($meta_index!=''){ echo $meta_index;} else { echo "noodp,index,follow";} ?>" />
<meta http-equiv="audience" content="General" />
<meta name="resource-type" content="Document" />
<meta name="distribution" content="Global" />
<meta name='revisit-after' content='1 days' />
<meta name="ICBM" content="<?=$row_setting['toado']?>">
<meta name="geo.position" content="<?=$row_setting['toado']?>">
<meta name="geo.placename" content="<?=$row_setting['diachi_'.$lang]?>">
<meta name="author" content="<?=$row_setting['ten_'.$lang]?>">
<link rel="canonical" href="<?=getCurrentPageURLCNC()?>" />
<meta property="og:site_name" content="<?=$row_setting['website']?>" />
<meta property="og:type" content="<?=$type_og?>" />
<meta property="og:locale" content="vi_VN" />
<meta name="twitter:card" value="summary">
<meta name="twitter:url" content="<?=getCurrentPageURL()?>">
<meta name="twitter:title" content="<?=$title_bar?>">
<meta name="twitter:description" content="<?=$description_bar?>">
<meta name="twitter:image" content="<?=get_http().$config_url.'/thumb/200x200/2/'.$upload_file.$row_detail['photo']?>"/>
<meta name="twitter:site" content="<?=$title_bar?>">
<meta name="twitter:creator" content="<?=$title_bar?>">
<meta name="dc.language" CONTENT="vietnamese">
<meta name="dc.source" CONTENT="http://<?=$config_url?>/">
<meta name="dc.title" CONTENT="<?=$title_bar?>">
<meta name="dc.keywords" CONTENT="<?=$keyword_bar?>">
<meta name="dc.description" CONTENT="<?=$description_bar?>">
<meta property="og:url" content="<?=getCurrentPageURL()?>" />
<meta property="og:image" content="<?=get_http().$config_url.'/thumb/200x200/2/'.$upload_file.$row_detail['photo']?>" />
<meta property="og:image:alt" content="<?=$title_bar?>" />
<meta property="og:description" content="<?=$description_bar?>" />
<meta property="og:image:url" content="<?=get_http().$config_url.'/thumb/200x200/2/'.$upload_file.$row_detail['photo']?>" />
<meta name="dc.publisher" content="<?=$row_setting['ten_'.$lang]?>" />
<link href="style.css?t=<?=time()?>" rel="stylesheet"  />
<link href="js/menu_bar/css/style.css" rel="stylesheet"  />
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet"  />
<link href="js/toast/toastr.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="js/fancybox3/jquery.fancybox.min.css" />
<?php if($com == 'gio-hang'){ ?>
<link rel="stylesheet" href="css/giohang.css" />
<?php } ?>
<?php if($com == 'thanh-toan'){ ?>
<link rel="stylesheet" href="css/checkout.css" />
<?php } ?>
<?php include _template."layout/background.php"; ?>
<?php if($com == ""){ ?>
<link rel="stylesheet" href="ajax_paging/ajax.css" />
<?php } ?>
<?php if($template == 'product_detail'){ ?>
<link href="js/magiczoomplus/magiczoomplus.css" rel="stylesheet"  media="screen"/>
<?php } ?>
<link rel="stylesheet" href="js/slick/slick.css">
<link rel="stylesheet" href="js/slick/slick-theme.css">
<?=$row_setting['analytics']?> 
<?=$row_setting['code_head']?>   
</head>
<body>
<?=$row_setting['code_body']?>  
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=629584947171673";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<div id="container">
  <header>
    <?php include _template."layout/header.php"; ?>         
  </header>
  <main>
    <?php include _template.$template."_tpl.php"; ?>
  </main>
  <footer>
    <?php include _template."layout/footer.php"; ?>
  </footer> 
</div>
<div id="back-to-top"><a href="javascript:void(0)"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a></div>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/slick/slick.min.js" charset="utf-8"></script> 
<script src="js/toast/toastr.min.js"></script>
<script src="js/masonry.js"></script>
<script src="js/fancybox3/jquery.fancybox.min.js"></script>
<script>$("[data-fancybox]").fancybox({});</script>
<script >
  $(window).scroll(function(event) {
    var scroll_top = $(document).scrollTop();
    if(scroll_top >= $('#header').height()){
      $('#mainmenu').addClass('fixed');
    } else {
      $('#mainmenu').removeClass('fixed');
    }
  });
  $(document).ready(function() { $('#slider').fadeIn(); });
  $("#container iframe,#container embed").each(function(e,n){$(this).wrap("<div class='video-container'></div>")});
  $("#container table").each(function(e,t){$(this).wrap("<div class='table-responsive'></div>")}); 
</script>
<?php if($com==""||$com=='lien-he'){ ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?=$sitekey?>"></script>
<?php } if($com == 'lien-he'){ ?>
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('<?=$sitekey?>', {action: 'contact'}).then(function(token) {
      var recaptchaResponse = document.getElementById('recaptchaResponse');
      recaptchaResponse.value = token;
    });
  });
</script>
<?php } ?>
<script>
  $(document).ready(function() {
    $('#timkiem .frm_timkiem').submit(function(){ 
      var timkiem = $('#timkiem input').val();
      if(!timkiem){
        //$('#timkiem input').toggleClass('show');
        toastr["warning"]("Nhập từ khóa tìm kiếm !");
      } else {
        window.location.href="tim-kiem&keywords="+timkiem;
      }
      return false;
    });
  });
</script>
<?php if($template == 'service_detail'){ ?>
<script>
  $(document).ready(function(e) {
    $('.owl_tinkhac').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      infinite: true,
      centerMode: false,
      focusOnSelect: false,
      arrows: false,
      vertical: false,
      verticalSwiping: false,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
        {
          breakpoint: 1000,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },{
          breakpoint: 750,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },{
          breakpoint: 380,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });
  });
</script>
<?php } ?>
<script>$("#comment").load("ajax/load_comment.php?url="+$("#comment").data("url"));</script>
<script>
  if ($('#back-to-top').length) {
    var scrollTrigger = 200, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').show();
            } else {
                $('#back-to-top').hide();
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
  }
</script>
<?=$row_setting['vchat']?>
<script type="application/ld+json"> { 
  "@context" : "http://schema.org", 
"@type" : "LocalBusiness",
"name" : "<?=$row_setting['ten_'.$lang]?>", 
"image" : "http://<?=$config_url?>/<?=_upload_hinhanh_l.$favicon['photo_vi']?>",
"telephone" : "<?=$row_setting['dienthoai']?>", 
"priceRange " : " VND ", 
"email" : "<?=$row_setting['email']?>", 
"address" : { 
  "@type" : "PostalAddress",
  "streetAddress" : "  ",
  "addressLocality" : "  ", 
  "addressRegion" : " TP HCM ", 
  "addressCountry" : " Việt Nam ", 
  "postalCode" : " 70000 " },
  "openingHoursSpecification" : { "@type" : "OpeningHoursSpecification", 
"opens" : "T8:00", 
"closes" : "T17:30" }, 
"url" : "<?=getCurrentPageURL()?>" } 
</script>
<?php if($template == "product_detail"){ ?>
<script src="js/magiczoomplus/magiczoomplus.js"></script>
<script>
  $(document).ready(function() {
    $('#tabs li a').click(function(){
      var id = $(this).attr('data-id');
      $('#tabs li').removeClass('active');
      $(this).parent().addClass('active');
      $('.tabct').removeClass('tab_show');
      $('.tabct').removeClass('tab_hidden');
      $('.tabct').addClass('tab_hidden');
      $('#'+id).addClass('tab_show');
    });
  });
</script>
<script>
  $('.owl_sp').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    infinite: true,
    centerMode: false,
    focusOnSelect: false,
    arrows: false,
    vertical: false,
    verticalSwiping: false,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1000,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },{
        breakpoint: 750,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      }
    ]
  });
</script>
<script language="javascript">
  $('#foo3').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    dots: false,
    infinite: false,
    centerMode: false,
    focusOnSelect: false,
    arrows: true,
    nextArrow: '<img src="images/right_lv.png" class="foo3_r" alt="right">',
    prevArrow: '<img src="images/left_lv.png" class="foo3_l" alt="left">',
    vertical: false,
    verticalSwiping: false,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 1,
      }
    },{
      breakpoint: 980,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    }
    ]
  });
</script>
<?php } ?>
<?php if($template == 'index'){ ?>
<script src="ajax_paging/paging.js"></script>
<script language="javascript" type="text/javascript" src="js/amazingslider/amazingslider.js"></script>
<script src="js/amazingslider/initslider-1.js"></script>
<script>
  $('.slick_img').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    variableWidth: false,
    vertical: false,
    verticalSwiping: false,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
    {
      breakpoint: 750,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },{
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
    ]
  });
  $('.slick_visao').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    centerMode: false,
    variableWidth: false,
    focusOnSelect: false,
    vertical: true,
    verticalSwiping: true,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
    {
      breakpoint: 650,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
    ]
  });
  $('.scroll_tintuc').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    centerMode: false,
    variableWidth: false,
    focusOnSelect: false,
    vertical: true,
    verticalSwiping: true,
    autoplay: true,
    autoplaySpeed: 3000,
  });
  $('.slick_video').slick({
      lazyLoad: 'ondemand',
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      infinite: true,
      centerMode: false,
      variableWidth: false,
      focusOnSelect: false,
      vertical: false,
      verticalSwiping: false,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
      {
        breakpoint: 1000,
        settings: {
          vertical: false,
          verticalSwiping: false,
          slidesToShow: 6,
          slidesToScroll: 1,
          infinite: false,
        }
      },{
        breakpoint: 600,
        settings: {
          vertical: false,
          verticalSwiping: false,
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: false,
        }
      },{
        breakpoint: 400,
        settings: {
          vertical: false,
          verticalSwiping: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: false,
        }
      }
      ]
  });
  $('.slick_video .vi').click(function(){
      var id = $(this).data('id');
      $('.video_bot .iframe iframe').attr('src','https://www.youtube.com/embed/'+id);
  });
</script>
<script>
  $('.dknhantin').submit(function(event) {
    var email = $('.dknhantin input[name=email]').val();
    $('.loading').fadeIn();
    grecaptcha.ready(function() {
      grecaptcha.execute('<?=$sitekey?>', {action: 'nhantin'}).then(function(token) {
        $.ajax ({
          type: "POST",
          url: "ajax/dangky_email.php",
          data: {email,recaptcha_response:token,type:'nhantin'},
          success: function(result) { 
            if(result==0){
              $('.dknhantin input[name=email]').val('');
              toastr["success"]("Đăng ký thành công");
            } else if(result==1){
              toastr["warning"]("Email đã đăng ký");
              $('.dknhantin input[name=email]').val('');
            } else if(result==2){
              toastr["warning"]("Đăng ký thất bại");
              $('.dknhantin input[name=email]').val('');
            }
            $('.loading').fadeOut();
          }
        });
      });
    });
    return false;
  });
</script>
<?php }else{ ?>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c6f62ebc807c8bf"></script>
<?php } ?>
<?php include _template."layout/mmenu.php"; ?>
<?php include _template."layout/addon/facebook.php"; ?>
<?php include _template."layout/addon/goidien2.php"; ?>
<?php include _template."layout/addon/zalo.php"; ?>
<?=$row_setting['code_footer']?>
</body>
</html>