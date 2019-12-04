<style>div.phone_mobi{    display: none;background: #f172ac; width: 100%;position: fixed; left: 0;bottom: 0;height: 40px;line-height: 40px;color: #fff;z-index: 10;         box-shadow: 0 -1px 2px 0px #0000005c;}
    div.phone_mobi ul{list-style:none; margin: 0; padding: 0;}
    div.phone_mobi ul li{display:inline-block;vertical-align:top;width:32%;text-align:center;}
    div.phone_mobi ul li a{color:#fff;text-decoration:none;font-size:15px;}
    div.phone_mobi ul li a i{font-size:22px;margin-right:10px;margin-top:3px;}
    .blink_me {-webkit-animation-name: blinker;-webkit-animation-duration: 1s;-webkit-animation-timing-function: linear;-webkit-animation-iteration-count: infinite;-moz-animation-name: blinker;-moz-animation-duration: 1s;-moz-animation-timing-function: linear;-moz-animation-iteration-count: infinite;animation-name: blinker;
    animation-duration: 1s;animation-timing-function: linear;animation-iteration-count: infinite;}
    @-moz-keyframes blinker {  0% { opacity: 1.0; }50% { opacity: 0.0; }100% { opacity: 1.0; }}
    @-webkit-keyframes blinker {  0% { opacity: 1.0; }50% { opacity: 0.0; }100% { opacity: 1.0; }}  
    @keyframes blinker {0% { opacity: 1.0; }50% { opacity: 0.0; }100% { opacity: 1.0; }}
    .blink_me {
        position: relative;
    }

    .wrap_multiphone {display: none; position:  absolute;bottom: 60px;left: 10px;border-radius: 10px;border: 1px solid #ddd;padding: 5px 20px;background: #fff;}

    .wrap_multiphone a {
        color: #333 !important;
        display: block;
        line-height: 25px !important;
    }
    @media only screen and (max-width:992px) {div.phone_mobi{display: block;}}
</style>
<?php 
    $arr_hotline = explode('-', $row_setting['hotline']);
?>
<div class="phone_mobi">
    <ul>
        <li><a class="blink_me actived"><i class="fa fa-phone" aria-hidden="true"></i>Gọi điện</a>
            <div class="wrap_multiphone clearfix">
                <?php foreach ($arr_hotline as $key => $hl) { ?>
                <a href="tel:<?=$hl?>">Gọi: +<?=$hl?></a>
                <?php } ?>
            </div>
        </li>
        <li><a href="mailto:<?=$row_setting['email']?>"><i class="fa fa-envelope" aria-hidden="true"></i>Gửi mail</a></li>
        <li><a target="_blank" href="https://google.com/maps/dir//<?=$row_setting['toado']?>"><i class="fa fa-map-marker" aria-hidden="true"></i>Chỉ đường</a></li>
    </ul>
</div>
<script>
    $(document).ready(function() {
        $('.blink_me').click(function(event) {
            /* Act on the event */
            if($(this).hasClass('actived')) {
                $(this).removeClass('actived');
                $('.wrap_multiphone').fadeOut();
            }
            else {
                $(this).addClass('actived');
                $('.wrap_multiphone').fadeIn();
            }
        });
    });
</script>
