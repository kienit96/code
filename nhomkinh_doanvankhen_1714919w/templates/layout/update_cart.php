<div id="popup_cart"></div>
<script>
	$(document).ready(function(){
		/*$('body').on('click','.color span',function(event) {
			$(this).parents('.color').find('span.active').removeClass('active');
		    $(this).addClass('active');
		    var id = $(this).data('id');
		    // $(".app-figure.active").removeClass('active');
		    // $(".app-figure[data-id="+id+"]").addClass('active');
		});
		$('body').on('click','.size span',function(event) {
			$(this).parents('.size').find('span.active').removeClass('active');
		    $(this).addClass('active');
		});*/
		/*$('body').on('click','.view_cart',function(event) {
			var id = $(this).data('id');
			$.ajax({
				type:'post',
				url:'ajax/ajax_chitiet.php',
				data:{id:id},
				success: function(result) { 
					$('#popup_cart').html(result);
					$.fancybox.open($('#popup_cart'),{
				      	toolbar  : false,
				      	smallBtn :true, 
				      	clickSlide: "toggleControls",
				      	hideScrollbar: true,
				      	touch: false,
				      	afterClose : function( instance, current ) {
							$('#popup_cart').html("");
						}
				    });
				}
			})
		});*/
		$('body').on('click','.muangay',function(event) {
			var pid = $(this).data('pid');
			// var size = $(this).parents('.khung_thongtin').find('.size span.active').attr('data-size');
	  //   	var color = $(this).parents('.khung_thongtin').find('.color span.active').attr('data-color');
	    	var pqty = 1;
	    	if ($('#quanlity').length) {
				pqty = $('#quanlity').val();
	    	}else if ($('#quanlity_details').length) {
	    		pqty = $('#quanlity_details').val();
	    	}
			$.ajax({
				type:'post',
				url:'ajax/cart.php',
				dataType:'json',
				data:{id:pid,size:'',mausac:'',soluong:pqty,act:"dathang"},
			})
			.done(function() {
				setTimeout(function(){   
					window.location.href = "thanh-toan";
				}, 500);
			})
			.fail(function() {
				toastr["warning"]("Lỗi thao tác, vui lòng thử lại!");
			})
			.always(function() {
				console.log("complete");
			});
		});
		$('body').on('click','.buy',function(event) {
			var pid = $(this).data('pid');
			// var size = $(this).parents('.khung_thongtin').find('.size span.active').attr('data-size');
	  //   	var color = $(this).parents('.khung_thongtin').find('.color span.active').attr('data-color');
	    	var pqty = 1;
	    	if ($('#quanlity').length) {
				pqty = $('#quanlity').val();
	    	}else if ($('#quanlity_details').length) {
	    		pqty = $('#quanlity_details').val();
	    	}
			$.ajax({
				type:'post',
				url:'ajax/cart.php',
				dataType:'json',
				data:{id:pid,size:'',mausac:'',soluong:pqty,act:"dathang"},
				success: function(msg){data = msg;}
			})
			.done(function() {
				toastr["success"]("Thêm sản phẩm thành công!");
				$(".cart span").html(data['sl']);
				//$(".cart_fix span").html(data['sl']);
				//$(".cart .total").html(addCommas(data['total'])+'₫');
			})
			.fail(function() {
				toastr["warning"]("Lỗi thao tác, vui lòng thử lại!");
			})
			.always(function() {
				console.log("complete");
			});
		});
		// function addCommas(nStr)
		// {
		//     nStr += '';
		//     x = nStr.split('.');
		//     x1 = x[0];
		//     x2 = x.length > 1 ? '.' + x[1] : '';
		//     var rgx = /(\d+)(\d{3})/;
		//     while (rgx.test(x1)) {
		//         x1 = x1.replace(rgx, '$1' + '.' + '$2');
		//     }
		//     return x1 + x2;
		// }
	});
</script>