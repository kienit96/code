<?php if(count($camnhan) > 0){ ?>
<div id="ctsdiv_news2">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl_news2" style="position:relative; margin:0px">
    <?php foreach ($camnhan as $key => $cn) { ?>
   <tr>
      <td valign="top">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
         <tr>
            <td valign="top" class="cnit">                                                       
              <div class="noidung">
                <p><?=catchuoi($cn['mota_'.$lang],250)?></p>
                <h3><?=$cn['ten_'.$lang]?></h3>
              </div> 
              <div class="img">
                 <img  onerror="this.src='thumb/106x106/2/images/default.png';" src="thumb/106x106/1/<?=_upload_baiviet_l.$cn['photo']?>" alt="<?=$cn['ten_'.$lang]?>" />
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