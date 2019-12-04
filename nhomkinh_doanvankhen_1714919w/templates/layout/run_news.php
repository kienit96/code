<?php if(count($tintuc) > 0){ ?>
<div id="ctsdiv_news">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl_news" style="position:relative; margin:0px">
    <?php foreach ($tintuc as $key => $tintuc) { ?>
   <tr>
      <td valign="top">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
         <tr>
            <td valign="top" class="hotnew">                                                       
              <div class="img">
                 <a href="<?=$tintuc['tenkhongdau']?>.html"><img  onerror="this.src='thumb/150x110/2/images/default.png';" src="thumb/150x110/1/<?=_upload_baiviet_l.$tintuc['photo']?>" alt="<?=$tintuc['ten_'.$lang]?>" /></a>
              </div>
              <div class="noidung_tt">
                <h3><a href="<?=$tintuc['tenkhongdau']?>.html"><?=$tintuc['ten_'.$lang]?></a></h3>
                <span>Ngày đăng <?=date('d/m/Y - h:i',$tintuc['ngaytao'])?></span>
                <p><?=catchuoi($tintuc['mota_'.$lang],90)?></p>
              </div> 
            </td>
         </tr>                          
        </table>
      </td>
   </tr>
       <?php }?>
  </table>
 </div>
<?php }else{ ?>
<div style="width: 100%; float: left; text-align:center; color:#000000; font-family: SVNAvo; font-size:14px; text-transform:uppercase;"><?=_noidungdangcapnhat?> </div>
<?php }  ?>