<?php 
    $d->reset();
    $sql_images= "select thumb_vi,mota,link from #_photo where hienthi=1 and type='slider' order by stt,id desc ";
    $d->query($sql_images);
    $slide_home = $d->result_array();

    $d->reset();
    $sql_images= "select * from #_info where type='trangchu' ";
    $d->query($sql_images);
    $gioithieu_home = $d->fetch_array();
?>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script>
    $(document).ready(function ($) {

        var _SlideshowTransitions = [
        //Fade
        { 
           $Duration:1200,$Opacity:2}
        ];

        var options = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $AutoPlayInterval: 3000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },

            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            },

            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1349));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>

    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 1349px; height: 440px; overflow: hidden; ">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1349px; height: 440px; overflow: hidden;">
        <?php for($i=0;$i<count($slide_home);$i++){?>
            <div>
                <img u="image" src="<?=_upload_hinhanh_l.$slide_home[$i]['thumb_vi']?>" />
                <div class="slider_mota">
                    <a href="<?=$slide_home[$i]['link']?>" target="_blank"><?=$slide_home[$i]['mota']?></a>
                </div>
            </div>
        <?php } ?>  
        </div>
        <!-- Bullet Navigator Skin Begin -->
        <style>

            .jssora20l,.jssora20ldn
            {
                position: absolute;
                cursor: pointer;
                display: block;
/*                background: url(images/left_slider.png) no-repeat;
*/                overflow:hidden;
                z-index: 100;
            }
            .jssora20r,.jssora20rdn
            {
                position: absolute;
                cursor: pointer;
                display: block;
                /*background: url(images/right_slider.png) no-repeat;*/
                overflow:hidden;
                 z-index: 100;
            }

            .jssorb05 div {
                background-position: -7px -7px;
            }

            .jssorb05 div:hover, .jssorb05 .av:hover {
                background-position: -37px -7px;
            }

            .jssorb05 .av {
                background-position: -67px -7px;
            }

            .jssorb05 .dn, .jssorb05 .dn:hover {
                background-position: -97px -7px;
            }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>

         <span u="arrowleft" class="jssora20l" style="width: 50px; height: 61px; top: 180px; left: 20px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora20r" style="width: 50px; height: 61px; top: 180px; right: 20px">
        </span>

        <style>
            .jssora12l, .jssora12r, .jssora12ldn, .jssora12rdn {
                position: absolute;
                cursor: pointer;
                display: block;
                background: url(../img/a12.png) no-repeat;
                overflow: hidden;
            }

            .jssora12l {
                background-position: -16px -37px;
            }

            .jssora12r {
                background-position: -75px -37px;
            }

            .jssora12l:hover {
                background-position: -136px -37px;
            }

            .jssora12r:hover {
                background-position: -195px -37px;
            }

            .jssora12ldn {
                background-position: -256px -37px;
            }

            .jssora12rdn {
                background-position: -315px -37px;
            }
        </style>
</div>

