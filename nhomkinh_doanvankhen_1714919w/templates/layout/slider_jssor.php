<?php
    $d->reset();
    $sql = "select mota_$lang ,link, photo_vi, ten_$lang from #_photo where hienthi=1 and type='slider' order by stt asc, id desc";
    $d->query($sql);
    $row_detail_1 = $d->result_array();
?>
<div id="jssor_rotator" style="position:relative;margin:0 auto;top:0px;left:0px; width: 1366px;height: 550px;overflow:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/spin.svg"/>
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width: 1366px;height: 550px;overflow:hidden;">
        <?php
        foreach ($row_detail_1 as $arow)
        {
            ?>
            <div>
                <a href="<?= $arow["link"] ?>" target="_blank"><img alt="<?= $arow["ten_$lang"]; ?>" data-u="image" src="thumb/1366x550/1/<?php echo _upload_hinhanh_l.$arow["photo_vi"];?>" onerror="this.src='thumb/1366x550/2/images/no_image.png'" /></a>
            </div>
            <?php
        }
        ?>
    </div>
   <?Php /*<!-- Bullet Navigator -->
   <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
    <div data-u="prototype" class="i" style="width:16px;height:16px;">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
        </svg>
    </div>
    <!--<div data-u="prototype" class="i" style="width: 16px; height: 16px; position: absolute; left: 0px; top: 0px;" data-jssor-button="1">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
    </div>-->
    </div>*/ ?>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>