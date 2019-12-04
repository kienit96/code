<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<select id="cboLocattion" onchange="LoadDatathoitiet();" style="width: 165px;margin-right:8px;">                                      
                                    <option value="VMXX0007" selected="">TP HCM</option>

                                    <option value="VMXX0006">Hà Nội</option>
                                    <option value="VMXX0005">Hải Phòng</option>
                                    <option value="7213884">Buôn Mê Thuột</option>
                                    <option value="VMXX0031">Cà Mau</option>
                                    <option value="7213346">Cẩm Phả</option>
                                    <option value="VMXX0004">Cần Thơ</option>

                                    <option value="VMXX0020">Cao Bằng</option>
                                    <option value="8456">Đà Lạt</option>
                                    <option value="VMXX0028">Đà Nẵng</option>
                                    <option value="7208781">Gia Lai</option>
                                    <option value="7208375">Hà Giang</option>
                                    <option value="7208075">Hà Tĩnh</option>

                                    <option value="VMXX0009">Huế</option>
                                    <option value="VMXX0019">Lào Cai</option>
                                    <option value="19163">Long Xuyên</option>
                                    <option value="7201559">Móng Cái</option>
                                    <option value="VMXX0011">Nam Định</option>
                                    <option value="VMXX0029">Nha Trang</option>

                                    <option value="VMXX0012">Phan Thiết</option>
                                    <option value="7196808">Pleiku</option>
                                    <option value="27117">Quy Nhơn</option>
                                    <option value="VMXX0015">Thái Nguyên</option>
                                    <option value="VMXX0026">Vinh</option>
                                    <option value="VMXX0018">Vũng Tàu</option>

                               </select>
                        </div>
                        <div style="width:100%;clear:both;" id="divThoiTiet"></div>
                        <script type="text/javascript" language="javascript">
    var $j = jQuery.noConflict();
    function LoadDatathoitiet() {
        var cbovalue = jQuery("#cboLocattion").val();
        jQuery.ajax({
            type: "POST",
            url: 'thoitiet.php?id=' + cbovalue,
            data: "",
            beforeSend: function() {
                jQuery('#divThoiTiet').html('<div style="width:100%;vertical-align:top; padding-top:40px;  text-align:center;" id="loading"><img src="http://tuoitre.vn/images/loading.gif"/></div>');
            },
            success: function(req) { jQuery('#divThoiTiet').html(req); }
        });
    }
    LoadDatathoitiet();
</script>