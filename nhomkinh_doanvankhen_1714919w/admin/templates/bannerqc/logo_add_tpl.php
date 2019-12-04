<div class="wrapper">



<div class="control_frm" style="margin-top:25px;">

    <div class="bc">

        <ul id="breadcrumbs" class="breadcrumbs">

          <li><a href="index.php?com=bannerqc&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý banner</span></a></li>

        </ul>

        <div class="clear"></div>

    </div>

</div>



<form name="supplier" id="validate" class="form" action="index.php?com=bannerqc&act=save_banner_giua<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

  <div class="widget">



    <div class="title chonngonngu">
      <ul>
      <?php foreach ($arr_lang as $key => $l) { ?>
        <li><a href="<?=$l?>" class="<?=$key==0?'active':''?> tipS validate[required]" title="Chọn <?=$config['langs'][$l]?>"><img src="./images/<?=$config['lang_img'][$l]?>" alt="" class="tiengviet" /><?=$config['langs'][$l]?></a></li>
      <?php } ?>
      </ul>
    </div>   

    <?php foreach ($arr_lang as $key => $l) { ?>
      <div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>" >
        <label>Tải logo (<?=$config['langs'][$l]?>):</label>
        <div class="formRight">
          <input type="file" id="file_<?=$l?>" name="file_<?=$l?>" />
        <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow lang_hidden lang_<?=$l?> <?=$key==0?'active':''?>">
        <label>Logo Hiện Tại (<?=$config['langs'][$l]?>):</label>
        <div class="formRight">
        <div class="mt10">
           <object width="208" height="108"  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
                <param NAME="_cx" VALUE="13414">
                <param NAME="_cy" VALUE="6641">
                <param NAME="FlashVars" VALUE>
                <param NAME="Movie" VALUE="<?=_upload_hinhanh.$item['photo_'.$l]?>">
                <param NAME="Src" VALUE="<?=_upload_hinhanh.$item['photo_'.$l]?>">
                <param NAME="Quality" VALUE="High">
                <param NAME="AllowScriptAccess" VALUE>
                <param NAME="DeviceFont" VALUE="0">
                <param NAME="EmbedMovie" VALUE="0">
                <param NAME="SWRemote" VALUE>
                <param NAME="MovieData" VALUE>
                <param NAME="SeamlessTabbing" VALUE="1">
                <param NAME="Profile" VALUE="0">
                <param NAME="ProfileAddress" VALUE>
                <param NAME="ProfilePort" VALUE="0">
                <param NAME="AllowNetworking" VALUE="all">
                <param NAME="AllowFullScreen" VALUE="false">
                <param name="scale" value="ExactFit">
               <embed src="<?=_upload_hinhanh.$item['photo_'.$l]?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="208" height="108" scale="ExactFit"></embed>
              </object>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    <?php } ?>

    


      <div class="formRow">

        <label>Kích thước : </label>

        <div class="formRight">

          <b>Rộng : 130px , Cao : 130px;</b>

        </div>

        <div class="clear"></div>

      </div>



      <div class="formRow">

      <div class="formRight">

              <input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />

      </div>

      <div class="clear"></div>

    </div>

    

  </div> 



  



  

</form></div>