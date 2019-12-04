<?php
     $d->reset();
    $sql = "select ten_$lang,photo,mota_$lang,tenkhongdau,thumb,ngaytao from #_baiviet where hienthi=1 and type='tintuc' and noibat!=0 order by stt,id desc ";
    $d->query($sql);
    $tintuc_bt = $d->result_array();
?>
<script src="js/ImageScroller.js" language="javascript"></script>
<div id="ctsdiv" style=" position:relative; height:440px; overflow:hidden">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl" style="position:relative; margin:0px">
         <?php for($i=1,$count_ha=count($tintuc_bt);$i<$count_ha;$i++){?>
                     <tr>
                        <td valign="top">
                           <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                   <tr>
                                      <td valign="top" class="sp_noibat">
                                      <a href="tin-tuc/<?=$tintuc_bt[$i]['tenkhongdau']?>.html" >
                                      <img src="<?=_upload_baiviet_l?>100x75x1/<?=$tintuc_bt[$i]['photo']?>" alt="<?=$tintuc_bt[$i]['ten_'.$lang]?>"/></a>
                                      <h3><a href="tin-tuc/<?=$tintuc_bt[$i]['tenkhongdau']?>.html" ><?=catchuoi($tintuc_bt[$i]['ten_'.$lang],35)?></a></h3>
                                      
                                      <p><?=catchuoi($tintuc_bt[$i]['mota_'.$lang],200)?></p>
                                      </td>
                                   </tr>                          
                           </table>
                        </td>
                     </tr>
                 <?php }?>
             </table>
 <script type="text/javascript">createScroller("myScroller", "ctsdiv", "ctstbl",0,50,1,0,1);</script>   
 </div>