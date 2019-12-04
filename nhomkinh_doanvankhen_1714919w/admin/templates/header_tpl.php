<?php
      $d->reset();
      $sql = "SELECT COUNT(*) as num FROM #_contact where view=0 and type = 'lienhe'";
      $d->query($sql);
      $row_lienhe = $d->fetch_array();      

      $d->reset();
      $sql = "SELECT COUNT(*) as num FROM #_newsletter where type='nhantin' and view=0";
      $d->query($sql);
      $row_nhantin = $d->fetch_array();

      /*
      $d->reset();
      $sql = "SELECT COUNT(*) as num FROM #_order where view=0 ";
      $d->query($sql);
      $row_giohang = $d->fetch_array();

      $d->reset();
      $sql = "SELECT COUNT(*) as num FROM #_contact where view=0  and type = 'tuvan'";
      $d->query($sql);
      $row_tuvan = $d->fetch_array();

      $d->reset();
      $sql = "SELECT COUNT(*) as num FROM #_newsletter where type='dksdt' and view=0";
      $d->query($sql);
      $row_dksdt = $d->fetch_array();*/
      
      
      $tong_count = $row_lienhe['num'] + $row_nhantin['num'];
?>
<div class="wrapper">
  <div class="welcome"><a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Xin chào, <?=$_SESSION['login']['username']?>!</span></div>
  <div class="userNav">
      <ul>
          <!--<li><a href="index.php?com=user&act=man" title=""><span>Quản trị thành viên</span></a></li>
          <li><a href="index.php?com=phanquyen&act=man" title=""><span>Quản trị phân quyền</span></a></li>-->
          
          <li><a href="http://<?=$config_url?>" title="" target="_blank"><img src="./images/icons/topnav/mainWebsite.png" alt="" /><span>Vào trang web</span></a></li>
          <li><a href="index.php?com=user&act=admin_edit" title=""><img src="images/icons/topnav/profile.png" alt="" /><span>Thông tin tài khoản</span></a></li>
          <li class="ddnew"><a title=""><img src="images/icons/topnav/messages.png" alt="" /><span>Thông báo</span><span class="numberTop"><?=$tong_count?></span></a>
              <ul class="userMessage">
                <li><a href="index.php?com=contact&act=man&type=lienhe" title="" class="sInbox"><span>Liên Hệ</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_lienhe['num']?></span></a></li>
                <li><a href="index.php?com=newsletter&act=man&type=nhantin" title="" class="sInbox"><span>Nhận tin</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_nhantin['num']?></span></a></li>  
				<?php /*
          <li><a href="index.php?com=order&act=man" title="" class="sInbox"><span>Đơn hàng</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_giohang['num']?></span></a></li> 
          
          <li><a href="index.php?com=contact&act=man&type=tuvan" title="" class="sInbox"><span>Tư vấn</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_tuvan['num']?></span></a></li>
          <li><a href="index.php?com=newsletter&act=man&type=datlich" title="" class="sInbox"><span>Đặt lịch</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_datlich['num']?></span></a></li>
          
          <li><a href="index.php?com=contact&act=man&type=baogia" title="" class="sInbox"><span>báo giá</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_baogia['num']?></span></a></li>
                
                <li><a href="index.php?com=newsletter&act=man&type=dksdt" title="" class="sInbox"><span>điện thoại</span> <span class="numberTop" style="float:none; display:inline-block"><?=$row_dksdt['num']?></span></a></li>*/ ?>
              </ul>
          </li>
          <li><a href="index.php?com=user&act=logout" title=""><img src="images/icons/topnav/logout.png" alt="" /><span>Đăng xuất</span></a></li>
          <li class="menu_mb"><a><img src="images/icons/topnav/tasks.png" alt="" /><span>Menu</span></a></li>
      </ul>
  </div>
  <div class="clear"></div>
</div>
<?php //echo $_SESSION['login']['role']; ?>