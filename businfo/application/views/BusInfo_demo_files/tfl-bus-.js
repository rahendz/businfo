var busMapApplication = function () {
	function e(a) { Jb && GLog.write(a) } 
	
	function M(a) { a = a.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]"); a = RegExp("[\\?&]" + a + "=([^&#]*)").exec(window.location.href); 
	return a === null ? "" : decodeURIComponent(a[1]) } 
	
	function cb() { N != null && (h.addOverlay(N), GEvent.addListener(N, "click", function () { N.openInfoWindowHtml(db) })) } function z(a) { $("#" + j + "show-all-routes").hide(); 
	switch (a) { 
	case "active": H || (O = !0); break; 
	case "inactive": O = !1; break; 
	case "hidden": break; 
	default: O = !1 } } 
	
	function Fa(a) {
		(w =
a) ? ($(".IsDay_0").hide(), $(".IsDay_1").show(), $("#img_buttom_day").addClass("dN_day_active"), $("#img_buttom_night").addClass("dN_night"), $("#busesLeftCol_Routes").removeClass("night")) : ($(".IsDay_1").hide(), $(".IsDay_0").show(), $("#img_buttom_day").addClass("dN_day"), $("#img_buttom_night").addClass("dN_night_active"), $("#busesLeftCol_Routes").addClass("night"))
	} 
	
	function P(a) {
		try {
			e("f action_SwitchDayNight :: IsDay = " + a); A(); Fa(a); Ga(); Q({ showHide: !1, HideAll: !0 }); try { eb(f[0].Id) } catch (b) { e("ERROR - f ScrollToTop") } $("." +
B).removeClass(B).removeClass(ba); $("." + C).removeClass(C); $(".mm-bus-routes-item-SwapRun").removeClass("active"); g = null; O && z("inactive"); $("." + C).removeClass(C); w = a; 
		switch (I) { 
		case "SingleLine": $.each(f, function (b, c) { if (c.IsDay == a) 
		return fb ? (e("@1"), ra(c.Route), e("@1.1")) : fb = !0, !1 }) } H && (z("hidden"), $.each(f, function (b, c) { c.IsDay == a && $(".trigger_show-all-stops-link_" + c.Id).trigger("click") }))
		} catch (c) { e("3: " + c), e("ERROR - f action_SwitchDayNight") } 
	} 
	
	function o() { $("#" + j + "LHP-loading").hide(); $(".LoadingData").hide() }
	
	
	function gb() { $("#" + j + "LHP-ServerErrorMsg").hide(); $("#" + j + "LHP-content").hide(); $("#" + j + "LHP-NoResults").hide(); $("#busesLeftCol_inner").hide(); $("#busesLeftCol_inner").hide(); z("hidden"); $("#busesLeftCol_Routes").removeClass("night"); k.setMapSize(k.MapSizeSmall); k.ResizeMap(); R.html("") } function sa() { $("#" + j + "PopUpBoxMsg").fadeOut("fast") } function Kb() {
		$("#" + j + "WorkingMsg").ajaxStart(function () { e("AJAX START"); J = !1; $(this).show(); hb = setTimeout(function () { J = !0; $(this).hide() }, 1E4) }); $("#" + j + "WorkingMsg").ajaxStop(function () {
			e("AJAX stop");
			J = !0; $(this).hide(); clearTimeout(hb)
		})
	} 
	
	function ib() { 
	try { $.each(f, function (a, c) { c.oPolyline_1 !== null && h.removeOverlay(c.oPolyline_1); c.oPolyline_2 !== null && h.removeOverlay(c.oPolyline_2) }) } 
	catch (a) { e("ERROR - f removePolyLineAll") } } 
	
	function jb() {
		J = !0; ta || ($(".overlay").hide(), h.enableContinuousZoom(), h.enableDoubleClickZoom(), h.enableScrollWheelZoom(), h.addControl(new GLargeMapControl3D), h.addControl(new GMenuMapTypeControl), $("#busesRightCol_TopSearchBar").fadeIn("fast"), ta = !0, $("#busesHolder").css("padding",
"0")); $("#overlayMsg").hide(); gb(); ca = S = T = 0; N = null; $("#img_buttom_night").show(); $("#img_buttom_day").show(); ua = w; h.enableDragging(); h.removeOverlay(va); $.each(f, function (a, b) { if (null != b.endPoint.div) b.endPoint.div.id = "RemoveStartEnd"; $("#RemoveStartEnd").remove(); if (null != b.startPoint.div) b.startPoint.div.id = "RemoveStartEnd2"; $("#RemoveStartEnd2").remove() }); Ga(); Ha = null; D = new GLatLngBounds; da = !1; sa(); ea = ""; Fa(1); H = !1; f = []; l = []; p = []; Ia = []; U = 0; fa = 1; Ja = []; ga = ha = ""; searchWas_RouteOnly_FirstOpen = !0;
		$("#" + j + "LHP-ValidationErrorMsg").hide(); $("#SearchResultsTextHTML").empty(); $("#" + j + "search-result").empty(); z("active"); z("inactive")
	} 
	
	function Ka(a) { return a.replace(/Greater Hochiminh /, "").replace(/, Vietnam/, "").replace(/, Hochiminh/, "").replace(/, City of Hochiminh/, "").replace(/, Greater Hochiminh/, "").replace(/Piccadilly/, "Picadilly").replace(/piccadilly/, "picadilly").replace(/Flats to rent in Canary Wharf, Horseferry Rd, Westminster SW1P/, "Canary Wharf") } 
	
	function Lb(a) {
		var b = []; b.push(RegExp("^([abcdefghijklmnoprstuwyz]{1}[abcdefghklmnopqrstuvwxy]?[0-9]{1,2})(\\s*)([0-9]{1}[abdefghjlnpqrstuwxyz]{2})$",
"i")); b.push(/^([abcdefghijklmnoprstuwyz]{1}[0-9]{1}[abcdefghjkstuw]{1})(\s*)([0-9]{1}[abdefghjlnpqrstuwxyz]{2})$/i); b.push(RegExp("^([abcdefghijklmnoprstuwyz]{1}[abcdefghklmnopqrstuvwxy]?[0-9]{1}[abehmnprvwxy]{1})(\\s*)([0-9]{1}[abdefghjlnpqrstuwxyz]{2})$", "i")); b.push(/^(GIR)(\s*)(0AA)$/i); b.push(/^(bfpo)(\s*)([0-9]{1,4})$/i); b.push(/^(bfpo)(\s*)(c\/o\s*[0-9]{1,3})$/i); b.push(/^([A-Z]{4})(\s*)(1ZZ)$/i); for (var c = !1, d = 0; d < b.length; d++) if (b[d].test(a)) {
			b[d].exec(a); a = RegExp.$1.toUpperCase() + " " + RegExp.$3.toUpperCase();
			a = a.replace(/C\/O\s* /, "c/o "); c = !0; break
		} return c ? a.toUpperCase() : !1
	} 
	
	function Mb() { P(1) } 
	
	function Nb() { P(0) } 
	
	function Ob() {
		R = $("#" + j + "bus-routes-holder"); $("#SearchButton_Top").bind("click", function () { h.enableDragging(); if (La) return !1; else La = !0, gb(), Pb(), kb = setTimeout(function () { La = !1; clearTimeout(kb) }, 3E3) }); $("#searchbutton_overlay").bind("click", function () { $("#SearchBox_Top").val($("#SearchBox_Overlay").val()); $("#SearchButton_Top").trigger("click"); return !1 }); $("#SearchBox_Top").keypress(function (a) {
			if (a.which ==
13) return $("#SearchButton_Top").trigger("click"), !1
		}); $("#SearchBox_Overlay").keypress(function (a) { if (a.which == 13) return $("#SearchBox_Top").val($("#SearchBox_Overlay").val()), $("#SearchButton_Top").trigger("click"), !1 }); $("#" + j + "but_showLHP").bind("click", function () { k.setMapSize(k.MapSizeSmall); k.ResizeMap() }); $("#" + j + "but_hideLHP").bind("click", function () { k.setMapSize(k.MapSizeLarge); k.ResizeMap() }); $(window).resize(function () { k.ResizeMap() }); $("#" + j + "but_showLHP").hide(); GEvent.addListener(h,
"infowindowclose", function () { $(".stop-item-active").removeClass("stop-item-active"); x = null; $("#InfoWindowPrimary").empty(); null != g && Q({ showHide: !0 }); da = !0 }); $("#img_buttom_night").bind("click", Nb); $("#img_buttom_day").bind("click", Mb); GEvent.addListener(h.getInfoWindow(), "restoreend", function () { $("#planJourneyFromHere").html("") }); GEvent.addListener(h, "move", function () {
	e("f checkBounds"); var a = h.getBounds().toSpan(), b = a.lng() / 2, a = a.lat() / 2, c = h.getCenter(), d = c.lng(), c = c.lat(), f = new GLatLng(c - a, d - b),
g = new GLatLng(c + a, d + b); if (!K.containsLatLng(f) || !K.containsLatLng(g)) { var f = K.getNorthEast().lng(), g = K.getNorthEast().lat(), j = K.getSouthWest().lng(), E = K.getSouthWest().lat(); d < j + b && (d = j + b); d > f - b && (d = f - b); c < E + a && (c = E + a); c > g - a && (c = g - a); h.setCenter(new GLatLng(c, d)) } 
}); Qb()
	} 
	
	function xa(a, b) { return Math.round(a * Math.pow(10, b)) / Math.pow(10, b) } function Rb(a) {
		if (a.Routes) l = a.Routes; if (a.Stops) p = a.Stops; if (a.CoOrds) G = a.CoOrds; a = $("#SearchBox_Top").val(); $(".Nav_listPoint a").attr("href", "tfl-bus-map/text/?q=" +
a); if (l[0] == "" || l == "" || l.length <= Sb) e("SearchTryCount:" + V), V++, e("SearchTryCountsss:" + V), V <= 1 ? (J = !0, ia({ Lat: Ma, Lng: Na, ZoomOveride: "15", q: lb })) : (V = 0, u(Ma, Na)); else {
			e("DO THE PLOTTING OF THE SEARCH"); if (l[0].encodedLevels == "") { a = 16; if (G.Zoom != "") a = G.Zoom; h.setCenter(new GLatLng(G.Latitude, G.Longitude), a) } else q = mb(l[0].encodedPoints, l[0].encodedLevels, "#" + l[0].Color, "FullRoute", l[0].Route), h.addOverlay(q); Oa(l); l[0].encodedLevels != "" && (g = 0, z("inactive"), nb(q), ob(y), O = !0, ya(), a = h.getBounds(), MapBounds_OldSW =
a.getSouthWest().toUrlValue(), MapBounds_OldNE = a.getNorthEast().toUrlValue()); R.show(); $("#busesLeftCol_inner").show(); $("#" + j + "search-result").show(); setTimeout(function () { W() }, 2E3); o(); $("#" + j + "LHP-content").show(); switch (I) { case "SingleLine": e("! b"); e("@2"); a: { for (i = 0; i < f.length; i++) if (f[i].IsDay == 1) { a = f[i]; break a } a = void 0 } ra(a.Route); e("@2.1") } ua != w && (ua === 0 && S > 0 && P(0), ua === 1 && T > 0 && P(1))
		} 
	} 
	
	function X(a) {
		e("function aJackLoad"); if (typeof a.url === "string") url = a.url; e("url:" + url); $.ajax({ type: "GET",
			contentType: "application/json; charset=utf-8", url: url, dataType: "json", timeout: 2E4, tryCount: 0, data: {}, retryLimit: 3, success: function (b) { if (typeof a.CallFunction === "function") e("CALL FUNCTION"), a.CallFunction(b); else return b }, error: function (a, c) {
				c === "timeout" ? (e("TRY AGAIN"), this.tryCount++, this.tryCount <= this.retryLimit ? $.ajax(this) : ShowServerErrorMsg("Error loading data: code AJ2 ")) : a.status === 500 ? (e("Error " + a.status + " on " + url + " called from function aJackLoad"), ShowServerErrorMsg("Error loading data: code AJ3 ")) :
e("Error " + a.status + " on " + url + " called from function aJackLoad   2")
			} 
		})
	} 
	
	function ia(a) {
		jb(); e("function: userSearchServer"); var b = a.Lat, c = a.Lng, d = a.q, f = 16; if (typeof a.ZoomOveride === "string") f = a.ZoomOveride; if (b === "51.5001524" && c === "-0.1262362" && d.toUpperCase().indexOf("WESTMINSTER") == -1) u("", ""); else if (b === "51.5052437" && c == "-0.0188475" && d.toUpperCase().indexOf("CANADA") == -1) u("", ""); else {
			if (typeof a.qInput === "string") d = a.qInput; m = d; sa(); Ma = b; Na = c; lb = d; var h = ""; b !== null && (h = "&Lat=" + xa(b, 3) + "&Lng=" +
xa(c, 3), d = Ka(d), $("#" + j + "search-result").empty(), $("." + j + "inputTxt-SearchBox").val(d), $("#textVersionLink").attr("href", "tfl-bus-map/text/?q=" + d), g = null); typeof a.LHP === "object" ? L(a.LHP) : L({ Heading: "Showing routes near " + d }); a = d; e("f placeSearchLocationMarker"); var F = new GLatLng(b, c); db = "<strong>Location:</strong> " + a; N = new GMarker(F, { icon: Y }); e("CALL search.aspx"); X({ url: "tfl-bus-map/dotnet/Search.aspx?searchStr=" + d + "&width=" + $("#" + j + "map").width() + "&height=" + $("#" + j + "map").height() + "&zoom=" + f + h,
	CallFunction: Rb
}); try { e("lat:" + b); e("lng:" + c); if (b === "" || b === "") b = "51.515232", c = "-0.141792"; $("#yell_Iframe").attr("src", "http://adsyndication.yelldirect.com/synd/synd.aspx?ass=2030&url=www.tfl.gov.uk/busmap&tc=3497D5&dc=565656&lc=565656&styl=mrb&subid=maps&linknew=1&lat=" + b + "&long=" + c) } catch (E) { e("ERROR : F updateYellIFrame:" + E) } 
		} 
	} 
	
	function ja(a) {
		e("resetStartEndPoints - - - - -  - - - -CalledFrom:" + a); $.each(f, function (a, c) {
			if (c) {
				var d = h.fromLatLngToDivPixel(c.startPoint.latlng); d.x -= parseInt(za /
2, 10); var e = c.startPoint.div; e.style.top = d.y + "px"; e.style.left = d.x + "px"; d = h.fromLatLngToDivPixel(c.endPoint.latlng); d.x -= parseInt(za / 2, 10); e = c.endPoint.div; e.style.top = d.y + "px"; e.style.left = d.x + "px"
			} 
		})
	} 
	
	function Ga() { try { e("f: mm_clearOverlays"), h.clearOverlays(), ib(), cb(), n = null } catch (a) { e("ERROR - f mm_clearOverlays") } } function pb() { for (var a = h.getMapTypes(), b = 0; b < a.length; b++) a[b].getMinimumResolution = function () { return 10 }, a[b].getMaximumResolution = function () { return 20 } } function Tb() {
		e("function:makeMap");
		D = new GLatLngBounds; ka = new GClientGeocoder; K = new GLatLngBounds(new GLatLng(Pa - 0.3, Qa - 0.3), new GLatLng(Ra + 0.3, Sa + 0.3)); Z = new GIcon; Y = new GIcon; la = new GIcon; v = new google.search.LocalSearch; ka.setBaseCountryCode("Vietnam"); ka.setViewport(new GLatLngBounds(new GLatLng(Pa, Qa), new GLatLng(Ra, Sa))); var a = M("q"); if (a == "") { var b = M("r"); b != "" ? a = "route:" + b : (b = M("s"), b != "" && (a = "stop:" + b)) } h = new GMap2(document.getElementById(j + "map"), { mapTypes: [G_NORMAL_MAP, G_PHYSICAL_MAP, G_SATELLITE_MAP, G_HYBRID_MAP] }); h.setCenter(new GLatLng(10.7569353, 106.6686039), 13); (new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(151, 60))).apply(document.getElementById("overlayMsg")); h.getContainer().appendChild(document.getElementById("overlayMsg")); (new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(80, 5))).apply(document.getElementById(j + "WorkingMsg")); h.getContainer().appendChild(document.getElementById(j + "WorkingMsg")); (new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(80, 5))).apply(document.getElementById(j + "WorkingMsg2")); h.getContainer().appendChild(document.getElementById(j +
"WorkingMsg2")); b = new GTileLayer(new GCopyrightCollection, 0, 17); b.getTileUrl = function () { return "tfl-bus-map/img/white_map_tile.gif" }; b.getOpacity = function () { return 0.5 }; va = new GTileLayerOverlay(b); h.addOverlay(va); h.disablePinchToZoom(); GEvent.addListener(h, "maptypechanged", function () { pb() }); GEvent.addListener(h, "infowindowclose", function () { $(".NonMapInfoWindowHolder").empty() }); h.disableDragging(); pb(); Kb(); Ub(); GEvent.addListener(h, "moveend", function () { ja("moveend"); if (ta) r.style.visibility = "hidden" });
		R = $("#" + j + "bus-routes-holder"); k.setMapSize(k.MapSizeLarge); k.ResizeMap(); Vb(); Z.image = "tfl-bus-map/img/stop-1.png"; Z.iconSize = new GSize(32, 36); Z.iconAnchor = new GPoint(15, 36); Z.infoWindowAnchor = new GPoint(24, 12); Y.image = "tfl-bus-map/img/your_location-1.png"; Y.iconSize = new GSize(32, 38); Y.iconAnchor = new GPoint(15, 38); Y.infoWindowAnchor = new GPoint(15, 19); la.image = "tfl-bus-map/img/StreetViewIcon.png"; la.iconSize = new GSize(32, 32); la.iconAnchor = new GPoint(17, 17); la.infoWindowAnchor = new GPoint(24, 12); a !=
