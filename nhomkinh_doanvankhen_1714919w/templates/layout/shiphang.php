<div class="shiphang">  
  <div id="logo_khach"><img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="logo" /></div>
  <form action="ship-hang-re.html" method="post" accept-charset="utf-8">
    <label>Tên Khách Hàng</label>
      <input name="tenkhachhang" placeholder="Nhập họ và tên" id="tenkhachhang" />
    <label>Số điện thoại</label>
      <input name="dienthoaikh" placeholder="Nhập điện thoại" id="dienthoaikh" />
    <button id="yeucauship" type="button">Yêu cầu ship hàng</button>
  </form>
  <div class="hotline_kh"><?=$row_setting['hotline']?></div>
</div>