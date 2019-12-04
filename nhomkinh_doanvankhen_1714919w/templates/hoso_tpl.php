<div id="info">

  <div class="margin_auto">

    <div id="sanpham">  

      <div class="dieuhuong">  

          <a href="trang-chu.html" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>

          <a href="<?=$com?>.html" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>

      </div>

        <div class="khung">
          <?php foreach ($row_detail as $key => $value) { ?>
          <div class="hoso">
            <h4 tab-id="hoso-<?=$key?>"><?=$value['ten_'.$lang]?></h4>
            <div id="hoso-<?=$key?>" class="noidung">
              <?=$value['noidung_'.$lang]?>
            </div>
          </div>
          <?php } ?>
        <script type="text/javascript">
          $(document).ready(function() {
            $('.hoso h4').click(function(){
              id= $(this).attr('tab-id');
              $('.hoso h4').removeClass('active');
              $(this).addClass('active');
              $('#'+id).toggle('slow');
            });
          });
        </script>
      </div>
      </div>
  </div>

</div>

<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>