<?php 
$url=getCurrentPageURL();
/*share*/
get_social();//get_social($url,'share','100%','auto');
/*fanpage*/
get_social('','fanpage');//get_social($url,'fanpage','300','250');
/*comment*/
get_social('','comment');
/*map google api*/
get_mapapi(2,1,'1.1234,2.123');//get_mapapi(600,300,'1.1234,2.123',16);
/*load video*/
get_video_youtube(2,1);//get_video_youtube(600,300,true,false);

?>