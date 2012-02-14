<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
    .body {
    background-color: #FDFDEB;
}

body {
    background: url("bg.png") no-repeat fixed center top #666666;
}
    
    
     body, div,ul, li {
    margin: 0;
    padding: 0;
}

li {
    list-style: none outside none;
}






.page {
    margin: 0 auto 20px;
    position: relative;
    width: 980px;
}

.page_tc {
    background-position: 0 -30px;
    height: 26px;
    margin: 0 12px 0 84px;
}

.page_cl {
    background: url("images/page_shadow_left.png") repeat-y scroll 0 0 transparent;
    height: 100%;
    padding-left: 7px;
}
.page_cr {
    background: url("images/page_shadow_right.png") repeat-y scroll right top transparent;
    padding-right: 7px;
}
.page_inner {
    padding: 66px 0 201px;
    position: relative;
}
.header {
    height: 89px;
    overflow: hidden;
    position: absolute;
    top: -23px;
    width: 100%;
}







.bgbox {
    position: relative;
    z-index: 5;
}
.bgbox_l, .bgbox_r, .bgbox_c {
    height: 65px;
}
.bgbox_l, .bgbox_r {
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
}
.bgbox_l {
    background-image: url("http://www.diadiem.com/theme/images/header_bg_box.png");
    
    width: 43px;
}
.bgbox_r {
    background-image: url("http://www.diadiem.com/theme/images/repeat_bg_box.png");
    right: 0;
    width: 8px;
}
.bgbox_c {
    background-image: url("http://www.diadiem.com/theme/images/repeat_bg_box.png");
    margin: 0 8px 0 0px;
}


