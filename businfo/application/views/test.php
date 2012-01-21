<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Map testing</title>
		<link rel="stylesheet" href="<?php echo base_url() ?>public/css/css.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<script type="text/javascript" src="http://www.google.com/jsapi?key={APIKEY}"></script>
		<script type="text/javascript">
			google.load("jquery", "1.4.2");	  
		</script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="<?php echo base_url() ?>public/js/OfficeLocation.js" type="text/javascript" charset="utf-8"></script>
		
	</head>
	<body>
		
		<div id="home-wrapper">
			<div id="logo">
				<a href="http://www.webraptor.eu" target="_self"><img src="logo.jpg" width="245" height="40" alt="WebRaptor" /></a>
			</div>
			<div id="home-messages">
				Trying to determine your location...Please allow browser to share location if prompted
			</div>
			<span class="clear">&nbsp;</span>
			<div id="home-sidebar">
				<h1>Our offices locations</h1>
				<ul>
					<li><a href="#" rel="40.453577,-3.68763, 
					<strong>Venue: </strong>Estadio Santiago Bernabeu<br />
					<strong>Address: </strong>Avenida de Concha Espina; No 1; 28036; Madrid<br />
					<strong>Phone: </strong>+34 (91) 398 4300<br />
					<strong>Fax: </strong>+34 (91) 344 0695<br />
					<strong>Email: </strong><a href='mailto:realmadrid@club.realmadrid.com'>realmadrid@club.realmadrid.com</a><br />
					" target="_self">Estadio Santiago Bernabeu</a></li>
					<li><a href="#" rel="41.934115,12.45575, 
					<strong>Venue: </strong>Stadio Olimpico<br />
					<strong>Address: </strong><br />
					<strong>Phone: </strong><br />
					<strong>Fax: </strong><br />
					<strong>Email: </strong><a href='mailto:'></a><br />
					" target="_self">Stadio Olimpico - Rome</a></li>
					<li><a href="#" rel="55.71575,37.554574, 
					<strong>Venue: </strong>Luzhniki Stadium<br />
					<strong>Address: </strong><br />
					<strong>Phone: </strong><br />
					<strong>Fax: </strong><br />
					<strong>Email: </strong><a href='mailto:'></a><br />
					" target="_self">Luzhniki Stadium</a></li>
					<li><a href="#" rel="38.035991,23.788662,
					<strong>Venue: </strong>Olympic Stadium - Athens<br />
					<strong>Address: </strong><br />
					<strong>Phone: </strong><br />
					<strong>Fax: </strong><br />
					<strong>Email: </strong><a href='mailto:'></a><br />
					" target="_self">Olympic Stadium - Athens</a></li>
					<li><a href="#" rel="48.924191,2.359529,
					<strong>Venue: </strong>Stade de France<br />
					<strong>Address: </strong><br />
					<strong>Phone: </strong><br />
					<strong>Fax: </strong><br />
					<strong>Email: </strong><a href='mailto:'></a><br />
					" target="_self">Stade de France</a></li>
				</ul>
			</div>
			
			<div id="map-wrapper">
				<div id="map">

				</div>	
			</div>
		</div>
		
	</body>
</html>