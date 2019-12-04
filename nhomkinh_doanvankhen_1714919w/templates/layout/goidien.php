<style type="text/css">
	.combomobile{position:fixed;left:0;bottom:0;width:100%;z-index:100000; display: none;}
	.combomobile btn-primary{background-color:#f00; border-top: 1px solid #fff;}
	.btn-group{display: flex; border-top: 1px solid #fff;}
	.btn-group a{width: 33.33333% !important; font-size: 14px; font-family: arial; color: #fff; background: #d0530a; text-align: center; padding: 5px 0px;}
	.btn-group a:nth-child(2){border-left: 1px solid #fff;border-right: 1px solid #fff;}
	.btn-group a i{
		-webkit-animation: wrench 2.5s ease infinite;
 		 animation: wrench 2.5s ease infinite;
 	}
	@-webkit-keyframes wrench {
	  0% {
	    -webkit-transform: rotate(-12deg);
	    transform: rotate(-12deg);
	  }

	  8% {
	    -webkit-transform: rotate(12deg);
	    transform: rotate(12deg);
	  }

	  10%,28%,30%,48%,50%,68% {
	    -webkit-transform: rotate(24deg);
	    transform: rotate(24deg);
	  }

	  18%,20%,38%,40%,58%,60% {
	    -webkit-transform: rotate(-24deg);
	    transform: rotate(-24deg);
	  }

	  100%,75% {
	    -webkit-transform: rotate(0);
	    transform: rotate(0);
	  }
	}

	@keyframes wrench {
	  0% {
	    -webkit-transform: rotate(-12deg);
	    -ms-transform: rotate(-12deg);
	    transform: rotate(-12deg);
	  }

	  8% {
	    -webkit-transform: rotate(12deg);
	    -ms-transform: rotate(12deg);
	    transform: rotate(12deg);
	  }

	  10%,28%,30%,48%,50%,68% {
	    -webkit-transform: rotate(24deg);
	    -ms-transform: rotate(24deg);
	    transform: rotate(24deg);
	  }

	  18%,20%,38%,40%,58%,60% {
	    -webkit-transform: rotate(-24deg);
	    -ms-transform: rotate(-24deg);
	    transform: rotate(-24deg);
	  }

	  100%,75% {
	    -webkit-transform: rotate(0);
	    -ms-transform: rotate(0);
	    transform: rotate(0);
	  }
	}
	@media (max-width: 970px) {
		.combomobile{display: block;}
	}
</style> 
<div class="combomobile">
	<div class="btn-group btn-group-justified text-uppercase">       
	 <a href="tel:<?=$row_setting["hotline"] ?>" class=""><span class="blink_me"><i class="fa fa-phone" aria-hidden="true"></i> Gọi điện</span></a>
	 <a href="sms:<?=$row_setting["hotline"] ?>" class=""><i class="fa fa-commenting-o" aria-hidden="true"></i> SMS</a>
	 <a href="<?=$row_setting["link_map"] ?>" target="_blank" class=""><i class="fa fa-map-marker" aria-hidden="true"></i> Chỉ đường</a>
</div>
</div>