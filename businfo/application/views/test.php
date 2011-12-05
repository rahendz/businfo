<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content=""/>
<title></title>
<link rel="stylesheet" href="css/global.css" type="text/css" />


<script type="text/javascript"><!--
var mps = ['l', '1', 'i', 'j'];var lcs= new Array();function add(f){var ln = f.poi.value;if(lcs.length >=5){alert('Please limit the search to 5 business names');return;}for(var i=0; i< lcs.length; i++){if(lcs[i]==ln) return;}lcs.push(ln);f.poi.value='';f.poi.focus();rndr();}function rmv(i){if(i!=null){lcs.splice(i,1);rndr();}}function rndr(){var txt='';for(var i=0; i < lcs.length; i++){txt = txt + '<div class="eloc"><a title="delete" href="/" onclick="rmv('+i+');return false;">[X]</a>&nbsp;&nbsp;'+lcs[i]+'</div>';}if(txt=='') txt = '<i>-None-</i>';document.getElementById('locsDiv').innerHTML = txt;}function mapit(f){f.action = 'http://localhost/BusInfo/application/views/testdemo.php';if(lcs.length>0){f.strs.value = JSON.stringify(lcs);f.submit();}else{alert('oops ! we found no business location or name. Please specify atleast one businees name to search');return false;}return true;}
</script>
</head>
<body>

<center>
<br/>

<div style="border:1px solid #cccccc;width:750px;padding: 10px 5px 10px 5px;">
	<br/>
	<form id="locsFrm" onsubmit="add(this);return false;">
	<table width="500">
		<tr>
		<td align="left"><input type="text" name="poi" value="" style="width:200px;"/><input type="submit" value="Add Business Name"/>
		<br/><a href="/" style="font-size:9px" onclick="window.open('http://maps.google.com/maps?f=l&q='+document.getElementById('locsFrm').poi.value); return false;" >[ Verify Name With Google Maps ]</a>
		<span style="font-size:9px">(Example: KFC, UPS Store, Walmart, Restaurant)</span>
		</td>
		</tr>
		<tr><td align="left">
		<b>Businesses to search</b>
		<div id="locsDiv">
			<i>-None-</i>
		</div>
		<br/>
		</td></tr>
	</table>
	</form>
	<form id="map" action="" method="post" onsubmit="mapit(this);return false;" target="_blank">
	<table>
		<tr>
			<td align="right" nowrap="nowrap">Start Address:</td>
			<td align="left"><input style="width:300px;" type="text" value="" name="strt" /></td>
		</tr>
		<tr>
			<td align="right" nowrap="nowrap">End Address:</td>
			<td align="left"><input style="width:300px;" type="text" value="" name="end" /></td>
		</tr>
		<tr>
			<td valign="top" align="right">Search With in </td>
			<td align="left">
				<select name="rad">
				<option value="3218.688" selected="selected">2 miles</option>
				<option value="4828.032">3 miles</option>
				<option value="6437.375">4 miles</option>
				<option value="8046.720">5 miles</option>
				<option value="9656.065">6 miles</option>
				<option value="11265.408">7 miles</option>
				</select>
				<span style="font-size:9px">(Only Businesses within the specified radius will be displayed. Others will be ignored)</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Map it">

			</td>
		</tr>
		<tr>
			<td colspan="2"><br/><br/>
			</td>
		</tr>
	</table>
	<input type="hidden" name="strs" value="" />
	</form>
</div>
</body>
</html>