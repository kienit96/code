<?php

  $d->reset();
  $sql = "select thumb_$lang from #_photo where type='bando'";
  $d->query($sql);
  $bando_bt  = $d->fetch_array();

?>

<div class="bando_"><a href="lien-he.html"><img src="<?=_upload_hinhanh_l.$bando_bt['thumb_'.$lang]?>" alt="map" /></a></div>