<?php
    $d->reset();
    $sql = "select ten_$lang,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='sukien' order by stt,id desc ";
    $d->query($sql);
    $event_list = $d->result_array();

    $d->reset();
    $sql = "select * from #_baiviet where hienthi=1 and type='sukien' order by stt,id desc ";
    $d->query($sql);
    $event = $d->result_array();
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $('#tabs a').click(function(event) {
            $('#tabs a').removeClass('active');
            var id_list = $(this).attr('idlist');
            $(this).addClass('active');
            $('.event').css({'display':'none'});
            if(id_list == 0){
                $('.event').css({'display':'block'});
            }
            $('.event[id="'+id_list+'"]').fadeIn();
            return false;
        });
    });
</script>
    <div class="margin_auto">
        <div class="khung">
        <div class="thanh_title">
            <div class="title">
                <h2>Tổ chức sự kiện</h2>
            </div>
        </div>
        <div class="noidung_event">
             <div class="list">
                <div id="tabs">
                  <a idlist="0" href="tab-0" class="active">Tất cả</a>
                  <?php foreach ($event_list as $key => $events) {?>
                    <a idlist="<?=$events['id']?>" href="tab-<?=$events['id']?>"><?=$events['ten_'.$lang]?></a>
                    <?php } ?>
                </div>
            </div>    
            <ul>                
                <?php foreach ($event as $key => $value) {?>  
                <li class="col-md-4 col-sm-4 col-xx-6 col-xs-12">        
                    <div class="event" id="<?=$value['id_list']?>">
                        <a class="effect-v3" href="su-kien/<?=$value['tenkhongdau']?>.html">
                            <img src="<?=_upload_baiviet_l.$value['thumb']?>" alt="<?=$value['ten_'.$lang]?>" />
                        </a>
                         <h3><a href="su-kien/<?=$value['tenkhongdau']?>.html"><?=catchuoi($value['ten_'.$lang], 30)?></a></h3>
                    </div>  
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    </div>
