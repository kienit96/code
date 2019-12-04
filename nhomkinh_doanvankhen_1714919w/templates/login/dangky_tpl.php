<script language="javascript" src="js/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('email'), "Xin nhập email.")){
		document.getElementById('email').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('password'), "Xin nhập Password .")){
		document.getElementById('password').focus();
		return false;
	}
    
	if(!isEmpty(document.dangky.password) && document.dangky.password.value.length<5){
		alert("Mật khẩu phải nhiều hơn 4 ký tự.");
		document.dangky.password.focus();
		return false;
	}
	
	if(!isEmpty(document.dangky.password) && document.dangky.password.value!=document.dangky.renew_pass.value){
		alert("Nhập lại mật khẩu mới không chính xác.");
		document.dangky.renew_pass.focus();
		return false;
	}
            
	if(isEmpty(document.getElementById('ten'), "Xin nhập họ tên .")){
		document.getElementById('ten').focus();
		return false;
	}

	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}

	if(isEmpty(document.getElementById('diachi'), "Xin nhập địa chỉ .")){
		document.getElementById('diachi').focus();
		return false;
	}
            
	if(isEmpty(document.getElementById('txtCaptcha'), "Xin nhập mã xác nhận .")){
		document.getElementById('txtCaptcha').focus();
		return false;
	}
	document.dangky.submit();
}
</script>
 
 
<div class="content--full row">
   <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="box_register box--center">
         <div class="thanh_title">
            <h2 class="box__title">Đăng ký thành viên</h2>
         </div>
         <div class="box__body">
         
            <form method="post" name="dangky" action="" class="form form--general" enctype="multipart/form-data">
               <div class="row form">
                  <div class="col-md-10 col-md-offset-1 col-xs-12">
                     <div class="form__inner">
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">E-mail <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user-secret"></i></div>
                              <input type="text" class="form-control" value="" id="email" name="email" placeholder="Nhập email của bạn"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label">Mật khẩu <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off" value="" />
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label">Nhập lại Mật khẩu <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="renew_pass" name="renew_pass" placeholder="Nhập mật khẩu" autocomplete="off" value="" />
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Họ tên <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
                              <input type="text" class="form-control" value="" id="ten" name="ten" placeholder="Nhập họ tên của bạn"/>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Điện thoại <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                              <input type="text" class="form-control" value="" id="dienthoai" name="dienthoai" placeholder="Số điện thoại của bạn"/>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Địa chỉ <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                              <input type="text" class="form-control" value="" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn"/>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="ngaysinh" class="control-label">Ngày sinh <span class="text-color-red">(*)</span></label>
                           <div class="input-group datepicker">
                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                              <input type="text" class="form-control date" id="ngaysinh" name="ngaysinh" placeholder="Ngày / tháng / năm" autocomplete="off" />
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg">
                           <label for="gender" class="control-label">Giới tính <span class="text-color-red">(*)</span></label>
                           <div class="radio-list">
                              <label><input type="radio" id="gender_m" checked="checked" name="sex" value="1"> Nam</label>
                              <label><input type="radio" id="gender_f" name="sex" value="0"> Nữ</label>
                           </div>
                        </div>

                       <!--   <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Tên Doanh Nghiệp </label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                              <input type="text" class="form-control" value="" id="doanhnghiep_ten" name="doanhnghiep_ten" placeholder="Nhập tên doanh nghiệp của bạn"/>
                           </div>
                        </div>

                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Địa chỉ</label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                              <input type="text" class="form-control" value="" id="doanhnghiep_diachi" name="doanhnghiep_diachi" placeholder="Nhập địa chỉ doanh nghiệp của bạn"/>
                           </div>
                        </div>

                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Mã Số Thuế </label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                              <input type="text" class="form-control" value="" id="doanhnghiep_MST" name="doanhnghiep_MST" placeholder="Nhập MST doanh nghiệp của bạn"/>
                           </div>
                        </div>              -->  
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Mã xác nhận <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                              <div class="padding_Captcha"><input type="text" name="txtCaptcha" id="txtCaptcha" maxlength="10" size="12" placeholder="mã xác nhận" class="form-control pull-left input_website"/>
                              <img src="capcha.php" style="" /></div>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg">
                        	<input class="fix-button" onclick="js_submit();" type="button" value="Đăng ký"/>
                        </div>

                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>       
        
