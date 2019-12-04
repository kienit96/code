<?php
    $d->reset();
    $sql = "select id,tenkhongdau,ten_$lang from #_product_list where type='batdongsan' and hienthi=1  order by stt,id desc ";
    $d->query($sql);
    $row_list = $d->result_array();

    $d->reset();
    $sql = "select * from #_place_city where hienthi=1 order by stt asc";
    $d->query($sql);
    $tinhthanh = $d->result_array();
?>
<div class="margin_auto">
    <form id="frmPrjSearch" name="frmPrjSearch" action="tim-kiem.html">
        <div class="khung">
            <h4>Tìm bất động sản</h4>
            <select name="danhmuc" id="danhmuc">
                <option value="">Chọn danh mục</option>
                <?php for($i=0;$i<count($row_list);$i++){?>
                <option 
                <?php if($_REQUEST['danhmuc'] == $row_list[$i]['id']){
                    echo 'selected';
                } ?>
                 value="<?=$row_list[$i]['id']?>"><?=$row_list[$i]['ten_'.$lang]?></option>
                <?php } ?>
            </select>
            <select id="city" name="tinhthanh" class="main_select">
                <option value="">Tỉnh/ Thành phố</option>
                <?php for($i=0;$i<count($tinhthanh); $i++) { ?>
                <option value="<?=$tinhthanh[$i]['id']?>" <?php if($tinhthanh[$i]['id']==$_GET['city']){ echo 'selected="selected"';}?> ><?=$tinhthanh[$i]['ten']?></option>
                <?php } ?>
            </select>
            <select id="quanhuyen" name="quanhuyen" class="main_select">
                <option value="">Quận/Huyện</option>
            </select>
            <button type="button" name="btnSearch" id="btnSearch">Tìm kiếm</button> 
        </div>
    </form>
</div>