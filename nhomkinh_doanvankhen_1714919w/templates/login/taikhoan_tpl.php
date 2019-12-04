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
  $(document).ready(function($) {
      $(".colorbox").colorbox({
            inline:true, 
            width:"70%",
            height:"650px",
            onOpen:function(){
                var id = $(this).data('id');
                 $.ajax({
                  type: "POST",
                  url: "ajax/order_detail.php",
                  data: {id:id},
                  success: function(string){
                    $('#inline_order').html(string);
                  }          
                });
            }
        });
  });
</script>
 
<div id="info" style="margin-bottom: 20px;">
    <div class="thanh_title">
                    <h2 class="box__title">Thông tin tài khoản</h2>
                </div>
    <div class="register_left col-md-3 col-sm-4 col-xs-12">
    	<div class="content--full">
            <div class="box box--no-padding">
            
                <div class="box__body">
                    <div class="sidebar__widget">
                    	<?php include _template."layout/list_user.php";?>
                    </div>
                </div>
            </div>
    
    	</div>
        
    </div>
    
    
    <div class="register_right col-md-9 col-sm-8 col-xs-12">
    	<div class="content--full row">
           <div class="col-md-12 col-xs-12">
              <div class="box--center">
                <?php if($_GET['id']==''){?>
                 <div class="box__header">
                    <h2 class="box__title"><?=$title_tcat?></h2>
                 </div>
                 
                 <div class="box__body">
                    <form method="post" name="dangky" action="" class="form form--general" enctype="multipart/form-data">
                       <div class="row form">
                          <div class="col-md-6 col-sm-8 col-xs-12">
                             <div class="form__inner">
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">E-mail <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user-secret"></i></div>
                                      <input type="text" readonly="readonly" class="form-control" value="<?=$_SESSION["login"]['email']?>" id="email" name="email" placeholder="Nhập email của bạn"/>
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
                                   <label for="email" class="control-label">Họ tên <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
                                      <input type="text" class="form-control" value="<?=$_SESSION["login"]["ten"]?>" id="ten" name="ten" placeholder="Nhập họ tên của bạn"/>
                                   </div>
                                </div>
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Điện thoại <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                      <input type="text" class="form-control" value="<?=$_SESSION["login"]["dienthoai"]?>" id="dienthoai" name="dienthoai" placeholder="Số điện thoại của bạn"/>
                                   </div>
                                </div>
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Địa chỉ <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                      <input type="text" class="form-control" value="<?=$_SESSION["login"]["diachi"]?>" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn"/>
                                   </div>
                                </div>

                                <div class="form-group form-group-lg ">
                                   <label for="ngaysinh" class="control-label">Ngày sinh <span class="text-color-red">(*)</span></label>
                                   <div class="input-group datepicker">
                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                      <input type="text" class="form-control date" id="ngaysinh" name="ngaysinh" placeholder="Ngày / tháng / năm" autocomplete="off" value="<?=date('d/m/Y',$thanhvien_info['ngaysinh']);?>">
                                   </div>
                                </div>
                                
                                <div class="form-group form-group-lg">
                                   <label for="gender" class="control-label">Giới tính <span class="text-color-red">(*)</span></label>
                                   <div class="radio-list">
                                      <label><input type="radio" id="gender_m" checked="checked" name="sex" value="1"> Nam</label>
                                      <label><input type="radio" id="gender_f" name="sex" value="0"> Nữ</label>
                                   </div>
                                </div>


                                 <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Tên Doanh Nghiệp </label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                      <input type="text" class="form-control" value="<?=$thanhvien_info['doanhnghiep_ten']?>" id="doanhnghiep_ten" name="doanhnghiep_ten" placeholder="Nhập tên doanh nghiệp của bạn"/>
                                   </div>
                                </div>

                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Địa chỉ</label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                      <input type="text" class="form-control" value="<?=$thanhvien_info['doanhnghiep_diachi']?>" id="doanhnghiep_diachi" name="doanhnghiep_diachi" placeholder="Nhập địa chỉ doanh nghiệp của bạn"/>
                                   </div>
                                </div>

                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Mã Số Thuế </label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                      <input type="text" class="form-control" value="<?=$thanhvien_info['doanhnghiep_MST']?>" id="doanhnghiep_MST" name="doanhnghiep_MST" placeholder="Nhập MST doanh nghiệp của bạn"/>
                                   </div>
                                </div>           
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Mã xác nhận <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                      <div class="padding_Captcha"><input type="text" name="txtCaptcha" id="txtCaptcha" maxlength="10" size="12" placeholder="<?=_maxacnhan?>" class="form-control pull-left input_website"/>
                                      <img src="capcha.php" style="" /></div>
                                   </div>
                                </div>
                                
                                <div class="form-group form-group-lg">
                                    <input class="fix-button" onclick="js_submit();" type="button" value="Cập nhật"/>
                                </div>
                             </div>
                          </div>
                       </div>
                    </form>
                 </div>
                 <?php } elseif($_GET['id']=='don-hang') { ?>

                 <div class="box__header">
                    <h2 class="box__title">Đơn hàng của bạn</h2>
                 </div>

                <table width="100%" cellpadding="0" cellspacing="0" class="donhang_khung">
                      <tr class="title_order">
                            <td width="10%">Mã</td>
                            <td width="35%">Họ tên</td>
                            <td width="15%">Ngày đặt</td>
                            <td width="15%">Số tiền</td>
                            <td width="15%">tình trạng</td>
                            <td width="10%">chi tiết</td>
                      </tr>
                      <?php for($i=0;$i<count($row_donhang);$i++){
                          $d->reset();
                          $sql = "select * from #_tinhtrang where id='".$row_donhang[$i]['trangthai']."' ";
                          $d->query($sql);
                          $row_tinhtrang = $d->fetch_array();
                      ?>
                      <tr>
                            <td><?=$row_donhang[$i]['madonhang']?></td>
                            <td><?=$row_donhang[$i]['hoten']?></td>
                            <td><?=date('d/m/Y',$row_donhang[$i]['ngaytao']);?></td>
                            <td><span><?=number_format ($row_donhang[$i]['tonggia'],0,",",",").' '.VND ; ?></span></td>
                            <td><span style="color: <?=$row_tinhtrang['mausac']?>"><?=$row_tinhtrang['trangthai']?></span></td>
                            <td><a href="#inline_order" data-id="<?=$row_donhang[$i]['id']?>" class="colorbox">Chi tiết</a></td>
                      </tr>
                      <?php } ?>
                </table>


                <?php } else { ?>
                      <div class="box__header">
                          <h2 class="box__title">Thông tin tài khoản</h2>
                      </div>
                      <div class="thongtin_tai">
                      <?php 
                            $tongtien = $thanhvien_tv['tichluy'];
                            $tientichluy = $thanhvien_tv['tientichluy'];
                            $conlai = quydoinguoc($thanhvien_tv['diem']) - $thanhvien_tv['dadung'];

                            $d->reset();
                            $sql = "select * from #_diemtichluy where tongtien <= '".$thanhvien_tv['diem']."' order by tongtien desc limit 0,1";
                            $d->query($sql);
                            $row_loaitv= $d->result_array();

                            $tienthuong = $tongdiem*$row_matdinh['quydoinguoc'];

                            $dadung = $thanhvien_tv['dadung'];

                      ?>
                          <ul class="tt_tienthuong">
                                <li> Tổng tiền mua hàng : <?=number_format($tongtien,0, ',', '.')?> VND </li>
                                <li> Thành viên : <span style="color:<?=$row_loaitv[0]['mausac']?>"><?=$row_loaitv[0]['ten_'.$lang]?></span></li>
                                <li> Tổng điểm : <span> <?=$thanhvien_tv['diem']?></span></li>
                                <li> Tiền thưởng hiện có : <?=number_format(quydoinguoc($thanhvien_tv['diem']),0, ',', '.')?> VND </li>
                                <li> Đã dùng : <span> <?=number_format($thanhvien_tv['dadung'],0, ',', '.')?> VND </span></li> 
                          </ul>
                      </div>

                <?php } ?>

              </div>
           </div>
        </div>
    </div>

</div> 

<div style='display:none'>
<div id='inline_order'>
  
    </div>
</div> 

