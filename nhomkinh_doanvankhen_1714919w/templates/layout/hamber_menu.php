<?php
    $d->reset();
    $sql = "select id,ten_vi,photo,tenkhongdau,quangcao from #_product_list where type='product' and hienthi=1 order by stt asc";
    $d->query($sql);
    $row_list = $d->result_array();
?>
<div id="hamber_menu" class="relative">
    <a class="txt_color_1" href="#"><i class="fa fa-bars" aria-hidden="true"></i>
        DANH MỤC SẢN PHẨM
    </a>
    <div id="sub_menu_web">
        <div class="col_menu_cap1">
        <?php foreach ($row_list as $key => $rl) { 
            $d->reset();
            $sql = "select id,ten_vi,photo,tenkhongdau,photo from #_product_cat where type='product' and id_list = ".$rl['id']." and hienthi=1 order by stt,id desc";
            $d->query($sql);
            $row_cat = $d->result_array();
        ?>
            <div class="sub_item_menu">
                <a class="parent_menu" href="<?=$rl['tenkhongdau']?>"><?=$rl['ten_'.$lang]?><em class="fa fa-angle-right"> </em>
                </a>
                <div class="conten_hover_submenu">
                    <?php foreach ($row_cat as $keyc => $rc) { 
                        $d->reset();
                        $sql = "select id,ten_vi,photo,tenkhongdau,photo from #_product_item where type='product' and id_cat = ".$rc['id']." and hienthi=1 order by stt,id desc";
                        $d->query($sql);
                        $row_item = $d->result_array();
                    ?>
                        <?php if($keyc==0||$keyc%2==0){ ?><div class="col_hover_submenu"><?php } ?>
                        <a class="" href="<?=$rc['tenkhongdau']?>"><strong><?=$rc['ten_'.$lang]?></strong></a>
                        <?php foreach ($row_item as $key => $ri) { ?>
                        <a href="<?=$ri['tenkhongdau']?>"><?=$ri['ten_'.$lang]?></a>
                        <?php } ?>
                        <?php if(($keyc+1)%2==0||($keyc+1)>=count($row_cat)){ ?></div><?php } ?>
                    <?php } ?>
                    <a class="img_banner_landdin_page" href="<?=$rl['tenkhongdau']?>">
                    <img src="<?=_upload_product_l.$rl['quangcao']?>" alt="<?=$rl['ten_'.$lang]?>" class="loading" data-was-processed="true">
                </a>
                </div>
            </div>
        <?php } ?>
        </div>                        
    </div>
</div>