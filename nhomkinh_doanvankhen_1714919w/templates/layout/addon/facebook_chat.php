<style type="text/css">

.taidat-messages { position: fixed; bottom: -300px; right: 0; z-index: 999999; }

.taidat-messages-outer { position: relative; }

#taidat-minimize {

	background: url(images/back_chatface.png) no-repeat center center;

    font-size: 14px;

    color: #fff;

    padding: 16px 130px;

    position: absolute;

    top: -32px;

    right: -9px;

    cursor: pointer;

}

@media screen and (max-width:768px){ #taidat-facebook { opacity:0; } .taidat-messages {
    right: 0;
    bottom: -265px;
} }

</style>

<div id='fb-root'></div>


<div class="taidat-messages"><div class="taidat-messages-outer"><div id="taidat-minimize"></div><div id="taidat-facebook" class='fb-page' data-adapt-container-width='true' data-height='300' data-hide-cover='false' data-href='<?=$row_setting['facebook']?>' data-show-facepile='true' data-show-posts='false' data-small-header='false' data-tabs='messages' data-width='250'></div></div></div>