<div id="info">
	<div class="margin_auto">
		<div id="sanpham">  
			<div class="title"><h2>Đăng ký <span>Nhận báo giá</span></h2></div>
			<div class="form_lh">
	            <form accept-charset="UTF-8" method="post" name="frm" class="contact-form" action="lien-he" enctype="multipart/form-data">
	              <p class="form-group"><input class="form-control" name="ten" type="text" placeholder="Họ và Tên" required/></p>
	              <p class="form-group"><input class="form-control" name="diachi" type="text" placeholder="Địa chỉ" required/></p>
	              <p class="form-group"><input class="form-control" name="dienthoai" type="text" id="dienthoai" placeholder="Điện thoai" required/></p>
	              <p class="form-group"><input class="form-control" name="email" type="email" id="contact_email" id="email" placeholder="email" required/></p>
	              <input class="form-control" name="type" type="text" value="lienhe" hidden/>
	              <p class="form-group">
	                <textarea name="noidung" class="form-control" cols="50" rows="5" class="ta_noidung" placeholder="Nội dung" required></textarea>
	              </p>
	              <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
	              <p>
	                <button>Gửi liên hệ</button>
	                <button type="reset">Reset</button>   
	              </p>             
	            </form>
	        </div>
		</div>
	</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>