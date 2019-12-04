<div id="info">
  	<div class="margin_auto">
	    <div class="dieuhuong   ">  
	      <a href="./" itemprop="url" title="Trang chủ"><span itemprop="title">Trang Chủ</span></a>
	      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
	    </div>
	    <div id="container-catalogue">
	    	<!-- Begin Navigation Book -->
	    	<ul class="tool-catalogue w-clear">
	    		<li><a id="first" href="#" title="goto first page" class="">First page</a></li>
	    		<li><a id="back" href="#" title="go back one page" class="">Back</a></li>
	    		<li><a id="next" href="#" title="go foward one page" class="">Next</a></li>
	    		<li><a id="last" href="#" title="goto last page" class="">last page</a></li>
	    		<li><a id="zoomin" href="#" title="zoom in">Zoom In</a></li>
	    		<li><a id="zoomout" href="#" title="zoom out">Zoom Out</a></li>
	    		<li><a id="slideshow" href="#" title="start slideshow">Slide Show</a></li>
	    		<li><a id="flipsound" href="#" title="flip sound on/off">Flip sound</a></li>
	    		<li><a id="fullscreen" href="#" title="fullscreen on/off">Fullscreen</a></li>
	    		<li><a id="thumbs" href="#" title="thumbnails on/off">Thumbs</a></li>
	    	</ul>
	    	<!-- End Navigation Book -->
	    	<!-- Begin Main Book -->
	    	<div id='catalogue'>
	    		<?php foreach ($row_detail as $key => $row) { ?>
            	<div class='feature'>
                    <img src="thumb/400x500/2/<?=_upload_baiviet_l.$row['photo']?>" alt="<?=$row['ten']?>">
                </div>
            	<?php } ?>
        	</div>
    	</div>
	    <!-- End Main Book -->
	    <!-- Begin Thumb Book -->
	    <div id='thumbs_holder'></div>
	    <!-- Begin Thumb Book -->
	</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>