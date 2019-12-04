<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);

	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');
    
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
    
	$d = new database($config['database']);

	$id = $_POST['id'];

    $d->reset();
	$sql = "select * from #_order where id='".$id."' ";
	$d->query($sql);
	$item = $d->fetch_array();

	if($item['nganhang']!=''){

		$d->reset();
	    $sql = "select ten_$lang,nganhang_$lang,id,taikhoan from #_chuyenkhoan where id='".$item['nganhang']."' ";
	    $d->query($sql);
	    $nganhang = $d->fetch_array();
	}

	$d->reset();
	$sql="select * from #_order_detail where id_order = '".$item['id']."'";
	$d->query($sql);
	$result_ctdonhang=$d->result_array();

	  $d->reset();
	  $sql = "select * from #_tinhtrang where id='".$item['trangthai']."' ";
	  $d->query($sql);
	  $row_tinhtrang = $d->fetch_array();

?>

<div class="widget">
		<div class="title"><img src="administrator/images/icons/dark/list.png" alt="" class="titleIcon" />
			<h4>Thông tin người mua</h4>
		</div>
		
		<div class="formRow">
			<label>Mã đơn hàng</label>
			<div class="formRight">
               <?=@$item['madonhang']?>
			</div>
		</div>	
        
        <div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
              <?=@$item['hoten']?>
			</div>
		</div>	
        
         <div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
              <?=@$item['dienthoai']?>
			</div>
		</div>		        
        
         <div class="formRow">
			<label>Email</label>
			<div class="formRight">
             <?=@$item['email']?>
			</div>
		</div>	
        
        <div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
             <?=@$item['diachi']?>
			</div>
		</div>

		<div class="formRow">
			<label>Phương thức</label>
			<div class="formRight">
             <?=@$item['httt']?>
			</div>
		</div>
		<div class="formRow">
			<label>Tình trạng</label>
			<div class="formRight">
             <?=@$row_tinhtrang['trangthai']?>
			</div>
		</div>


		<?php if($nganhang['ten_'.$lang]!=''){ ?>
		<div class="formRow">
			<label>Chủ Khoản : </label>
			<div class="formRight">
             <?=@$nganhang['ten_'.$lang]?>
			</div>
		</div>
		<?php } ?>

		<?php if($nganhang['taikhoan']!=''){ ?>
		<div class="formRow">
			<label>Tài Khoản : </label>
			<div class="formRight">
             <?=@$nganhang['taikhoan']?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

		<?php if($nganhang['nganhang_'.$lang]!=''){ ?>
		<div class="formRow">
			<label>Ngân Hàng : </label>
			<div class="formRight">
             <?=@$nganhang['nganhang_'.$lang]?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>	
        
         <div class="formRow">
			<label>Yêu cầu thêm</label>
			<div class="formRight">
             <?=@$item['noidung']?>
			</div>
		</div>		        
        
        </div>
		<div class="widget">
		<div class="title"><img src="administrator/images/icons/dark/list.png" alt="" class="titleIcon" />
			<h4>Chi tiết đơn hàng</h4>
		</div>
      
        <table cellpadding="0" cellspacing="0" width="100%" class="odder_tail" id="checkAll">
    <thead>
      <tr class="tt_order">
       
        <td width="10%">STT</td>      
        <td width="20%"><div>Tên sản phẩm</div></td>
        <td width="20%">Hình ảnh</td>
        <td width="10%">Đơn giá</td>
        <td width="10%">Số lượng</td>
        <td width="10%">VAT</td>
        <td width="10%">Thành tiền</td>
      </tr>
    </thead> 
     <tfoot>
      <tr>
        <td colspan="2"><div class="pagination">Tổng tiền</div></td>
       
        <td colspan="3"><div class="pagination" id="sum_price"> <?=number_format(get_tong_tien($item['id']),0, ',', '.')?>&nbsp;VNĐ</div></td>
    </tr>
    </tfoot>   
    <tbody>
     	<?php      
			$tongtien=0;   

			for($i=0,$count_donhang=count($result_ctdonhang);$i<$count_donhang;$i++){
				$pid=$result_ctdonhang[$i]['id_product'];
				$pname=get_product_name($pid);
				$pphoto=get_thumb($pid);
				$tongtien+=	$result_ctdonhang[$i]['gia']*$result_ctdonhang[$i]['soluong'];				
		?>
        <tr id="productct<?=$result_ctdonhang[$i]['id']?>">
          <td><?=$i+1?></td>
          <td><?=$pname?></td>
          <td><img src="<?=_upload_product_l.$pphoto?>" height="100"  /></td>
          <td align="center"><?=number_format($result_ctdonhang[$i]['gia'],0, ',', '.')?>&nbsp;VNĐ</td>
          <td align="center"><?=$result_ctdonhang[$i]['soluong']?></td>
          <td align="center" ><?=number_format($result_ctdonhang[$i]['vat'],0, ',', '.')?>&nbsp;VNĐ</td>
          <td align="center" id="id_price<?=$result_ctdonhang[$i]['id']?>"><span><?=number_format($result_ctdonhang[$i]['gia']*$result_ctdonhang[$i]['soluong']+$result_ctdonhang[$i]['vat'],0, ',', '.')?>&nbsp;VNĐ</span></td>
        </tr>
        <?php } ?>
     </tbody>
  </table>
      
        
</div>
        
	