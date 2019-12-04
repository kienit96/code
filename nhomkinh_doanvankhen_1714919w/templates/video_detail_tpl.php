<div id="info">
  <div class="margin_auto">
    <?php //include _template."layout/left.php";?>
    <div class="khung_sp col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12" style="padding-bottom:50px;">
      <div class="dieuhuong">  
        <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
        <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
        <a href="<?=getCurrentPageURL()?>" itemprop="url" title="<?=$row_detail['ten_'.$lang]?>"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a>
      </div>
      <div class="content-2">
        <div class="box_vid ">
          <iframe width="100%" src="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($row_detail['links'])?>" frameborder="0" allowfullscreen></iframe>
          <h1><?=$row_detail['ten_vi']?></h1>
          <div class="clear"></div>
          <div class="vid_cmt">
            <div class="luotxem"><span><?=$row_detail['luotxem']?> views</span> - <span class="ngaydang_vid"><?=date('d/m/Y',$row_detail['ngaytao']);?></div>
              <div class="addthis_inline_share_toolbox"></div>
            <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
          </div>
        </div>
        <div class="other_vid">
          <div class="isfixed">
            <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){ ?> 
              <div class="box_video_detail">
                <a href="<?=$tintuc[$i]['tenkhongdau']?>" >
                  <img src="http://img.youtube.com/vi/<?=getYoutubeIdFromUrl($tintuc[$i]['links'])?>/sddefault.jpg" border="0" align="left" />
                </a>
                <div class="vid_info">
                  <a href="<?=$tintuc[$i]['tenkhongdau']?>" title="<?=$tintuc[$i]['ten_vi']?>"><h3><?=$tintuc[$i]['ten_'.$lang]?></h3></a>
                  <span class="view_vid"><?=$tintuc[$i]['luotxem']?> views</span> - <span class="ngaydang_vid"><?=date('d/m/Y',$tintuc[$i]['ngaytao']);?></span>
                </div>
              </div>
              <div class="clear"></div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?