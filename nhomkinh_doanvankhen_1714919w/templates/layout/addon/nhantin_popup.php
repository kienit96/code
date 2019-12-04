<script type="text/javascript">

	$(document).ready(function() {
		$('.dangkymail_p').submit(function(event) {

			var email = $('.dangkymail_p input[name=email_p]').val();
			var ten = $('.dangkymail_p input[name=ten_p]').val();
			var dienthoai = $('.dangkymail_p input[name=dienthoai_p]').val();

			if(email==''){

				alert('Bạn chưa nhập email');

				$('.dangkymail_p input').focus();

			}
			else if(ten==''){

				alert('Bạn chưa nhập tên');

				$('.dangkymail_p input[name=ten_p]').focus();

			}
			else if(dienthoai==''){

				alert('Bạn chưa nhập điện thoại');

				$('.dangkymail_p input[name=dienthoai_p]').focus();

			} else {

				$.ajax ({
					type: "POST",
					url: "ajax/dangky_email.php",
					data: {email:email,ten:ten,dienthoai:dienthoai},
					success: function(result) { 

						if(result==0){

							$('.dangkymail_p input[name=email_p]').val('');
							$('.dangkymail_p input[name=ten_p]').val('');
							$('.dangkymail_p input[name=dienthoai_p]').val('');
							alert('Đăng ký thành công ! ');

							$('.dangkymail_p input').attr('value','');

						} else if(result==1){

							alert('Email đã được đăng ký ! ');

							$('.dangkymail_p input[name=email_p]').val('');
							$('.dangkymail_p input[name=ten_p]').val('');
							$('.dangkymail_p input[name=dienthoai_p]').val('');

						} else if(result==2){

							alert(' ! Đăng ký không thành công . Vui lòng thử lại ');

						}

					}

				});

			}

			return false;

		});

	});

</script>



<div class="dkymail_popup">
	<div class="dky">
		<h4>Thông tin liên hệ</h4>
		<form action="" method="post" name="dangkymail" class="dangkymail_p">
			<input name="ten_p" type="text" class="input" placeholder="Name*">
			<input name="email_p" type="text" class="input" placeholder="Email*">	
			<input name="dienthoai_p" type="text" class="input" placeholder="Telephone">
			<button type="submit" value="">Đăng ký</button>
		</form>
		<span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
	</div>
</div>