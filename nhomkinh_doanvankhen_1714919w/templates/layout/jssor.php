<?php
    $d->reset();
    $sql = "select thumb,id,photo from #_product_photo where hienthi=1 and type='".$type_bar."' and id_product='".$row_detail['id']."' order by stt,id desc ";
    $d->query($sql);
    $product_photos = $d->result_array();
    ?>
<div class="list_carousel">
    <ul id="foo3">
        <li><a  data-zoom-id="Zoom-1" href="<?=_upload_product_l.$row_detail['photo']?>"
        data-image="thumb/520x460/1/<?=_upload_product_l.$row_detail['photo']?>">
        <img u="image" onerror="this.src='http://placehold.it/100x80'" src="thumb/100x80/1/<?=_upload_product_l.$row_detail['photo']?>" /></a>
            </li>
        <?php for($i=0,$count_ch=count($product_photos);$i<$count_ch;$i++){?>
            <li><a  data-zoom-id="Zoom-1" href="<?=_upload_product_l.$product_photos[$i]['photo']?>"
        data-image="thumb/520x460/1/<?=_upload_product_l.$product_photos[$i]['photo']?>">
        <img u="image" onerror="this.src='http://placehold.it/100x80'" src="thumb/100x80/1/<?=_upload_product_l.$product_photos[$i]['photo']?>" /></a>
            </li>
        <?php } ?>
    </ul>
</div>
