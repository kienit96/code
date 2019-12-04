<script src="js/my_script.js" type="text/javascript"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('username'), "Xin nhập tên đăng nhập.")){
		document.getElementById('username').focus();
		return false;
	}
	if(isEmpty(document.getElementById('password'), "Xin nhập password.")){
		document.getElementById('password').focus();
		return false;
	}
	document.dangky.submit();
}
</script>


<div class="content--full row">
   <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="box_register box--center">
         <div class="thanh_title">
            <h2 class="box__title">Đăng Nhập</h2>
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
                              <input type="text" class="form-control" value="" id="username" name="username" placeholder="Nhập email của bạn"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label">Mật khẩu <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off" value="" />
                           </div>
                        </div>
                        
                        
                        <div class="form-group form-group-lg">
                        	<input class="fix-button" onclick="js_submit();" type="button" value="đăng nhập"/>
                   
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
      