"" ? (e("==================================qString:" + a), $(".mm-inputTxt-SearchBox").val(a), setTimeout(function () { $("#SearchButton_Top").trigger("click") }, 1500)) : ((new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(0, 72))).apply(document.getElementById(j + "PopUpBoxMsg")), h.getContainer().appendChild(document.getElementById(j + "PopUpBoxMsg")), $("#overlayMsg").show(), $("#" + j + "PopUpBoxMsg_close").bind("click", function () { sa() }), $(".overlay").show(), $("#SearchBox_Overlay").focus())
	} 
	
	function qb(a) {
		var b = !1; $.each(rb,
function (c, d) { if (d === a) return b = !0, !1 }); return b
	} function Vb() { X({ url: "tfl-bus-map/dotnet/AllRoutes.aspx?session=" + Wb, CallFunction: function (a) { rb = a.AllRoutes } }) } function L(a) {
		var b = $("#" + j + "search-result"), c = a.Heading.replace(/POSTCODE /, ""); b.empty(); b.html("<h3>" + c + "</h3>"); if (typeof a.list === "object" && (U = a.list.length, U !== 0)) {
			c = "Did you mean?"; if (typeof a.listHeading === "string") c = a.listHeading; var d = $('<div class="LHP-Disambiguation-Msg-Holder">'); d.append('<div class="' + j + 'LHP-Disambiguation-Msg">' +
c); d.append($('<div class="' + j + 'LHP-Disambiguation-Msg-Close cursor-pointer" title="Hide \'did you mean\'"></div>').toggle(function () { $(".ambiguousResultsList").hide(); $(this).addClass("closed").attr("title", "Show 'did you mean'"); W() }, function () { $(this).removeClass("closed").attr("title", "Hide 'did you mean'"); $(".ambiguousResultsList").show(); W() })); d.append('<div class="clearer"></div>'); Aa = $('<ul class="ambiguousResultsList">'); var f = 0; $.each(a.list, function (b, c) {
	var d = ""; b > fa && U > fa && (d = ' class="MoreSearchResults"',
f++); var g = c.address; if (typeof a.inputBox === "string") g = a.inputBox; Aa.append($("<li" + d + ">" + c.address + "</li>").bind("click", function () { e("==================================searchBoxHeading:" + g); ia({ Lat: c.Point.coordinates[1], Lng: c.Point.coordinates[0], q: g, LHP: { Heading: "Showing routes near " + g} }) }))
}); f > 0 && (e("totalAmbiResults:" + U), e("TotalPosibleGeoResultsToShow:" + fa), Aa.append($('<li class="more">' + (U - fa - 1) + " more...</li>").bind("click", function () {
	$(".MoreSearchResults").removeClass("MoreSearchResults");
	$(this).remove(); W()
}))); d.append(Aa); b.append(d).show()
		} b.show(); e("KKKKKKKKKKKKKKKKKKKKKKKKK")
	} 
	
	function Xb(a) { if (a.indexOf("N") != -1) return !0; else if (a.indexOf("W") != -1) return !0; return !1 } function Pb() {
		e("f userSearch"); V = 0; jb(); var a = Ka($("." + j + "inputTxt-SearchBox").val()); if (a == "") $("#" + j + "LHP-ValidationErrorMsg").show(), $("." + j + "searchValidationMsg").html("Please enter a search term.<br /> Either a Route no, postcode, address, landmark or station."), o(); else {
			var b = !1, c = a.indexOf(":"); if (c > 0) {
				var c =
a.substring(0, c), d = a.split(":", 2)[1]; switch (c) { case "route": qb(d) && (e("search - triggered - JUST A ROUTE"), a = m = d, $("." + j + "inputTxt-SearchBox").val(a), L({ Heading: "Showing route " + a }), g = 0, Ba = !0, X({ url: "tfl-bus-map/dotnet/FullRoute.aspx?route=" + a + "&run=1", CallFunction: sb }), b = !0); break; case "stop": e("STOP = " + d), s = d, b = M("sv"), tb(s, b), b !== "" && (ma = point, k.openStreetView(point)), b = !0 } 
			} b || (m = a.toUpperCase().replace(/ROUTE /, ""), a += ", Hochiminh, Vietnam", m.match("[0-9]{5}") ? (e("assuming 5 digit stop code"), s = m, tb(s,
"")) : qb(m) ? (e("search - 01 - is a route That could be a postcode"), v.setSearchCompleteCallback(null, function () { if (v.results[0] && v.results[0].addressLines[0].indexOf("Hochiminh") != -1) { var a = []; a.push(v.results[0].lng); a.push(v.results[0].lat); Ja.push({ address: "Postcode " + m, Point: { coordinates: a }, inputBox: m }); L({ Heading: "Showing route " + m, list: Ja }) } else e("search - 02 - JUST A ROUTE"), L({ Heading: "Showing route " + m }) }), Xb(m) ? v.execute(a) : L({ Heading: "Showing route " + m }), X({ url: "tfl-bus-map/dotnet/FullRoute.aspx?route=" +
m + "&run=1", CallFunction: sb
})) : Lb(m) ? (e("search - 03 - IS A POSTCODE"), v.setSearchCompleteCallback(null, function () { v.results[0] && ia({ Lat: v.results[0].lat, Lng: v.results[0].lng, q: a, LHP: { Heading: "Showing routes near " + a} }) }), v.execute(a)) : (e("search - 04 - Just a location"), e("search string: " + a), ka.getLocations(a, function (b) {
	if (b.Status.code == G_GEO_SUCCESS) {
		var c, d = []; $.each(b.Placemark, function (a, b) {
			c = b; var f = c.Point.coordinates, g = f[1], f = f[0]; g < Ra && g > Pa && f > Qa && f < Sa ? (e("adding result : " + b.address),
d.push(b)) : (e("skipping address outside london : " + b.address))
		}); if (d !== null && d.length > 0) { c = d[0].Point.coordinates; var f = new GLatLng(c[1], c[0]); $.each(d, function (a, b) { a !== 0 && (new GLatLng(b.Point.coordinates[1], b.Point.coordinates[0])).distanceFrom(f) >= 1E3 && Ia.push(b) }); a = Ka(d[0].address); ia({ Lat: c[1], Lng: c[0], q: m, qInput: a, LHP: { Heading: "Showing routes near " + a, list: Ia} }); $("#" + j + "LHP-content").show() } else u("", "")
	} else u("", ""); o()
})))
		} 
	} 
	
	function sb(a) {
		e("f ajax_ShowJustOneFullRoute"); if (a.Routes) l = a.Routes;
		if (a.Stops) p = a.Stops; h.setZoom(12); z("hidden"); H = !0; g = 0; Oa(l); O = !1; R.show(); $("#busesLeftCol_inner").show(); $("#" + j + "search-result").show(); $("#" + j + "LHP-content").show(); ja("ajax_ShowJustOneFullRoute"); var b = !1; $.each(f, function (a, d) { e("searchStrCleanedUpCase:" + m); e("item.Route:" + d.Route); d.Route == m && (e("OK"), d.IsDay && (b = !0)) }); P(b); $(".show-all-stops-link_0_aLink").trigger("click"); o()
	} 
	
	function ub(a) { Yb(a); vb(); return a } function Oa(a) {
		e("f manager_route"); f = []; T = S = 0; var b = []; Ta = []; Ua = []; $.each(a,
function (a, d) {
	try {
		b.push(d); var g = new GLatLng(d.startPoint.Latitude, d.startPoint.Longitude), h = wb({ stopPoint: g, RouteID: d.Route, RouteColor: d.Color, IsDay: d.IsDay }), g = new GLatLng(d.endPoint.Latitude, d.endPoint.Longitude), k = wb({ stopPoint: g, RouteID: d.Route, RouteColor: d.Color, IsDay: d.IsDay }); Zb(d.Route) && Ta.push(d.Route); Ua.push(d.Route); $("#" + j + "bus-routes-holder").append($b({ item: d, iCount: a })); f.push({ Index: a, Route: d.Route, Id: d.Id, oPolyline_1: null, oPolyline_2: null, ooStops_1: null, ooStops_2: null, run: 1, color: "#fd0013",
			startPoint: h, endPoint: k, From: d.From, Towards: d.Towards, IsDay: d.IsDay, hasRunTwo: d.hasRunTwo
		})
	} catch (E) { e("ERROR - f manager_route") } 
}); $.each(Ta, function (a, b) { $(".ski_24hrs_" + b).text("24hr") }); T <= 0 && S >= 1 && Fa(0); S == 0 && $("#img_buttom_night").hide(); T == 0 && $("#img_buttom_day").hide()
	} 
	
	function xb(a, b) {
		na = !1; if (Va(a)) e("~~~~~~~~~~~~~~~~~~bus-routes-item-directionText~~~~~~~~~~~~~~~routeID_ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"), e("BB:1"), Wa({ Id: b.Id }); else {
			e("~~~~~ACTIVE~~~~~~~~~~~~~bus-routes-item-directionText~~~~~~~~~~~~~~~routeID_ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
			var c; f[i].run == 1 ? (c = f[i].ooStops_1, q = f[i].oPolyline_1) : (c = f[i].ooStops_2, q = f[i].oPolyline_2); A(); t = yb(c, q); h.panTo(t)
		} 
	} 
	
	function $b(a) {
		if (typeof a.item == "object" && typeof a.iCount == "number") {
			var b = a.iCount, c = a.item, d = ""; c.IsDay ? (Ha = c, d = "IsDay_1", T++) : (d = "IsDay_0", S++); a = $("<div />").attr("id", "routeID_" + c.Id); a.addClass(j + "bus-routes-item " + d); a.hover(function () { try { $(this).hasClass(B) && $(this).removeClass(B).addClass(ba) } catch (a) { } }, function () {
				try {
					$(this).hasClass(ba) && $(this).attr("id") != "routeID_" +
f[g].Id && $(this).addClass(B)
				} catch (a) { } 
			}); currentItemTopArea = $("<div />").addClass("bus-left-top"); currentItemHolder = $('<div class="' + j + 'bus-routes-item_Holder"></div>'); currentItemHolder.append($('<a href="#" class="' + j + 'bus-routes-item_ski" style="background-color: #ccc">' + c.Route + "</a>").click(function () { xb(this, c); return !1 })); currentItemHolder.append($('<div class="ski_24hrs_' + c.Route + '"></div>')); currentItemTopArea.append(currentItemHolder); currentItemTopArea.append($('<dl class="' + j + 'bus-routes-item-directionText" id="RouteID_DirectionTextLink_' +
c.Id + '"><dt>FROM</dt> <dd class="FromLocation_' + b + '">' + c.From + '</dd> <dt>TO</dt> <dd class="TowardsLocation_' + b + '">' + c.Towards + "</dd></dl>").click(function () { e("click event handler from f action_renderLHPRouteItem"); if (Va(this)) return xb(this, c), !1; else alert("tripped") })); d = $('<div class="' + j + 'bus-routes-item-SwapRun clear" id="SwapRunID_' + c.Id + '"><a href="#">Switch direction</a></div>').click(function () {
	e("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~SwapRun ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"); e("ajaxNotInProgress:::::" +
J); if (J) { e("find and swap current run on route."); var a = f[b].run; e("currentRun:" + a); a = a == 1 ? 2 : 1; e("currentRun:" + a); f[b].run = a; e("swap text in LHP"); var a = $(".FromLocation_" + b).text(), c = $(".TowardsLocation_" + b).text(); $(".FromLocation_" + b).text(c); $(".TowardsLocation_" + b).text(a); na = "" != $("#RouteStopsHolder_" + b).html(); Ga(); Xa({ Index: b }) } return !1
}); currentItemTopArea.append(d); a.append(currentItemTopArea); var d = $("<div />").addClass("show-all-stops-link_Hold"), h = $("<a></a>").attr("href", "#").attr("id",
"show-all-stops-link_" + b).addClass("show-all-stops-link_" + b + "_aLink").html("Show all stops"), wa = $("<div />").addClass(j + "show-all-stops-link cursor-pointer trigger_show-all-stops-link_" + c.Id).attr("id", "show-all-stops-div_" + b), k = $("<div />").attr("id", "RouteStopsHolder_" + b).addClass("RouteStopsHolder"), E = $("<div />").attr("id", "AllStopsLoading_" + b).addClass("AllStopsLoading").html("Loading..."); h.toggle(function () { if (Va(this)) return na = !0, ea = null, Wa({ Id: c.Id }), $(this).addClass("stops-active"), !1 },
function () { Ya(); return !1 }); wa.append(h); d.append(wa); d.append(k); d.append(E); a.append(d); return a
		} 
	} 
	
	function Ya() { var a = $("a:contains('Hide stops')"); $.each(a, function (a, c) { $(c).text("Show all stops"); $(c).removeClass("stops-active"); $("#RouteStopsHolder_" + i).empty() }); $("#AllStopsLoading_" + i).removeClass("active"); z("inactive"); $(".mm-bus-routes-item").height("auto") } function wb(a) {
		e("f build_StartEndMarker"); var b = a.stopPoint, a = a.RouteID; if (b) {
			var c = document.createElement("div"), d = h.fromLatLngToDivPixel(b);
			d.x -= parseInt(za / 2, 10); d.y -= parseInt(Za / 2, 10) - 30; var f = "", f = document.all ? 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="tfl-bus-map/img/ski/ff0000.png");' : "background:url(tfl-bus-map/img/ski/ff0000.png) no-repeat;"; f += "height:" + Za + "px;line-height:" + Za + "px;"; f += "width:" + za + "px;text-align:center;  padding-top:4px;"; c.style.cssText = f + "cursor:pointer;top:" + d.y + "px;left:" + d.x + "px;color:#FFFFFF;position:absolute;z-index:50; font-size:1.5em;font-family:Arial,sans-serif;font-weight:bold";
			c.innerHTML = a; c.style.display = "none"; h.getPane(G_MAP_MARKER_PANE).appendChild(c); GEvent.addDomListener(c, "click", function () { da = !0 }); return { div: c, latlng: b}
		} 
	} 
	
	function zb(a, b, c, d) {
		e("build_StopMarker"); switch (c) { case "Stop": c = Z; break; default: c = new GIcon(G_DEFAULT_ICON) } var f = new GMarker(a, { icon: c, id: b }); D.extend(a); GEvent.addListener(f, "click", function () { t = a; s = b; Ca() }); GEvent.addListener(f, "mouseover", function () {
			$("#stopItem_" + f.id + " a").addClass("stopItemHover"); f.setImage("tfl-bus-map/img/stop-active-2.png");
			Ab(a, d, !1)
		}); GEvent.addListener(f, "mouseout", function () { $("#stopItem_" + f.id + " a").removeClass("stopItemHover"); f.setImage("tfl-bus-map/img/stop-1.png"); Bb() }); return f
	} function Ub() {
		GEvent.addListener(h, "infowindowopen", function () {
			var a = h.getInfoWindow(); oa = $(a.getContentContainers()[0].innerHTML).text(); t = a.getPoint(); oa.indexOf("__STOP__") != -1 ? (A(), s = $.trim(oa.replace(/__STOP__/, "")), Ca(), Q({ showHide: !1 })) : oa.indexOf("__ROUTE__") != -1 && (A(), a = $.trim(oa.replace(/__ROUTE__/, "")), aa = t, e("@3"), ra(a),
e("@3.1"), Q({ showHide: !1 }))
		})
	} 
	
	
	function ra(a) { e("f trigger_LoadRouteInfo"); e("LoadRouteID:" + a); $a = !1; a = "#RouteID_DirectionTextLink_" + Cb(a, "Id"); e("element :" + a); $(a).trigger("click") } function Ca() {
		e("build_createInfoWindowStop"); e("StopCode = " + s); e("currentStopCodeCord = " + t); h.panTo(t); null != h.getInfoWindow() && h.closeInfoWindow(); h.openInfoWindowHtml(t, '<div id="InfoWindowPrimary"></div><div id="StopRouteInfoHolder"></div><div id="planJourneyFromHere" class="listPoint"></div><div id="searchFromHere"></div><div class="LoadingData">Loading stop details...<br /><br /><p class="StopGreyText">(Select stop again if data does not show within 5 seconds.)</p><br /><br /><br /><br /></div>',
{}); Q({ showHide: !1 }); X({ url: "tfl-bus-map/dotnet/stopinfo.aspx?stopcode=" + s, CallFunction: ac })
	} 
	
	
	function A() { h.getInfoWindow().hide(); $(".NonMapInfoWindowHolder").empty() } function Zb(a) { var b = !1; $.each(Ua, function (c, d) { d == a && (b = !0) }); return b } function bc(a) { var b = null; $.each(f, function (c, d) { if (d.Route == a && d.IsDay == w) b = d.color; if (d.Route == a && d.IsDay != w && b === null) b = d.color }); return b } function Db(a) { return $.parseJSON($.ajax({ type: "GET", url: a, async: !1, contentType: "application/json; charset=utf-8", dataType: "json" }).responseText) }
	
	
	function tb(a) {
		e("setUpStopSearch"); try {
			var b = Db("tfl-bus-map/dotnet/stopinfo.aspx?stopcode=" + a); if (b === "") return u("", ""), o(), !1; g = 0; f = []; if (b.Routes && b.Stops) f = l = b.Routes, aStops = p = b.Stops; else return u("", ""), o(), !1; if (l.length > 0 && p.length > 0) {
				var c = l[g].Route, d = p[0], k = "&Lat=" + xa(d.Latitude, 3) + "&Lng=" + xa(d.Longitude, 3); searchStr = m = d.StopName; t = new GLatLng(d.Latitude, d.Longitude); L({ Heading: "Showing routes near " + d.StopName }); $("#" + j + "search-result").empty(); $("." + j + "inputTxt-SearchBox").val(d.StopName);
				$("#textVersionLink").attr("href", "tfl-bus-map/text/stopinfo.aspx?s=" + d.StopCode + "&r=" + c); var wa = "tfl-bus-map/dotnet/Search.aspx?searchStr=" + d.StopName + "&width=" + $("#" + j + "map").width() + "&height=" + $("#" + j + "map").height() + "&zoom=16" + k, F = Db(wa); if (F == "") return u("", ""), o(), !1; if (F.CoOrds == "" || F.Count == "") return u("", ""), o(), !1; l = F.Routes; p = F.Stops; G = F.CoOrds; a = 16; if (G.Zoom != "") a = G.Zoom; Oa(l); R.show(); $("#busesLeftCol_inner").show(); $("#" + j + "search-result").show(); o(); $("#" + j + "LHP-content").show(); setTimeout(function () { W() },
2E3); point = t; s = d.StopCode; Ca(); h.addOverlay(zb(point, s, "Stop", d.StopName)); h.setCenter(t, a)
			} else return u("", ""), o(), !1; return !0
		} catch (E) { return e("setUpStopSearch :: " + E.Message), u("", ""), o(), !1 } 
	} function ac(a) {
		try {
			var b = null, c = null; if (a.Routes) b = a.Routes; a.Stops && (c = a.Stops[0]); null == g && (g = 0); null == f && (f = []); var a = 0, d = ""; if (c) a = c.StopCode; if (b.length > 0) g >= b.length && (g = b.length - 1), d = b[g].Route; x = $(".NonMapInfoWindowHolder"); x.empty(); var e = $('<div id="StopWindowHeading"></div>'), h = $('<div id="StopName"></div>');
			h.append('<div id="StopNameText"><a title="go to stop page" href="tfl-bus-map/text/stopinfo.aspx?s=' + a + "&r=" + d + '">' + c.StopName + "</a></div>"); c.PointLetter != "" && (h.append($('<span id="stopPointLetter" title="Stop letter ' + c.PointLetter + '">' + c.PointLetter + "</span>")), h.addClass("withStopLetter")); e.append(h); x.append(e); x.append($('<div class="clearer"></div><span class="stopOtherRoutes"><strong>Routes:</strong></span>')); x.append(cc(b)); x.append('<div class="clearer"></div>'); x.append('<div id="ViewStopInformation"><p><a href="tfl-bus-map/text/stopinfo.aspx?s=' +
a + "&r=" + d + '">View stop information</a></p><p>Including timetables, maps,<br /> service updates and more</p></div>'); $("#stopItem_" + c.StopCode).addClass("stop-item-active"); ca = 0; Eb()
		} catch (j) { o() } 
	} function cc(a) {
		var b = 0, c = $('<div id="routeList"></div>'), d, e, f = []; $.each(a, function (a, b) { var c = !1; $.each(f, function (a, d) { b.Route == d.Route && (c = !0) }); c || f.push(b) }); $.each(f, function (a, f) {
			b++; b == 1 && (d = $('<ul class="tabsL">')); var g = "#000000"; itemColorTemp = bc(f.Route); itemColorTemp != null && (g = itemColorTemp);
			g.replace(/#/, ""); e = $($('<li id="Route_' + f.Route + '">')); e.html("<span>" + f.Route + ",</span>"); d.append(e); b === 8 && (c.append(d), x.append(c), d = $('<ul class="tabsL">'), b = 0)
		}); return b > 0 ? (c.append(d), c) : ""
	} function Eb() {
		e("logic_checkInfoWindowIsPopulated"); x = $(".NonMapInfoWindowHolder"); MapInfoWindowPrimary = $("#InfoWindowPrimary"); MapInfoWindowPrimary.text() == "" ? (o(), x.clone(!0).prependTo(MapInfoWindowPrimary), MapInfoWindowPrimary.find(".NonMapInfoWindowHolder").removeClass("NonMapInfoWindowHolder").show(),
h.updateInfoWindow(), h.getInfoWindow().disableMaximize(), ca++, ca <= dc ? setTimeout(function () { Eb() }, 200) : (e("Close IW"), setTimeout(function () { A() }, 300))) : (e("."), ca = 0)
	} function Q(a) {
		try {
			var b = g; typeof a.HideAll !== "undefined" && (b = null); e("f action_showHideStartEndPoints:"); var c = a.showHide; ja("action_showHideStartEndPoints"); if (c) if (g != null && f[g] != null) f[g].startPoint.div.style.display = "block", f[g].endPoint.div.style.display = "block"; else switch (I) {
				case "multi": $.each(f, function (a, b) {
					if (w == b.IsDay) b.startPoint.div.style.display =
"block", b.endPoint.div.style.display = "block"
				})
			} else if ($.each(f, function (a, b) { b.startPoint.div.style.display = "none"; b.endPoint.div.style.display = "none" }), b != null) f[g].startPoint.div.style.display = "block", f[g].endPoint.div.style.display = "block"; cb()
		} catch (d) { e("ERROR - f action_showHideStartEndPoints") } 
	} function ya() { h.setZoom(h.getBoundsZoomLevel(D)); h.setCenter(D.getCenter()) } function yb(a, b) {
		try {
			DistanceFromNearestLat = null; var c = b.getVertexCount(); e("vertexCount:" + c); if (H && searchWas_RouteOnly_FirstOpen) {
				e("**");
				var d = b.getVertex(Math.round(c / 2)); return DistanceFromNearestLat = new GLatLng(d.lat(), d.lng())
			} for (var f = h.getCenter(), g = 9999999999, j = 0; j < c; j++) { var d = b.getVertex(j), k = new GLatLng(d.lat(), d.lng()), l = d.distanceFrom(f); l <= g && (g = l, DistanceFromNearestLat = k) } return DistanceFromNearestLat
		} catch (m) { } 
	} function nb(a) { e("f cache_RoutePolyline_Set"); f[g].run == 1 ? f[g].oPolyline_1 = a : f[g].oPolyline_2 = a } function ob(a) { f[g].run == 1 ? f[g].ooStops_1 = a : f[g].ooStops_2 = a } function ec(a) {
		if (a.Routes) l = a.Routes; if (a.Stops) p =
a.Stops; e("encode polyline data into a GMap Object"); e("++++++++++++++++++++++++++++++"); var b = 0; e("dayOrNightActive:" + w); $.each(l, function (a, d) { d.Index = a; e("item.IsDay:" + d.IsDay); if (d.IsDay == w) b = d.Index }); e("RenderItemIndex:" + b); q = mb(l[b].encodedPoints, l[b].encodedLevels, f[g].color, "FullRoute", l[b].Route); nb(q); f[g].From = p[b]; f[g].Towards = p[p.length - 1]; f[g].hasRunTwo = l[b].hasRunTwo; y = ub(p); ob(y); e("reCallFunction_renderOneRoute:" + Da); Da && (Da = !1, e("=======   action_renderOneRoute: 3"), Xa(ha))
	} function Wa(a) {
		A();
		ga != "" && (a = ga, ga = ""); typeof a.Id !== "undefined" && (g = Fb(a.Id, "Index")); D = new GLatLngBounds; g <= 0 && (g = 0); $("." + C).removeClass(C); $("." + B).removeClass(B); $("#routeID_" + f[g].Id).addClass(C); a = $("#routeID_" + f[g].Id).siblings(); a.addClass(B); a = a.children(); a.find(".RouteStopsHolder").empty(); a.find(".mm-show-all-stops-link").children().text("Show all stops").removeClass("stops-active"); if (!H) switch (I) { case "multi": $(".mm-LHP-Disambiguation-Msg-Close").hasClass("closed") || $(".mm-LHP-Disambiguation-Msg-Close").trigger("click") } sa();
		switch (I) { case "multi": z("active") } Q({ showHide: !1 }); e("=======   action_renderOneRoute: 4"); Xa({ Index: g }); eb(f[g].Id)
	} function eb(a) { e("f action_scrollTo"); try { ea != a && (ea = a, setTimeout(function () { $("#mm-bus-routes-holder").scrollTo($("#routeID_" + ea), 900, "y"); W() }, 500)) } catch (b) { e("ERROR - f action_scrollTo") } } function Yb(a) {
		var b = { borderPadding: 50 }; pa || (pa = new MarkerManager(h, b)); pa.clearMarkers(); if (a.length >= 0) {
			var c = [], d = []; $.each(a, function (a, b) {
				var e = new GLatLng(b.Latitude, b.Longitude); d = zb(e,
b.StopCode, "Stop", b.StopName); b.Marker = d; c.push(d); pa.addMarker(d, 13)
			})
		} pa.refresh()
	} function fc(a) {
		e("f action_RenderStopsForRouteInLHP"); $("#AllStopsLoading_" + i).addClass("active"); Ya(); stopsDiv = $("#RouteStopsHolder_" + g); stopsDiv.empty(); $.each(a, function (a, c) {
			var d = $("<a></a>").attr("id", "stopAnchor_" + c.StopCode).attr("href", "#").hover(function () { $(this).addClass("stopItemHover"); Ab(new GLatLng(c.Latitude, c.Longitude), c.StopName, !0); return !1 }, function () {
				$(this).removeClass("stopItemHover"); Bb();
				return !1
			}).text(c.StopName); d.click(function () { if (!(s && s == c.StopCode)) t = point = new GLatLng(c.Latitude, c.Longitude), s = c.StopCode, Ca(); $("#stopItem_" + c.id).addClass("stop-item-active"); return !1 }); d = $("<div />").attr("id", "stopItem_" + c.StopCode).addClass("stopItem").append(d); stopsDiv.append(d)
		}); $(".show-all-stops-link_" + g + "_aLink").text("Hide stops"); $("#AllStopsLoading_" + g).removeClass("active"); z("active"); $(".RouteStopsHolder div:last").css("border-bottom", "1px solid #ccc")
	} function Ab(a, b, c) {
		n ||
vb(); n.setPoint(a); n.setTooltip(b); n.showTooltip(); n.display(c); n.topMarkerZIndex()
	} function vb() { if (!n) { var a = p[0]; n = new PdMarker(new GLatLng(a.Latitude, a.Longitude)); h.addOverlay(n); n.hideTooltip(); n.display(!1) } } function Bb() { n && (n.hideTooltip(), n.display(!1)) } function Gb(a) {
		try {
			Ea != "" ? (Route = Ea, Ea = "") : Route = a.Route; e("action_viewFullRoute"); A(); var b; b = typeof a.NoDayCheck !== "undefined" ? gc(Route, "Index") : Cb(Route, "Index"); null == b && (b = 0); if (g == null || g == 0 || g == "") g = 0; w != f[b].IsDay && (P(f[b].IsDay),
Ea = Route, setTimeout(function () { Gb(a) }, 1E3)); e("CurrentActiveRoute:" + g); e(f[b].Id + ":" + f[g].Id); f[b].Id != f[g].Id ? (Ba = !0, e("BB:4"), e("showRoute :" + f[b].Id), Wa({ Id: f[b].Id })) : (Hb(), ya(), ja("action_viewFullRoute"))
		} catch (c) { e("ERROR - f action_viewFullRoute") } 
	} function gc(a, b) { for (i = 0; i < f.length; i++) if (f[i].Route == a) return f[i][b] } function Cb(a, b) { var c = null; for (i = 0; i < f.length; i++) if (f[i].Route == a && f[i].IsDay == w) { c = f[i][b]; break } return c } function Fb(a, b) {
		e("find_returnRouteInfoById:" + a); e("GetThis:" + b);
		for (i = 0; i < f.length; i++) if (f[i].Id == a) { e("FOUND"); try { return e("return:" + f[i][b]), f[i][b] } catch (c) { return e("not found"), null } } 
	} function Hb() { e("f FindBoundsOfRoute"); y = f[g].run == 1 ? f[g].ooStops_1 : f[g].ooStops_2; var a = 180, b = 180, c = -180, d = -180; $.each(y, function (e, f) { if (f.Latitude < a) a = f.Latitude; if (f.Latitude > c) c = f.Latitude; if (f.Longitude < b) b = f.Longitude; if (f.Longitude > d) d = f.Longitude }); var h = new GLatLng(a, b), j = new GLatLng(c, d); D.extend(h, j); D.extend(f[g].startPoint.latlng); D.extend(f[g].endPoint.latlng) }
	function Xa(a) {
		e("action_renderOneRoute"); if (ha != "") a = ga, ha = ""; else { ib(); try { $("#routeID_" + f[g].Id).removeClass("inActive").removeClass(ba) } catch (b) { e("ERROR - f CheckActiveRouteIsActive") } typeof a.Id !== "undefined" && (g = Fb(a.Id, "Index")); if (typeof a.Index !== "undefined") g = a.Index } Ya(); e("CurrentActiveRoute:" + g); f[g].run == 1 ? (q = f[g].oPolyline_1, y = f[g].ooStops_1) : (q = f[g].oPolyline_2, y = f[g].ooStops_2); if (q == null) Da = !0, ha = a, X({ url: "tfl-bus-map/dotnet/FullRoute.aspx?route=" + f[g].Route + "&run=" + f[g].run, CallFunction: ec });
		else {
			h.addOverlay(q); y = ub(y); a = f[g].hasRunTwo; try { e("userCon_ShowSwitchDirection:" + a), $(".mm-bus-routes-item-SwapRun").removeClass("active"), a && $("#SwapRunID_" + f[g].Id).addClass("active") } catch (c) { e("ERROR - f userCon_ShowSwitchDirection") } e("currentStopCodeCord_ROUTE:" + aa); aa === null ? a = yb(y, q) : (a = aa, aa = null); h.panTo(a); Ba && (Ba = !1, Hb(), $a === !1 && ya(), e("=======   ShowFullRouteAfterLoad"), Gb({ Route: f[g].Route })); e("PopUpRouteInfoWindowAfterRouteLoad:" + $a); t = a; na && (na = !1, fc(y)); H && searchWas_RouteOnly_FirstOpen &&
(searchWas_RouteOnly_FirstOpen = !1, ya()); ja("action_renderOneRoute")
		} 
	} function mb(a, b, c, d, e) { a = GPolyline.fromEncoded({ color: c, weight: 5, opacity: 0.8, points: a, levels: b, numLevels: 18, zoomFactor: 2 }); GEvent.addListener(a, "mouseover", function () { }); GEvent.addListener(a, "mouseout", function () { }); GEvent.addListener(a, "click", function (a) { aa = a; ra(e) }); return a } function Va(a) {
		if (da) return da = !1, !0; else {
			e("checkActive"); ab = $(a).parent().attr("class"); e("parrentClass:" + ab); return ab.indexOf(C) == -1 ? (e("IS TRUE"), !0) :
!1
		} 
	} function W() { e("autoSizeLHPHeights:"); $(".mm-bus-routes-item").height("auto"); var a = parseInt($("#mm-bus-routes-holder").css("height")); if (g !== null && $("#show-all-stops-link_" + f[g].Index).hasClass("stops-active")) { var b = $("#routeID_" + f[g].Id).height(); e("scroll333"); b < a && (e("scroll1"), $("#routeID_" + f[g].Id).height(a), f[g].Id == Ha.Id && (e("scroll"), (b = $("#mm-bus-routes-holder")) && $(b).scrollTo(999999, 900, "y"))) } b = $("#mm-LHP-content").height(); a = b <= qa ? a + (qa - b) : a - (b - qa); $("#mm-bus-routes-holder").height(a) }
	function u(a, b) { a && b ? h.setCenter(new GLatLng(a, b), 13) : h.setCenter(new GLatLng(10.7569353, 106.6686039), 13); $("." + j + "LHP-NoResults_content").text($("." + j + "inputTxt-SearchBox").val()); h.addOverlay(va); o(); $("#busesLeftCol_inner").hide(); $("#mm-LHP-NoResults").show(); $("#mm-LHP-content").hide(); A() } function hc(a) { a.code != 200 ? (GLog.write("showPanoData: Server rejected with code: " + a.code), ma = null) : (e("OK:" + a.location.latlng), ma = a.location.latlng, $(".streeViewContext").slideDown("fast")) } function Qb() {
		r.style.visibility =
"hidden"; r.style.background = "#ffffff"; r.style.border = "1px solid #565656"; r.innerHTML = '<div class="context"><a href="javascript:busMapApplication.searchHere()">Search for routes near here</a></div>'; r.innerHTML += '<div class="context borderTop streeViewContext"><a href="javascript:busMapApplication.openStreetView({})" >View Streetview</a></div>'; h.getContainer().appendChild(r); var a = new GStreetviewClient; GEvent.addListener(h, "singlerightclick", function (b) {
	if (ta) {
		$(".streeViewContext").hide(); bb = b; var c =
h.fromContainerPixelToLatLng(bb); a.getNearestPanorama(c, hc); c = b.x; b = b.y; c > h.getSize().width - 120 && (c = h.getSize().width - 120); b > h.getSize().height - 100 && (b = h.getSize().height - 100); (new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(c, b))).apply(r); r.style.visibility = "visible"
	} 
}); GEvent.addListener(h, "click", function () { boundsAllreadyChecked = !1; r.style.visibility = "hidden" })
	} function ic(a) {
		!a || a.Status.code != 200 ? u("", "") : (place = a.Placemark[0], ia({ Lat: place.Point.coordinates[1], Lng: place.Point.coordinates[0],
			q: place.address, LHP: { Heading: "Showing routes near " + place.address}
		}))
	} function jc() { r.style.visibility = "hidden"; panoramaOptions = { latlng: ma }; var a = new GStreetviewPanorama(document.getElementById("pano"), panoramaOptions); GEvent.addListener(a, "initialized", function () { $("#pano_Loading").hide() }); GEvent.addListener(a, "error", function (a) { a == 600 && $("#pano").text("Sorry no Streetview in this area."); a == 603 && $("#pano").text("Flash required for Streetview") }) } var Pa = 51.08, Qa = -0.78, Ra = 51.81, Sa = 0.33, qa = 600, Ib,
