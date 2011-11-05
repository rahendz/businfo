<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="BusInfo For HCM City" name="keywords">
	<title>Đăng Nhập</title>

	<link type="text/css" rel="stylesheet" href="http://localhost/BusInfo/businfo/public/css/MainStyle.css" media="all" />
	<link type="text/css" rel="stylesheet" href="http://localhost/BusInfo/businfo/public/css/Login.css" media="all" />
	
	<script type="text/javascript" src="http://localhost/BusInfo/businfo/public/js/googlemap.js"></script>
	<script src="http://localhost/BusInfo/businfo/public/js/jquery00.js" type="text/javascript"></script>
    <script src="http://localhost/BusInfo/businfo/public/js/jquery01.js" type="text/javascript"></script>
    <script src="demo_files/markerma.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://localhost/BusInfo/businfo/public/js/jquery-1.js"></script>
    <script type="text/javascript" src="http://localhost/BusInfo/businfo/public/js/TabMenu.js"></script>
    <script src="http://maps.google.com/maps?indexing=false&amp;file=api&amp;v=2&amp;indexing=false&amp;key=ABQIAAAA0HPcSVWJKlo5kHbW_wY_zBRDVj_Q1DBcSaFa2U8I4KZQmgQPfRSW9G2WwDzuXZvqgS8WskdXWEpd6g" type="text/javascript"></script>
	<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;indexing=false&amp;key=ABQIAAAA0HPcSVWJKlo5kHbW_wY_zBRDVj_Q1DBcSaFa2U8I4KZQmgQPfRSW9G2WwDzuXZvqgS8WskdXWEpd6g" type="text/javascript"></script>
		
	
		    

    
    <script type="text/javascript"> 
          $(document).ready(function(){initialize(10.75, 106.65, "User's location", "search", true);});
    </script>
</head>

<body id="page-login" onload="document.forms.loginForm.username.focus();">
	<div id="WrapperClick" onclick="WrapperClick()">
		<div id="header_wrap" style="height: 50px;">
			<!--Logo-->
            <div id="logo">
                <a class="logo-old" href=""></a>
            </div>
            <!--End logo-->
            <!-- Tab Header -->
            <div id="header" >
           		<!--  Tab Top menu -->
				<ul id="nav">
					<li class="navitem nav-first"><a id="nmap" href="">Bản Đồ</a></li>
					<li class="navitem"><a id="napi" href="">Liên Kết</a>
						<ul class="submenu1" style="width:135px">
							<li style="padding-top:4px" class="noLava topradius"><a href="">Sở GTCC TpHCM</a></li>
							<li class="noLava"><a href="">Buýt TpHCM</a></li>
							<li style="padding-bottom:4px" class="noLava botradius"><a href="">Bến Xe</a></li>
						</ul>
					</li>
					<li class="navitem"><a id="nmob" href="">Giới Thiệu</a></li>
					<li id="HelpMenu" class="navitem"><a id="nhelp" target="_blank" href="">Hướng Dẫn Sử Dụng</a>
						<ul class="submenu2" style="width:150px">
							<li style="padding-top:4px" class="noLava topradius"><a target="_blank" href="">Tìm Tuyến Bus</a></li>
							<li class="noLava"><a target="_blank" href="">Tìm Vị Trí</a></li>
							<li class="noLava"><a href="">Tìm Lộ Trình</a></li>
							<li class="noLava"><a target="_blank" href="">Tìm Dịch Vụ</a></li>
							<li style="padding-bottom:4px" class="noLava botradius"><a href="">Chức Năng Khác</a></li>
						</ul>
					</li>
					<li class="navitem"><a id="ncont" href="">Liên hệ</a></li>
				</ul>
				
				<!--  End Tab Top menu -->
			</div>
			
			<!--  End Tab Header -->
	         <div id="login">
				<div id="line2">
					<a id="Signup" class="line2reg" href="">Đăng ký</a>|
					<a id="Login" class="line2login" href="http://localhost/BusInfo/businfo/application/views/login.php">Đăng nhập</a>
				</div>
			</div>
        </div>
        
         <div id="content_wrap" >
         	<div class="login-container">
        <div class="login-box">
            <form method="post" action="" id="loginForm">
                <div class="login-form">
                    <input name="form_key" type="hidden" value="7Lt8lprdGPbmkpc7" />
                    <h2>Đăng nhập vào trang quản lý</h2>

                    <div id="messages">
                                            </div>
                    <div class="input-box input-left"><label for="username">Tài khoản (admin):</label><br/>
                        <input type="text" id="username" name="login[username]" value="" class="required-entry input-text" /></div>
                    <div class="input-box input-right"><label for="login">Mật khẩu (123123):</label><br />
                        <input type="password" id="pass" name="login[password]" class="required-entry input-text" value="" /></div>
                         
                    <div class="clear"></div>
                    <div class="form-buttons">
                        <a class="left" href="">Quên mật khẩu?</a>
                        <!-- <input type="submit" class="form-button" value="Login" title="Login" onClick="parent.location='http://localhost/businfo/businfo/'">
                        -->
                        <input type=button class="form-button" onClick="parent.location='../views/admin/ad_home.php'" value='Đăng nhập'>
                    </div>
                </div>
            </form>
            <div class="bottom"></div>
            <script type="text/javascript">
                 var loginForm = new varienForm('loginForm');
            </script>

        </div>
    </div>
		
		</div>
	</div>
</body>
</html>