<?php /*?><div class="main_content">
    <div class="title_index"><h2><?=$title_tcat?></h2> </div>
    <div class="khung_login">     
    <form method="post" name="dangky" action="dang-ky.html" class="dangnhaptv" enctype="multipart/form-data">
        <div class="panel-body"> 
            <div class="title_index title_ttcn"><h2><?=_thongtincanhancuaban?></h2> </div>   
            <div class="form-field register row clearfix">
                <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register">E-mail</span></div>
                <div class="col-sm-6 col-xs-12"><input type="text" name="email" id="email"  size="35"  placeholder="E-mail" class="form-control input_website" /></div>	    
            </div>
             
            <div class="form-field register row clearfix">       
                <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_matkhau?></span></div>
                <div class="col-sm-6 col-xs-12"><input id="pass" type="password" name="password" onchange="toggle_pass('pass')" placeholder="<?=_matkhau?>" class="form-control input_website"/></div>					
            </div>
            
            <div class="form-field register row clearfix">     
                <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_nhaplaimatkhau?></span></div>
                <div class="col-sm-6 col-xs-12"><input type="password" name="renew_pass"  size="35" placeholder="<?=_nhaplaimatkhau?>" class="form-control input_website" /></div>	
                    
            </div>
            
            <div class="form-field register row clearfix">
            <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_hovaten?></span></div>        
            <div class="col-sm-6 col-xs-12"><input type="text" value="<?=$_POST["ten"]?>" name="ten" id="ten" size="35"   placeholder="<?=_hovaten?>" class="form-control input_website"/></div>
            
            
            </div>
            
            
            <div class="form-field register row clearfix">
            <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_dienthoai?></span></div>        
            <div class="col-sm-6 col-xs-12"><input type="text" value="<?=$_POST["dienthoai"]?>" name="dienthoai" id="dienthoai"  size="35"  placeholder="<?=_dienthoai?>" class="form-control input_website" /></div>
            
            
            </div>
            
            <div class="form-field register row clearfix">
            <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_diachi?></span></div>        
            <div class="col-sm-6 col-xs-12"><input type="text" value="<?=$_POST["diachi"]?>" name="diachi" id="diachi"  size="35"  placeholder="<?=_diachi?>" class="form-control input_website" /></div>
            
            
            </div>
            
            <div class="form-field register row clearfix">
            <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_sex?> :</span></div>        
            <div class="col-sm-6 col-xs-12 sex">
                <label>
                <input type="radio" name="sex" value="1" checked="checked" <?php if($_POST['sex']=='Nam'){ echo "checked='checked'";}?> />
                &nbsp;&nbsp;&nbsp; <span><?=_nam?></span> &nbsp;&nbsp;&nbsp; 
                </label>
                
                <label>
                <input type="radio" name="sex" value="0" <?php if($_POST['sex']=='Nu'){ echo "checked='checked'";}?>/>
                &nbsp;&nbsp;&nbsp; <span><?=_nu?></span>
                </label>
                
                
            </div>
            
    
            
            
            </div>
            
            
            <div class="form-field register row clearfix">
            <div class="col-sm-3 col-xs-12 hidden-xs text-right"><span class="txt_register"><?=_maxacnhan?></span></div>        
    
            <div class="col-sm-3 col-xs-8">
                <input type="text" name="txtCaptcha" id="txtCaptcha" maxlength="10" size="12" placeholder="<?=_maxacnhan?>" class="form-control pull-left input_website"/>
            </div>
            
            <div class="col-sm-3 col-xs-4 capcha_txt text-left"><img src="capcha.php" style="" /></div>
            
            
            </div>
            
            <div class="form-field register row clearfix mg-t-15">
                <div class="col-sm-offset-3 col-sm-6 col-xs-12 text-left">
                    <input class="fix-button" onclick="js_submit();" type="button" value="<?=_dangky?>"/>
                    <input class="fix-button" type="button" value="<?=_nhaplai?>" onclick="document.dangky.reset();" /> 
                </div>
            </div>
            
            </div>
        </form>	
    </div>
</div><?php */?>
  

