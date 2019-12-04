<link href="js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>


<div id="info">
<div id="sanpham">
<div class="thanh_title"><h2><?=$title_detail?></h2> </div>

<div class="khung_1 col-md-12 col-sm-12 col-xx-12 col-xs-12">
    
    <div class="clear"></div>

         <div class="frame_images col-md-5 col-sm-4 col-xx-12 col-xs-12" >
                <div class="app-figure" id="zoom-fig">
                <a href="<?=_upload_baiviet_l.$row_detail['photo']?>" id="Zoom-1" class="MagicZoom" title="<?=$row_detail['ten_'.$lang]?> .">
                <img src="<?=_upload_baiviet_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" width="250" /></a></div>
                <div class="selectors">
                <?php include _template."layout/jssor_vandongvien.php";?>
                </div>
         </div>

         <ul class="khung_thongtin col-md-7 col-sm-8 col-xx-12s col-xs-12">
                <li><h1><?=$row_detail['ten_'.$lang]?></h1></li>
                <li>
                    <?=$row_detail['noidung_'.$lang]?>
                </li>
        </ul>
</div> 

<div class="thanh_title"><h2>Vận động viên khác</h2></div>



    <?php for($i=0,$count_sp=count($tintuc_khac);$i<$count_sp;$i++){?>
           <div class="vandongvien">
            <a href="<?=$com?>/<?=$tintuc_khac[$i]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$tintuc_khac[$i]['thumb']?>" border="0" align="left"  /></a>
            <h3><a href="<?=$com?>/<?=$tintuc_khac[$i]['tenkhongdau']?>.html" ><?=$tintuc_khac[$i]['ten_'.$lang]?></a></h3>
        </div>
    <?php } ?>

 </div></div>
