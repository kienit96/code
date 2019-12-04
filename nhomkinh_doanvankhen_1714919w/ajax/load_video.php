<?php 

	/*copright by bossini - M.Tân - tan1993.nina@gmail.com*/ 

	error_reporting(0);

	session_start();

	if (!is_array($_SESSION["video"])) $_SESSION["video"] = array();

	if(isset($_GET["width"])) $_SESSION["video"]["width"] = $_GET["width"];

	if(isset($_GET["height"])) $_SESSION["video"]["height"] = $_GET["height"];

	if(isset($_GET["auto"])) $_SESSION["video"]["auto"] = $_GET["auto"];

	

?>

<iframe width="<?=($_SESSION["video"]["width"]!='')?$_SESSION["video"]["width"]:'600'?>" height="<?=($_SESSION["video"]["height"]!='')?$_SESSION["video"]["height"]:'600'?>" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" src="https://www.youtube.com/embed/<?=$_GET["id"]?>?rel=0<?=($_SESSION["video"]["auto"])?'&autoplay=1':''?>" frameborder="0" allowfullscreen></iframe>

   