<style>
    .dang_ky_fix.top_fixed
    {
        top: 40px;
    }
    .dang_ky_fix
    {
        position: fixed;
        top: 160px;
        right: 30px;
        text-align: center;
        background-color: #d60c0c;
        margin-top: 10px;
        color: #fdf74f;
        z-index: 9999;
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 8px 15px;
        font-weight: bold;
    }
    .dang_ky_fix a 
    {
        color: #fdf74f;
    }
    .dang_ky_fix a i 
    {
        padding-right: 5px;
    }
    .dang_ky_fix {
        -webkit-animation-duration: 1s;
        -webkit-animation-name: tada_keyframe;
        -webkit-animation-fill-mode: both;
        animation-duration: 1s;
        animation-name: tada_keyframe;
        animation-fill-mode: both;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
    }
    @keyframes tada_keyframe {
        0% {
            -webkit-transform:translate(0,0) scale(1,1);
            transform:translate(0,0) scale(1,1)
        }
        10%,20% {
            -webkit-transform:translate(0,0) scale(.9,.9) rotateZ(-3deg);
            transform:translate(0,0) scale(.9,.9) rotateZ(-3deg)
        }
        30%,50%,70%,90% {
            -webkit-transform:translate(0,0) scale(1.1,1.1) rotateZ(3deg);
            transform:translate(0,0) scale(1.1,1.1) rotateZ(3deg)
        }
        40%,60%,80% {
            -webkit-transform:translate(0,0) scale(1.1,1.1) rotateZ(-3deg);
            transform:translate(0,0) scale(1.1,1.1) rotateZ(-3deg)
        }
        100% {
            -webkit-transform:translate(0,0) scale(1,1) rotateZ(0);
            transform:translate(0,0) scale(1,1) rotateZ(0)
        }
    }
    @-webkit-keyframes tada_keyframe {
        0% {
            -webkit-transform:translate(0,0) scale(1,1)
        }
        10%,20% {
            -webkit-transform:translate(0,0) scale(.9,.9) rotateZ(-3deg)
        }
        30%,50%,70%,90% {
            -webkit-transform:translate(0,0) scale(1.1,1.1) rotateZ(3deg)
        }
        40%,60%,80% {
            -webkit-transform:translate(0,0) scale(1.1,1.1) rotateZ(-3deg)
        }
        100% {
            -webkit-transform:translate(0,0) scale(1,1) rotateZ(0)
        }
    }
</style>
<div class="dang_ky_fix">
    <i class="fa fa-phone" aria-hidden="true"></i>
    <span><?=$row_setting['hotline']?></span>
</div>