<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=place&act=man_city"><span>Tỉnh thành</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá mục này?'))
		{
			location.href = l;	
		}
	}	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}	
	function timkiem()
	{	
		var a = $('input.key').val();	if(a=='Tên...') a='';		
		window.location ="index.php?com=place&act=man_city&key="+a;	
		return true;
	}					
</script>
<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=place&act=add_city'" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('index.php?com=place&act=man_city&multi=del');return false;" />
    </div>      
</div>



<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" name="key" class="key" value="" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB" onclick="timkiem();" value="">Tìm kiếm</button>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>       
        <td class="sortCol"><div>Tên<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>   
        <!-- <td class="tb_data_small">Nổi bật</td>         -->
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10"><div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>     </div></td>
      </tr>
    </tfoot>
    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="iddel[]" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
        </td>
        <td align="center">
        
         <input data-val0="<?=$items[$i]['id']?>" data-val2="table_<?=$_GET['com']?>_city" data-val3="stt" onblur="stt(this)" type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="tipS smallText update_stt" original-title="Nhập số thứ tự bài viết" rel="<?=$items[$i]['id']?>" />

           
         
        </td> 
            
        <td class="title_name_data">
            <a href="index.php?com=place&act=edit_city&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['ten']?></a>
        </td>
       
        <td align="center">
         <a data-val2="table_<?=$_GET['com']?>_city" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a> 
           
        </td>

       <!--  <td align="center">
         <a data-val2="table_<?=$_GET['com']?>_city" rel="<?=$items[$i]['noibat']?>" data-val3="noibat" class="diamondToggle <?=($items[$i]['noibat']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a> 
           
        </td> -->
       
        <td class="actBtns">
            <a href="index.php?com=place&act=edit_city&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa"><img src="./images/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('index.php?com=place&act=delete_city&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa"><img src="./images/icons/dark/close.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>               