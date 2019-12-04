<script language="javascript">

	function xoa(pid){

		if(confirm('Xóa sản phẩm này ! ')){

			document.form_giohang.pid.value=pid;

			document.form_giohang.command.value='delete';

			document.form_giohang.submit();

		}

	}

</script>

<form name="form_giohang" action="index.php?com=thanh-toan" method="get">

	<input type="hidden" name="com" value="thanh-toan" />

	<input type="hidden" name="pid" />

    <input type="hidden" name="command" />

</form>



<?php

	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){

		remove_pro_thanh($_REQUEST['pid']);

	}

	else if($_REQUEST['command']=='clear'){

		unset($_SESSION['cart']);

	}

?>



<script language="javascript">

	function clear_cart(){

		if(confirm('Bạn có muốn xóa tất giỏ hàng không ?')){

			document.form1.command.value='clear';

			document.form1.submit();

		}

	}

	function update_cart(){

		document.form1.command.value='update';

		document.form1.submit();

	}

	$(document).ready(function() {

		$('.capnhat_sl').keyup(function(event) {

			/* Act on the event */

			var soluong = $(this).val();

			var product = $(this).attr('name');

			$.ajax({

		            type:'POST',

		            url:'ajax/capnhat_giohang.php',

		            data:{soluong:soluong,product:product},

		            success: function(result) {

		            	var getData = $.parseJSON(result);

		            	$('.capnhat_price_'+product).html(getData.price_item);

		            	$('.capnhat_full').html(getData.full_item);

		            }

	        });

		});

	});

</script>



<link href="css/giohang.css" rel="stylesheet" type="text/css" />



<div id="info">

<div id="sanpham">

	<div class="title"><h2><?=_thanhtoan?></h2></div>

     <form method="post" name="frm_order" action="xac-nhan.html" enctype="multipart/form-data"  id="frm_order">

        <div class="khung">   

           <table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">



           <tr class="menu_giohang" >

	           <td class="res_cart">STT</td>

	           <td><?=_sanpham?></td>

	           <td><?=_soluong?></td>

	           <td class="res_cart"><?=_tonggia?></td>

	           <td><?=_xoa?></td>

           </tr>



    		<?php 
			if(is_array($_SESSION['cart'])){

				$max=count($_SESSION['cart']);

				for($i=0;$i<$max;$i++){

					$pid=$_SESSION['cart'][$i]['productid'];

					$q=$_SESSION['cart'][$i]['qty'];

					$pname=get_product_name($pid);

					if($q==0) continue;

			?>

    		<tr class="form_giohang">

        		<td width="5%" class="res_cart"><?=$i+1?></td>

                <td width="30%" class="tt_cart"><a href="san-pham/<?=$pid?>/<?=changeTitle($pname)?>.html">

                    <img src="upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>" class='img' />

                    <h3><?=$pname?> </h3>

					<span><?=_gia?> : <?=number_format(get_price($pid),0, ',', '.')?>&nbsp;đ</span>

                </a></td>

                <td width="8%"><input name="<?=$pid?>" value="<?=$q?>" class="capnhat_sl" /></td>                    

                <td width="10%" class="res_cart capnhat_price_<?=$pid?>"><?=number_format(get_price($pid)*$q,0, ',', '.')?>&nbsp;đ</td>

                <td width="10%"><i class="fa fa-trash-o" aria-hidden="true" onclick="xoa(<?=$pid?>)" width="20" style=" cursor: pointer;font-size: 20px;color: red;" ></i></td>

    		</tr>

            <?php } ?>

				

            <tr class="tonggia">

            	<td colspan="7"><?=_tonggia?> : <b  class="capnhat_full" ><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>

            </tr>

			<?php }	else{ echo "<tr bgColor='#FFFFFF'><td>"._bankhongcosanphamnaotronggiohang."</td>"; } ?>

        

        </table>

    

    <div class="giohang_form col-md-6 col-sm-6 col-xx-12 col-xs-12">

	    <div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">

	   		<label><img src="images/icon/accuont.png" alt="" /> <?=_hoten?> <span class="alert">*</span></label>

	    	<input name="ten" id="ten" class="formsubmit" value="<?=$thanhvien_tv['hoten']?>" required="required" />

	    </div>

	    

		<div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">

		    <label><img src="images/icon/phone.png" alt="" /> <?=_dienthoai?> <span class="alert">*</span></label>

		    <input name="dienthoai" id="dienthoai" class="formsubmit" value="<?=$thanhvien_tv['dienthoai']?>" required="required" />

	    </div>

		<div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">

		    <label><img src="images/icon/house.png" alt=""  /> <?=_diachi?> <span class="alert">*</span></label>

		    <input  name="diachi"  id="diachi" class="formsubmit" required="required"  value="<?=$thanhvien_tv['diachi']?>"/>

	    </div>

		<div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">

		    <label><img src="images/icon/batquai.png" alt="" /> E-mail <span class="alert">*</span></label>

		    <input type="email" name="email" id="email" class="formsubmit" required="required"  value="<?=$thanhvien_tv['email']?>"/>

	    </div>

	</div>



    <div class="col-md-6 col-sm-6 col-xx-12 col-xs-12 cl_area">

		<label><img src="images/icon/thutuc.png" alt="" /> <?=_thongtinnguoinhan?> </label>

	    <textarea name="noidung"><?=$_POST['noidung']?></textarea>

    </div>

      

    <div class="icon_thanh">

        <input id="submit_thanhtoan" type="submit" name="next" value="<?=_thanhtoan?>" class="g_muatiep" />

    </div>

    

    </div> 



</form>

                

</div>           

</div>