<div id="info">
	<div class="margin_auto">
	    <div class="dieuhuong   ">  
	      <a href="./" itemprop="url" title="Trang chủ"><span itemprop="title">Trang Chủ</span></a>
	      <a href="<?=$com?>" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_detail?></span></a>
	    </div>
	</div>
    <div id="lobanOuter">
		<div id="abc">this.x=0 : out=8100</div>
		<div class="loban-touch-left"></div>
		<div class="loban-touch-right"></div>
		<div id="sodoLoban">6.7 cm</div>
		<div id="container-sodo" style="left: 646.5px;"><input type="text" value="450" name="sodo" id="sodo"> mm (nhập số)</div>
		<div id="thanhdo" style="left: 674.5px;"></div>
		<p class="loban-note">Hãy kéo thước</p>
		<p class="loban-t loban-522"><strong>Thước Lỗ Ban 52.2cm:</strong> Khoảng thông thủy (cửa, cửa sổ...)</p>
		<p class="loban-t loban-429"><strong>Thước Lỗ Ban 42.9cm (Duong trạch):</strong> Khối xây dựng (bếp, bệ, bậc...)</p>
		<p class="loban-t loban-388"><strong>Thước Lỗ Ban 38.8cm (âm phần):</strong> Đồ nội thất (bàn thờ, tủ...)</p>
		<div id="loban-wrapper" style="overflow: hidden; left: 0px;">
			<div id="loban-scroller" style="transition-property: transform; transform-origin: 0px 0px; transition-timing-function: cubic-bezier(0.33, 0.66, 0.66, 1); transform: translate(0px, 0px) scale(1) translateZ(0px); transition-duration: 200ms;">
				<div id="pullRight" style="display: none;" class="">
					<span class="pullRightIcon"></span><span class="pullRightLabel">Kéo qua phải...</span>
				</div>
				<ul id="loban-thelist">
					<li>
						<img src="thuoc522.php" nopin="nopin">
						<img src="thuoc429.php" nopin="nopin">
						<img src="thuoc388.php" nopin="nopin">
					</li>
				</ul>
				<div id="pullLeft" style="display:none;">
					<span class="pullLeftIcon"></span><span class="pullLeftLabel">Kéo qua trái...</span>
				</div>
			</div>
			<div style="position: absolute; z-index: 100; height: 7px; bottom: 1px; left: 2px; right: 2px; pointer-events: none; transition-property: opacity; overflow: hidden; opacity: 1;">
				<div style="position: absolute; z-index: 100; background: padding-box padding-box rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, 0.9); box-sizing: border-box; height: 100%; border-radius: 3px; pointer-events: none; transition-property: transform; transform: translate(0px, 0px) translateZ(0px); transition-timing-function: cubic-bezier(0.33, 0.66, 0.66, 1); width: 179px; transition-duration: 200ms;"></div>
			</div>
		</div>
	</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<h2 class="visit_hidden"><?=$title_detail?></h2>