.fpoint {
}
.fpoint .bgbox_l, .fpoint .bgbox_r {
    background-position: 0 0;
}
.fpoint .bgbox_c {
    background-position: 0 -80px;
}
.fway {
}
.fway .bgbox_l, .fway .bgbox_r {
    background-position: 0 0;
}
.fway .bgbox_c {
    background-position: 0 -80px;
}
.fdirect {
}
.fdirect .bgbox_l {
    background-position: 0 -80px;
}
.fdirect .bgbox_r {
    background-position: 0 -160px;
}
.fdirect .bgbox_c {
    background-position: 0 -240px;
}
.bg_fpoint {
    float: left;
    height: 33px;
    position: relative;
}
.curve_box {
    position: absolute;
    right: 0;
    top: 38px;
    width: 446px;
}
.curve_box_l, .curve_box_r {
    height: 36px;
}
.curve_box_l {
    background: url("http://www.diadiem.com/theme/images/curve_bg_box.png") repeat scroll 0 0 transparent;
    left: 0;
    position: absolute;
    top: 0;
    width: 52px;
}
.curve_box_r {
    background-color: #CDCDCD;
    margin-left: 52px;
}
.tab_fbox {
    height: 24px;
    left: 328px;
    position: absolute;
    top: -4px;
    z-index: 6;
}
.tab_fbox li {
    float: left;
}
.tab_fbox a {
    background: url("http://www.diadiem.com/theme/images/tab_bg_box.png") repeat scroll 0 0 transparent;
    color: #FFFFFF;
    display: block;
    font-size: 12px;
    font-weight: 700;
    height: 14px;
    margin-left: -2px;
    padding: 8px 0 0 8px;
    width: 142px;
}
.tab_fbox a:hover {
    text-decoration: none;
}
.tab_fbox .active a {
    height: 17px;
}
.active .fpoint {
    background-position: -160px 0;
}
.active .fway {
    background-position: -160px 0;
}
.active .fdirect {
    background-position: -320px 0;
}
.bgbox_inner {
    clear: both;
    left: 202px;
    position: absolute;
    top: 24px;
    z-index: 2;
}
#divMaps, #divDirection {
    float: left;
}
#divMaps .fbox {
    width: 475px;
}
#divMaps .fbox_inner input {
    left: 11px;
    width: 438px;
}
#divMaps .fbox_inner label {
    left: 11px;
}
#divDirectory .fbox {
    width: 220px;
}
#divDirectory .fbox_inner input {
    width: 174px;
}
.fbox {
    float: left;
    position: relative;
    top: 2px;
    width: 235px;
}
.fbox_l, .fbox_r, .fbox_c {
    background-image: url("http://www.diadiem.com/theme/images/bg_fbox.gif");
    height: 30px;
}
.fbox_l {
    left: 0;
    position: absolute;
    top: 0;
    width: 11px;
}
.fbox_r {
    position: absolute;
    right: 0;
    top: 0;
    width: 11px;
}
.fbox_c {
    background-repeat: repeat;
    margin: 0 11px;
}
.fway .fbox_l {
    background-position: 0 -120px;
}
.fway .fbox_r {
    background-position: 0 -520px;
    cursor: pointer;
    width: 25px;
}
.fway .fbox_c {
    background-position: 0 -160px;
}
.fway .focus .fbox_l {
    background-position: 0 0;
}
.fway .focus .fbox_r {
    background-position: 0 -480px;
    cursor: pointer;
}
.fway .focus .fbox_c {
    background-position: 0 -40px;
}
.fpoint .fbox_l {
    background-position: 0 -120px;
}
.fpoint .fbox_r {
    background-position: 0 -520px;
    width: 25px;
}
.fpoint .fbox_c {
    background-position: 0 -160px;
}
.fpoint .focus .fbox_l {
    background-position: 0 0;
}
.fpoint .focus .fbox_r {
    background-position: 0 -480px;
    cursor: pointer;
}
.fpoint .focus .fbox_c {
    background-position: 0 -40px;
}
.transparent_6 input {
    visibility: hidden;
}
.transparent_6 label {
    display: none;
}
.fdirect .fbox_l {
    background-position: 0 -360px;
}
.fdirect .fbox_r {
    background-position: 0 -440px;
}
.fdirect .fbox_c {
    background-position: 0 -400px;
}
.fdirect .focus .fbox_l {
    background-position: 0 -240px;
}
.fdirect .focus .fbox_r {
    background-position: 0 -320px;
}
.fdirect .focus .fbox_c {
    background-position: 0 -280px;
}
.fway .fbox_inner input, .fpoint .fbox_inner input {
    width: 184px;
}
.fbox_inner input, .fbox_inner label {
    background-color: #FFFFFF;
    left: 21px;
    position: absolute;
    top: 6px;
}
.fbox_inner input {
    border: 0 none;
    color: #262D28;
    width: 198px;
}
.fbox_inner label {
    color: #CDCDCD;
    cursor: text;
}
.fdirect .icon_A, .fdirect .icon_B {
    background: none repeat scroll 0 0 transparent;
}

    </style>
  


  </head>
  <body >
  
  

<div class="page_tc ie6"></div>

<div class="page_cl ie6">
<div class="page_cr ie6">
<div id="page_inner" class="page_inner" style="padding-bottom: 481px;">
 
<div class="header">

<div class="header_inner">

<div class="tab_header">
<ul id="mbox_tab" class="tab_fbox">
<li class="active" dir="fpoint">
<a id="aTabMaps" class="fpoint ie6" href="javascript:void(0);">Địa Điểm</a>
</li>
<li class="" dir="fway">
<a id="aTabDirection" class="fway ie6" href="javascript:void(0);">Đường Đi</a>
</li>
<li class="" dir="fdirect">
<a id="aTabDirectory" class="fdirect ie6" href="javascript:void(0);">Tìm Công Ty</a>
</li>
</ul>
</div>
<div class="bgbox fpoint">
<div class="bgbox_l"></div>
<div class="bgbox_c"></div>
<div class="bgbox_r"></div>
<div id="divMapDirect" class="bgbox_inner">
<div id="divMaps">

</div>
<div id="divDirection" class="hide">


</div>

</div>

<div class="curve_box">
<div class="curve_box_l"></div>
<div class="curve_box_r"></div>
</div>

</div>
</div>
</div>

 </div>
 
 </div>
 </div>
    
  </body>
</html>

