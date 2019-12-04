<?php
function get_main_city()
    {
        $sql="select * from table_place_city order by id";
        $stmt=mysql_query($sql);
        $str='
            <select id="id_city" name="id_city" class="main_font" onchange="select_onchange()">
            <option value="0">Chọn tỉnh thành</option>            
            ';
        while ($row=@mysql_fetch_array($stmt)) 
        {
            if($row["id"]==(int)$_REQUEST['id_city'])
                $selected="selected";
            else 
                $selected="";
            $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';            
        }
        $str.='</select>';
        return $str;
    }

    function get_main_dist()
    {
        $sql="select * from table_place_dist where id_city=".$_REQUEST['id_city']." order by stt";
        $stmt=mysql_query($sql);
        $str='
            <select id="id_dist" name="id_dist" class="main_font" onchange="select_onchange2()">
            <option>Chọn quận huyện</option>            
            ';
        while ($row=@mysql_fetch_array($stmt)) 
        {
            if($row["id"]==(int)$_REQUEST['id_dist'])
                $selected="selected";
            else 
                $selected="";
            $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';            
        }
        $str.='</select>';
        return $str;
    }

    function get_main_ward()
    {
        $sql="select * from table_place_ward where id_dist=".$_REQUEST['id_dist']." order by stt";
        $stmt=mysql_query($sql);
        $str='
            <select id="id_ward" name="id_ward" class="main_font" onchange="select_onchange3()">
            <option>Chọn phường xã</option>            
            ';
        while ($row=@mysql_fetch_array($stmt)) 
        {
            if($row["id"]==(int)$_REQUEST['id_ward'])
                $selected="selected";
            else 
                $selected="";
            $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';            
        }
        $str.='</select>';
        return $str;
    }
    
    ?>
<script language="javascript">              
    function select_onchange()
    {               
        var a=document.getElementById("id_city");
        window.location ="index.php?com=place&act=<?php if($_REQUEST['act']=='edit_street') echo 'edit_street'; else echo 'add_street';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_city="+a.value; 
        return true;
    }
    function select_onchange1()
    {               
        var a=document.getElementById("id_city");
        var b=document.getElementById("id_dist");
        window.location ="index.php?com=place&act=<?php if($_REQUEST['act']=='edit_street') echo 'edit_street'; else echo 'add_street';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_city="+a.value+"&id_dist="+b.value; 
        return true;
    }
    
    function select_onchange2()
    {               
        var a=document.getElementById("id_city");
        var b=document.getElementById("id_dist");
        var c=document.getElementById("id_ward");
        window.location ="index.php?com=place&act=<?php if($_REQUEST['act']=='edit_street') echo 'edit_street'; else echo 'add_street';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_city="+a.value+"&id_dist="+b.value+"&id_ward="+c.value;  
        return true;
    }
    
</script>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=place&act=mam_street"><span>Đường</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=place&act=save_street&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tỉnh thành</label>
			<div class="formRight">
            	<div class="selector">
				<?=get_main_city()?>
                </div>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>Quận huyện</label>
            <div class="formRight">
                <div class="selector">
                       <?=get_main_dist()?>
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Phường xã</label>
            <div class="formRight">
                <div class="selector">
                    <?=get_main_ward()?>
                </div>
            </div>
            <div class="clear"></div>
        </div>

		<div class="formRow">
			<label>Tên</label>
			<div class="formRight">
                <input type="text" name="name" title="Nhập tên tỉnh thành" id="name" class="tipS validate[required]" value="<?=@$item['ten']?>" />
			</div>
			<div class="clear"></div>
		</div>		        
             
      
    
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
		
	<div class="formRow">
            <div class="formRight">
                <input type="hidden" name="id" id="id_this_place" value="<?=@$item['id']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>	
	</div>
   
	
</form>   