<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="../css/global.css" type="text/css" />
<title>ScreeperZone - Local Google Map Search</title>
<script src=" http://maps.google.com/?file=api&amp;v=2.x&amp;key=ABQIAAAA_21lAQ7jMVUrNsus5qQCThRIoF3JGbgirUGbxOUAcCv--2Sp2hTqiBINXFbVxw7M6ZIFH8oYdlFMYA" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=ABQIAAAA_21lAQ7jMVUrNsus5qQCThRIoF3JGbgirUGbxOUAcCv--2Sp2hTqiBINXFbVxw7M6ZIFH8oYdlFMYA" type="text/javascript"></script>
<!--  <script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script>
<script src="http://screeperzone.googlecode.com/files/json.js" type="text/javascript"></script>
-->
</head>
<body onload="load()" onunload="GUnload()">

	<style type="text/css">
		v\:* {
		behavior:url(#default#VML);
		}
		img {
		color: #000000;
		}
		@media print {
		}
		.SZdir{
			font-size: 14px;
			font-family: "Lucida Grande", Arial, "Trebuchet MS", Verdana, sans-serif;
			line-height: 1.5em;
			background: #fff;
			color: #454545;
		}
		.SZhead{
			background-color:#e8eef7;
			padding: 2px 5px 2px 5px;
		}
	</style>
	<script type="text/javascript">function _ow(){var cw = open("", "_log_");if(!cw.opener) cw.opener = self;}</script>
	<script type="text/javascript">
	var _strs = null, _strt=null, _end = null, _rad = 3218.688;
	function _SZinit_(){
		try{
			
			_strs = JSON.parse('["KFC"]');
			
			_strt = 'University of information technology HCM';
			
			_end = 'Ho Chi Minh City';
			
			_rad = 3218.688;
			
		}catch(e){
			_strs = null; _strt=null; _end = null;
		}
	}
	_SZinit_();
	</script>
	<script type="text/javascript">
	var _mapz;
	var _dirz;
	var _wpts=new Array();
	var _fwpts=new Array();
	var _totD=0;var _srchPt;
	var _fnd="";
	var _dsmL="";
	var _dne=false;
	var _gLs;var _poistr;
	var _cache;var _fm;

	function trim(s){
		if(s){return s.replace(/^\s+|\s+$/,"");}
		else{return null;}
	}
	function Cache(){
		this.id;this.results=new Array();
	}
	function CacheS(){
		this.caches=new Array();
	}

	CacheS.prototype.get=function(_2){
		for(var i=0;i<this.caches.length;i++)
		{
			if(this.caches[i].id==_2)
			{
				return this.caches[i];
			}
		}
		return null;
	};
	CacheS.prototype.clrAndUpdate=function(_4,_5){
		var _6=this.get(_4);
		if(_6)
		{
			_6.results.splice(0,_6.results.length);
			_6.results=null;_6.results=_5;
		}
		else
		{
			_6=new Cache();
			_6.id=_4;
			_6.results=_5;
			this.caches.push(_6);
		}
	};
	function Poi(){
		this.glatLong;
		this.result;
		this.dist;
		this.id;
		this.marker;
	}
	Poi.prototype.gDomNode=function(){
		if(this.result)
		{
			var _7=document.createElement("div");
			_7.appendChild(this.result.html.cloneNode(true));
			return _7;
		}
		else
		{
			return "<b><i>No Results</i></b>";
		}
	};
	function PoiS(){
		this.pois=new Array();
	}
	PoiS.prototype.add=function(_8,_9){
		if(_9==null)
		{
			this.pois.push(_8);
		}
		else
		{
			this.pois.splice(_9,0,_8);
		}
	};
	PoiS.prototype.get=function(_a){
		for(var i=0;i<this.pois.length;i++)
		{
			if(this.pois[i].id==_a)
			{
				return this.pois[i];
			}
		}
		return null;
	};
	PoiS.prototype.rmv=function(_c){
		for(var i=0;i<this.pois.length;i++)
		{
			if(this.pois[i].id==_c)
			{
				var _e=this.pois.splice(i,1);
				_fm.push(_e[0]);return i;
			}
		}
	};
	PoiS.prototype.dist=function(_f){
		var poi=this.get(_f);
		if(poi)
		{
			return poi.dist;
		}
	};
	PoiS.prototype.repl=function(poi){
		this.rmv(poi.id);
		this.add(poi);
	};
	function mark(){
		var n=_dirz.getNumGeocodes();
		var _13="";
		if(n)
		{
			var m;
			for(var i=1;i<n-1;i++)
			{
				m=_dirz.getMarker(i);
				if(m)
				{
					m.hide();
				}
			}
			if(_poistr&&_poistr.pois.length>0)
			{
				_13=_13+"http://maps.google.com/maps?f=d&hl=en&ll="+_poistr.pois[0].glatLong.lat()+","+_poistr.pois[0].glatLong.lng()+"&saddr="+_strt+"&daddr=";
				var poi;
				var _17;
				for(var i=0;i<_poistr.pois.length;i++)
				{
					poi=_poistr.pois[i];
					_17=new GMarker(poi.glatLong,null);
					_13=_13+_poistr.pois[i].glatLong.lat()+","+_poistr.pois[i].glatLong.lng()+"+to:";
					poi.marker=_17;
					GEvent.bind(poi.marker,"click",poi,function()
					{
						this.marker.openInfoWindow(this.gDomNode());
					});
					_mapz.addOverlay(_17);
				}
				_13=_13+_end+"&ie=UTF8&z=6&om=1";
				for(var j=0;j<_fm.length;j++)
				{
					poi=_fm[j];
					_17=new GMarker(poi.glatLong,G_DEFAULT_ICON);
					poi.marker=_17;
					GEvent.bind(poi.marker,"click",poi,function()
					{
						this.marker.openInfoWindow(this.gDomNode());
					});
					_mapz.addOverlay(_17);
				}
			}
		}
		document.getElementById("status").innerHTML="Preparing directions";
		n=_dirz.getNumRoutes();
		if(n)
		{
			var d=document.getElementById("content");
			var _1a=null;
			var r;
			for(var i=0;i<n;i++)
			{
				r=_dirz.getRoute(i);
				if(r&&_poistr)
				{
					if(i==0)
					{
						_1a="Start<br/>"+(n>0?_strt+" to "+_poistr.pois[0].result.title:_strt);
					}
					else
					{
						if(i==n-1)
						{
							_1a="End<br/>"+_poistr.pois[i-1].result.title+" to "+_end;
						}
						else
						{
							_1a=_poistr.pois[i-1].result.title+" to "+_poistr.pois[i].result.title;
						}
					}
					d.innerHTML=d.innerHTML+"<br/><hr/><div class=\"SZhead\"><b>"+_1a+"</b><br/>"+r.getSummaryHtml()+"</div>";
					var ns=r.getNumSteps();
					for(var k=0;k<ns;k++)
					{
						var s=r.getStep(k);
						if(s)
						{
							d.innerHTML=d.innerHTML+"<br/>- "+s.getDescriptionHtml();
						}
					}
				}
				else
				{
					d.innerHTML=d.innerHTML+"<br/><hr/><div class=\"SZhead\"><b>"+_strt+" to "+_end+"</b><br/>"+r.getSummaryHtml()+"</div>";
					var ns=r.getNumSteps();
					for(var k=0;k<ns;k++)
					{
						var s=r.getStep(k);
						if(s){d.innerHTML=d.innerHTML+"<br/>- "+s.getDescriptionHtml();
					}
				}
				_13=_13+"http://maps.google.com/maps?f=d&hl=en&saddr="+_strt+"&daddr="+_end;
			}
		}
		
		}
		document.getElementById("loading").style.display="none";
	}
	function load(){
		if(GBrowserIsCompatible())
		{
			if(!_strt||!_end||!_strs)
			{
				alert("Some required parameters are missing !");
				return;
			}
			_dirz=new GDirections(null,null);
			GEvent.addListener(_dirz,"load",oDL);
			GEvent.addListener(_dirz,"error",hErr);
			setDir(_strt,_end);
		}
	}
	function setDir(_1f,_20){
		_dirz.loadFromWaypoints([_1f,_20],{getPolyline:true});
	}
	function gDist(_21){
		var _22=0;
		for(var i=1;i<_21.getVertexCount();i++)
		{
			_22+=_21.getVertex(i).distanceFrom(_21.getVertex(i-1));
		}
		return _22;
	}
	function pAtDist(_24,_25){
		if(_25==0)
		{
			return _24.getVertex(0);
		}
		if(_25<0)
		{
			return null;
		}
		var _26=0;
		var _27=0;
		for(var i=1;(i<_24.getVertexCount()&&_26<_25);i++)
		{
			_27=_26;
			_26+=this.getVertex(i).distanceFrom(this.getVertex(i-1));
		}
		if(_26<_25)
		{
			return null;
		}
		var _29=_24.getVertex(i-2);
		var _2a=_24.getVertex(i-1);
		var _2b=(_25-_27)/(_26-_27);
		return new GLatLng(_29.lat()+(_2a.lat()-_29.lat())*_2b,_29.lng()+(_2a.lng()-_29.lng())*_2b);
	}
	function oDL(){
		document.getElementById("loading").style.display="";
		var _2c=_dirz.getPolyline();
		_totD=gDist(_2c);gWpt(_2c);
		if(_strs.length>0)
		{
			_poistr=new PoiS();
			_cache=new CacheS();
			_fm=new Array();
			_gLs=new GlocalSearch();
			_gLs.setCenterPoint(_wpts[0]);
			_srchPt=10+Math.floor(_rad/1609.34399);
			sLoc(0,0);
		}
		else
		{
			_dne=true;mAp();
		}
	}
	function mAp(){
		if(_dne)
		{
			_fwpts[0]=_wpts[0];
			if(_poistr&&_poistr.pois.length>0)
			{
				for(var i=0;i<_poistr.pois.length;i++)
				{
					_fwpts.push(_poistr.pois[i].glatLong);
				}
			}
			_fwpts[_fwpts.length]=_wpts[_wpts.length-1];
			_mapz=new GMap2(document.getElementById("map"));
			_mapz.addControl(new GSmallMapControl());
			_mapz.clearOverlays();
			if(_dirz)
			{
				_dirz.clear();
				_dirz=null;
			}
			_dirz=new GDirections(_mapz,null);
			_dirz.loadFromWaypoints(_fwpts,{getSteps:true});
			GEvent.addListener(_dirz,"addoverlay",mark);
			GEvent.addListener(_dirz,"error",hErr);
		}
	}
	function gWpt(_2e){
		var _2f=_totD;
		var _30=2414.01611;
		if(_30>=_2f)
		{
			_30=_2f;
		}
		if(_30==0)
		{
			_30=1;
		}
		var _31=0;
		var _32=0;
		var _33=0;
		var _34=0;
		var j=1;
		while(_31<=_2f)
		{
			if(_31==0)
			{
				_wpts[_wpts.length]=_2e.getVertex(0);
				_31=_31+_30;
				continue;
			}
			if(_31>0)
			{
				for(;(j<_2e.getVertexCount()&&_32<_31);j++)
				{
					_33=_32;
					_32+=_2e.getVertex(j).distanceFrom(_2e.getVertex(j-1));
				}
				if(j>=_2e.getVertexCount())
				{
					_wpts[_wpts.length]=_2e.getVertex(_2e.getVertexCount()-1);
					return;
				}
				else
				{
					var _36=_2e.getVertex(j-2);
					var _37=_2e.getVertex(j-1);
					var _38=(_31-_33)/(_32-_33);
					_wpts[_wpts.length]=new GLatLng(_36.lat()+(_37.lat()-_36.lat())*_38,_36.lng()+(_37.lng()-_36.lng())*_38);
				}
			}
			_34++;
			if(_34>80)
			{
				_30=(_2f-_31)/3;_34=0;
			}
			_31=_31+_30;
		}
		if(j<_2e.getVertexCount())
		{
			_wpts[_wpts.length]=_2e.getVertex(_2e.getVertexCount()-1);
		}
	}
	function sLoc(_39,_3a){
		if(_dne)
		{
			return;
		}
		var _3b=false;
		if(_39<_wpts.length&&_3a<_strs.length)
		{
			if(_dsmL.indexOf("|"+_3a+"|")<0)
			{
				if(_39%_srchPt==0)
				{
					_gLs.setSearchCompleteCallback(null,oRes,[_gLs,_39,_3a]);
					_gLs.setResultSetSize(GSearch.LARGE_RESULTSET);
					_gLs.execute(_strs[_3a]);
					_3b=true;
					document.getElementById("status").innerHTML="Querying Google for <b>"+_strs[_3a]+"</b>";
				}
				else
				{
					var _3c=_cache.get(_3a);
					if(_3c)
					{
						pRes(_3c.results,_39,_3a);
					}
				}
			}
			else
			{
				document.getElementById("status").innerHTML="We found <b>"+_strs[_3a]+"</b>. Looking for best path.";
			}	
		}
		_3a++;
		if(_3a>=_strs.length)
		{
			_3a=0;_39++;
			if(_39<_wpts.length)
			{
				_gLs.setCenterPoint(_wpts[_39]);
			}
			else
			{
				if(!_dne&&!_3b)
				{
					_dne=true;
					mAp();
				}
				return;
			}
		}
		if(_3b||_39%_srchPt==0)
		{
			setTimeout("sLoc("+_39+", "+_3a+");",1900);
		}
		else
		{
			setTimeout("sLoc("+_39+", "+_3a+");",5);
		}
	}
	function getFnd(){
		return _fnd;
	}
	function pRes(_3d,_3e,_3f){
		var _40,_41,_42,_43,_44;
		for(var k=0;k<_3d.length;k++)
		{
			_40=_3d[k].lat;
			_41=_3d[k].lng;
			_42=new GLatLng(parseFloat(_40),parseFloat(_41));
			_43=_42.distanceFrom(_wpts[_3e]);
			document.getElementById("status").innerHTML="Analysing results for <b>"+_strs[_3f]+"</b>";
			if(_43<=_rad)
			{
				if(getFnd().indexOf("|"+_3f+"|")<0)
				{
					_44=new Poi();
					_44.glatLong=_42;_44.result=_3d[k];_44.dist=_43;
					_44.id=_3f;_poistr.add(_44);_fnd=_fnd+"|"+_3f+"|";
					dsmL(_3f,_43);}else{_44=new Poi();
					_44.glatLong=_42;_44.result=_3d[k];
					_44.dist=_43;
					var _46=_poistr.dist(_3f);
					if(_46>_43)
					{
						_44.id=_3f;_poistr.repl(_44);
						dsmL(_3f,_43);
					}
					else
					{
						_fm.push(_44);
					}
				}
			}
		}
	}
	function oRes(_47,_48,_49){
		if(_47.results)
		{
			_cache.clrAndUpdate(_49,_47.results);
			pRes(_47.results,_48,_49);
		}
		if(_48>=_wpts.length-1)
		{
			if(!_dne)
			{
				_dne=true;
				mAp();
			}
		}
	}
	function dsmL(_4a,_4b){
		if(_4b<2414.01611)
		{
			_dsmL=_dsmL+"|"+_4a+"|";
		}
	}
	function hErr(){
		if(_dirz.getStatus().code==G_GEO_UNKNOWN_ADDRESS)
		{
			alert("No corresponding geographic location could be found for one of the specified addresses. This may be due to the fact that the address is relatively new, or it may be incorrect.\nError code: "+_dirz.getStatus().code);
		}
		else
		{
			if(_dirz.getStatus().code==G_GEO_SERVER_ERROR)
			{
				alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.\n Error code: "+_dirz.getStatus().code);
			}
			else
			{
				if(_dirz.getStatus().code==G_GEO_MISSING_QUERY)
				{
					alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: "+_dirz.getStatus().code);
				}
				else
				{
					if(_dirz.getStatus().code==G_GEO_BAD_KEY)
					{
						alert("The given key is either invalid or does not match the domain for which it was given. \n Error code: "+_dirz.getStatus().code);
					}
					else
					{
						if(_dirz.getStatus().code==G_GEO_BAD_REQUEST)
						{
							alert("A directions request could not be successfully parsed.\n Error code: "+_dirz.getStatus().code);
						}
						else
						{
							alert("An unknown error occurred.");
						}
					}
				}
			}
		}
	}
</script>



<div id="loading" style="display:none;">
    	<center>
    	<img src="http://www.screeperzone.com/static/loading.gif" /><b>Loading..<blink>..</blink></b><br/>

    	<div id="status"></div>
    	</center>
    </div>
    <table>
    <tr>
    <td valign="top"><div id="map" style="width: 750px; height: 590px"></div></td>
    </tr>
    </table>
  
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><br/>
    
    <table>
    <tr>
	<td valign="top"><div id="content" class="SZdir" style="width: 750px"></div></td>
    </tr>
    </table>

    <br/>
	<br/>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2285895-2";
urchinTracker('todolist/map');
</script>
</body>
</html>