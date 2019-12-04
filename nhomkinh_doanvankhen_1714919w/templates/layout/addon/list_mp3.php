

<script type="text/javascript" src="https://code.jquery.com/jquery-1.6.4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/mp3/TotalControl/javascripts/soundmanager/script/soundmanager2-nodebug-jsmin.js"></script>
<link type="text/css" href="js/mp3/TotalControl/javascripts/jscrollpane/style/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<!-- the mousewheel plugin -->
<script type="text/javascript" src="js/mp3/TotalControl/javascripts/jscrollpane/script/jquery.mousewheel.js"></script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/mp3/TotalControl/javascripts/jscrollpane/script/jquery.jscrollpane.js"></script>

<script src="js/mp3/TotalControl/TotalControl.js"></script>
<script>
$(function () {
  
  // $("#total-playlist").totalControl({
  //  style: "light.css",
  //  checkboxesEnabled: true,
  //  playlistSortable: true, 
  //  position: "bottomLeft",
  //  playlistHeight:150,
  //  repeatOneEnabled: true,
  //  repeatAllEnabled: true,
  //  shuffleEnabled: true,
  //  playlistVisible: true,
  //  songTooltipPosition: "top",
  //  songTooltipEnabled: true,
  //  miniPlayer:false,
  //  isDraggable: true,
  //  autoplayEnabled: true,
  //  addSongEnabled: true
    
  // });

    $("#total-playlist").totalControl({
        style: "default.css",
        checkboxesEnabled: true,
        playlistSortable: true, 
        position: "relative",
        playlistHeight:170,
        repeatOneEnabled: true,
        repeatAllEnabled: true,
        shuffleEnabled: true,
        playlistVisible: true,
        songTooltipPosition: "top",
        songTooltipEnabled: true,
        miniPlayer:false,
        isDraggable: true,
        autoplayEnabled: true,
        addSongEnabled: true
    });

    // $("#total-playlist").totalControl({
    //     style: "dark.css",
    //     checkboxesEnabled: true,
    //     playlistSortable: true, 
    //     position: "relative",
    //     playlistHeight:170,
    //     repeatOneEnabled: true,
    //     repeatAllEnabled: true,
    //     shuffleEnabled: true,
    //     playlistVisible: true,
    //     songTooltipPosition: "bottom",
    //     songTooltipEnabled: true,
    //     miniPlayer:true,
    //     isDraggable: true,
    //     autoplayEnabled: true,
    //     addSongEnabled: true
        
    // });


});
</script>
<div id="listmp3">
    <ul id="total-playlist" style="margin-left:auto; margin-right:auto;">
        <li mp3="js/mp3/mp3/Take a bow.mp3"  title="Take a Bow" artist="Madonna" ></li>
        <li mp3="js/mp3/mp3/08 Ribbon in the sky.mp3" artist="Stevie Wonder" title="Ribbon in the Sky" ></li>
        <li mp3="js/mp3/mp3/06 My Life (The Neptunes).mp3"  artist="Robin Thicke" title="My Life" artwork="images/despicable-me-soundtrack.jpeg"></li>

        <li mp3="js/mp3/mp3/10 Until The End Of Time ft The Benjamin Wright Orchestra.mp3" artist="Justin Timberlake" title="Until the End of Time" artwork="images/Justin-Timberlake-Until-The-End-Of-434545.jpeg"></li>
        <li mp3="js/mp3/mp3/Love You.mp3" artist="Maxwell" title="Love You" artwork="images/maxwell-bsn-cover.jpeg"></li>
</ul>
</div>
