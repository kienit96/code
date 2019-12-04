<?php 
    $d->reset();
    $sql= "select photo_vi,link,hienthi from #_photo where type='popup'";
    $d->query($sql);
    $popup = $d->fetch_array();
    if($popup['hienthi'] == 1){
?>
<div id="popup"><a href="<?=$popup['link']?>" target="_blank"><img src="thumb/800x500/1/<?=_upload_hinhanh_l.$popup['photo_vi']?>" alt="popup"></a></div>
<?php  if($_SESSION["popup"] == '' || $_SESSION["popup"] != true){ ?>
<script type="text/javascript">
	$.fancybox.open({
		src  : '#popup',
		type : 'inline',
		opts : {
			<?php $_SESSION["popup"]=true ?>
			afterShow : function( instance, current ) {
				//console.info( 'done!' );
			}
		}
	});
</script>
<?php } } ?>