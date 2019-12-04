<?php

	$sql = "select ten_$lang,id,tenkhongdau,thumb,ngaytao,photo,mota_$lang from #_baiviet where hienthi=1 and type='thuvien' order by stt,id desc";
  $d->query($sql);
  $thuvien_nb = $d->result_array();
?>

<script src="js/ImageScroller.js" language="javascript"></script>

<div id="ctsdiv_tv" style=" position:relative; height:244px; overflow:hidden">

   <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctsdiv_tv" style="position:relative; margin:0px">

    <?php foreach ($thuvien_nb as $key => $tintuc) { ?>

           <tr>

              <td valign="top">

                 <table width="100%" cellspacing="0" cellpadding="0" border="0">

                         <tr>

                           <td valign="top" class="hotnew">                                                        

                            <div class="img">

                               <a href="tin-tuc/<?=$tintuc['tenkhongdau']?>.html"><img src="<?=_upload_baiviet_l.$tintuc['thumb']?>" alt="<?=$tintuc['ten_'.$lang]?>" /></a>

                            </div>

                            <div class="noidung_tt">
                              <p><?=catchuoi($tintuc['mota_'.$lang],120)?></p>
                            </div> 

                            </td>

                         </tr>                          

                 </table>

              </td>

           </tr>

       <?php }?>

  </table>

  <script type="text/javascript">createScroller("myScroller_news", "ctsdiv_tv", "ctsdiv_tv",0,100,1,0,1);</script>   

 </div>