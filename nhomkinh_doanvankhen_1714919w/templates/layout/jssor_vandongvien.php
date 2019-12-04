<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $('#foo3').carouFredSel({
         
            height: 'auto',
            prev: '#prev13',
            next: '#next13',
            auto: true,
            scroll: 1
        });
    });
</script>
<style type="text/css" media="all">
.list_carousel {
    width: 100%;
    position:relative;
    float:left;
}
.list_carousel ul {
    margin: 0;
    width: 100%;
    padding: 0;
    list-style: none;

    display: block;
}
.list_carousel li {
    display: block;
    float: left;
    padding: 5px 5px 5px 5px;
}
.list_carousel li img{
    float: left;
}
.list_carousel li a{ text-decoration:none;}
.list_carousel li a h3{ color:#835410; text-align:center; font-weight:500; margin-top:10px; font-size:16px; margin-bottom:10px; text-transform:uppercase;}
.list_carousel li:hover{
}
.list_carousel li.active{
}
.list_carousel.responsive {
    width: auto;
    margin-left: 0;
}
.clearfix {
    float: none;
    clear: both;
}
.pager {
    float: left;
    width: 320px;
    text-align: center;
}
.pager a {
    margin: 0 5px;
    text-decoration: none;
}
.pager a.selected {
    text-decoration: underline;
}
.timer {
    background-color: #999;
    height: 6px;
    width: 0px;
}
.prev13{ width: 41px; height: 36px; position: absolute; z-index: 10; background: url(images/left_dt.png) no-repeat; top: 25px; left: 0px;}
.next13{ width: 41px; height: 36px; position: absolute; z-index: 10; background: url(images/right_dt.png) no-repeat; top: 25px; right: -10px;}
</style>
<?php
    $d->reset();
    $sql = "select thumb,id,photo from #_baiviet_photo where hienthi=1 and type='vandongvien' and id_baiviet='".$row_detail['id']."' order by stt,id desc ";
    $d->query($sql);
    $baiviet_photos = $d->result_array();
?>
<div class="list_carousel">
    <a href="#prev13" id="prev13" class="prev13"></a>
    <a href="#next13" id="next13" class="next13"></a>
    <div class="clearfix"></div>
    <ul id="foo3">

    <li><a  data-zoom-id="Zoom-1" href="<?=_upload_baiviet_l.$row_detail['photo']?>"
    data-image="<?=_upload_baiviet_l.$row_detail['photo']?>">
    <img u="image" src="<?=_upload_baiviet_l.$row_detail['thumb']?>" width="80" /></a>
        </li>

    <?php for($i=0,$count_ch=count($baiviet_photos);$i<$count_ch;$i++){?>
        <li><a  data-zoom-id="Zoom-1" href="<?=_upload_baiviet_l.$baiviet_photos[$i]['photo']?>"  data-image="<?=_upload_baiviet_l.$baiviet_photos[$i]['photo']?>">
    <img u="image" src="<?=_upload_baiviet_l.$baiviet_photos[$i]['thumb']?>" width="80" height="" /></a>
        </li>
    <?php } ?>
    </ul>
</div>
