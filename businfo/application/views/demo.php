<html>
<head>
<!-- Global head start -->
    <!-- Meta data -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   
    <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?sensor=false">
</script>
        
    <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/googlemap.js"></script>
    <script type="text/javascript">
    try {
    	$(document).ready(function(){initialize(10.75, 106.66, '196 Lê Văn Sỹ, P. Tân Định, Q. Phú Nhuận', '', false);});
    } catch (e) {
        alert (e.message);	//this executes if jQuery isn't loaded
    }
          
    </script>
</head>
<body>
<div id="mm-map" style="width: 550px; height: 450px">
This is map
</div>
</body>