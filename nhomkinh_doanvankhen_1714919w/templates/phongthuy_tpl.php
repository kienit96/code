<div id="info">
  <div class="margin_auto">
    <div class="dieuhuong">  
      <a href="./" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
      <a href="<?=getCurrentPageURL()?>" itemprop="url" title="<?=$row_detail['ten_'.$lang]?>"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a>
    </div>
    <div class="bao_phongthuy">
        <form class="frm_phongthuy" name="frm_phongthuy">
          <input class="input" type="number" pattern="{0-9}[4]" name="namsinh" placeholder="Năm sinh âm lịch chủ nhà" required>
          <select class="input" name="gioitinh">
            <option value="">-Giới tính-</option>
            <option value="nam">Nam giới</option>
            <option value="nu">Nữ giới</option>
          </select>
          <select class="input" name="huongnha">
            <option value="">-Hướng nhà-</option>
            <option value="nam">Nam</option>  
            <option value="Tây nam">Tây nam</option>  
            <option value="Tây">Tây</option>  
            <option value="Tây bắc">Tây Bắc</option>
            <option value="Bắc">Bắc</option>
            <option value="Đông bắc">Đông Bắc</option>  
            <option value="Đông">Đông</option>  
            <option value="Đông Nam">Đông Nam</option> 
          </select>
          <button>Xem kết quả</button>
        </form>
        <div class="view"><?=$phongthuy['noidung_'.$lang]?></div>
      </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>