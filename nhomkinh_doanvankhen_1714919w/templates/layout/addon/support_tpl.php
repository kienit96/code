<style>
.support-online {
    position: fixed;
    z-index: 999;
    left: 0;
    bottom:0px;
}
@media only screen and (max-width:992px) {.support-online{display: block}}
.support-online a {
    position: relative;
    margin: 20px 20px;
    text-align: left;
    width: 40px;
    height: 40px;
}

.support-online i {
    width: 40px;
    height: 40px;
    background: #43a1f3;
    color: #fff;
    border-radius: 100%;
    font-size: 20px;
    text-align: center;
    line-height: 1.9;
    position: relative;
    z-index: 999;
}

.support-online a span {
    border-radius: 2px;
    text-align: center;
    background: rgb(103, 182, 52);
    padding: 9px;
    display: none;
    width: 180px;
    margin-left: 10px;
    position: absolute;
    color: #ffffff;
    z-index: 999;
    top: 0px;
    left: 40px;
    transition: all 0.2s ease-in-out 0s;
    -moz-animation: headerAnimation 0.7s 1;
    -webkit-animation: headerAnimation 0.7s 1;
    -o-animation: headerAnimation 0.7s 1;
    animation: headerAnimation 0.7s 1;
}

.support-online a:hover span {
    display: block;
}

.support-online a {
    display: block;
}

.support-online a span:before {
    content: "";
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 10px 10px 10px 0;
    border-color: transparent  rgb(103, 182, 52) transparent transparent;
    position: absolute;
    left: -10px;
    top: 10px;
}

.kenit-alo-circle-fill {
    width: 60px;
    height: 60px;
    top: -10px;
    position: absolute;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid transparent;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    background-color: rgba(0, 175, 242, 0.5);
    opacity: .75;
    right: -10px;
}

.kenit-alo-circle {
    width: 50px;
    height: 50px;
    top: -5px;
    right: -5px;
    position: absolute;
    background-color: transparent;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid rgba(30, 30, 30, 0.4);
    opacity: .1;
    border-color: #0089B9;
    opacity: .5;
}

.support-online .btn-support {
    cursor: pointer;
}
.sms i{background: red}
.call-now i{background: green}
.mes i{background: orange}

/*Gọi điện nhắn tin chỉ đường phiên bản mới*/
</style>
<div class="support-online">
  <div class="support-content">
    <a href="tel:<?= $row_setting['hotline']?>" class="call-now" rel="nofollow">
      <i class="fa fa-whatsapp" aria-hidden="true"></i>
          <div class="animated infinite zoomIn kenit-alo-circle"></div>
          <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <span>Hotline: <?=$row_setting['hotline']?></span>
    </a>
    <a class="mes" target="_blank" href="https://www.google.com/maps/place/<?=$row_setting['diachi_'.$lang]?>" target="_blank">
      <i class="fa fa-map-marker" aria-hidden="true"></i>
      <span>Chỉ đường</span>
    </a>
    <?php /*<a class="za" target="_blank" href="http://zalo.me/<?= $row_setting['oaid']?>">
      <img src="images/zalo_chat.png" alt="icon zalo">
      <span>Zalo: <?=$row_setting['zalo']?></span>
    </a>*/ ?>
    <a class="sms" href="sms:<?= $row_setting['hotline']?>">
      <i class="fa fa-weixin" aria-hidden="true"></i>
      <span>SMS: <?=$row_setting['hotline']?></span>
    </a>
  </div>
  <a class="btn-support">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i class="fa fa-phone-square" aria-hidden="true"></i>
  </a>
</div>
<script>
    $(document).ready(function(){
    $('.support-content').hide();
    $('a.btn-support').click(function(e){
      e.stopPropagation();
      $('.support-content').slideToggle();
    });
    $('.support-content').click(function(e){
      e.stopPropagation();
    });
    $(document).click(function(){
      $('.support-content').slideUp();
    });
});
</script>