Sb = 2, Wb = 988870871, I = M("mode"), B = "inActive", ba = "inActive_hover", C = "route_active"; I != "multi" && (I = "SingleLine", B = "inActive_SingleLine", ba = "inActive_hover_SingleLine", C = "route_active_SingleLine"); var q = null, y = null, Ja = [], $a = !1, U = 0, oa, w = 1, fa = 1, H = !1, J = !0, f = [], g = null, Ba = !1, t, da = !1, Ma, Na, V = 0, lb, va, rb = [], l = [], p = [], G, ua = 1, Ha, N = null, x = null, h = "", R, O = !1, ta = !1, Aa, ea = "", za = 36, Za = 27, m, S = 0, T = 0, ga = [], Ia = [], ca = 0, dc = 10, j = "mm-", bb, r = document.createElement("div"), Ea = "", db, fb = !0, hb, La = !1, kb, Ua = [], Ta = [], aa = null, ab, Da = !1,
na = !1, ha = "", ma = null, s = null, pa = null, D = null, ka = null, K = null, Z = null, Y = null, la = null, v = null, n = null, Jb = M("debug"), k = { MapSizeSmall: "S", MapSizeLarge: "L", setContainingElement: function (a) { containingElement = a } }; k.setMapSize = function (a) { if (a !== k.MapSizeLarge) a = k.MapSizeSmall; Ib = a }; k.ResizeMap = function () {
	var a = 0, b = $(containingElement).width(), c = b - 208; switch (Ib) {
		case k.MapSizeSmall: $("#busesLeftCol").show(); $("#busesRightCol").width(c); a = c; $("#" + j + "but_showLHP").hide(); break; case k.MapSizeLarge: $("#busesLeftCol").hide(),
$("#busesRightCol").width(b), a = b, $("#" + j + "but_showLHP").show()
	} qa = $("#mm-map").height(); b = $("#" + j + "map"); b.height(qa); b.width(a); h.checkResize()
}; k.openStreetView = function (a) {
	a = typeof a.point === "string" ? a.point : ma; $("#InfoWindowPrimary").text(""); A(); var b = document.createElement("div"); b.innerHTML = '<h1>StreetView</h1><div name="pano" id="pano" style="width: 400px; height: 300px"><div id="pano_Loading">Loading...</div></div>'; $("#InfoWindowPrimary").text("StreetView"); h.openInfoWindowHtml(a, b); r.style.visibility =
"hidden"; setTimeout(function () { jc() }, 300)
}; k.searchHere = function () { var a = h.fromContainerPixelToLatLng(bb); r.style.visibility = "hidden"; a != null && (address = a, ka.getLocations(a, ic)) }; k.Initialise = function (a) { k.setMapSize(k.MapSizeSmall); k.setContainingElement(a); Tb(); Ob(); k.ResizeMap() }; k.printMap = function () { window.print() }; return k
} ();