/// <reference path="jquery-vsdoc.js" />

// BASIC FUNCTIONS
$(function() {
	// ADD CLEAR ON FOCUS BEHAVIOUR
	// Clears an input field of it's help text when it is focussed on 	
	$(".clear-on-focus").focus(function() {
		if (this.value == this.defaultValue) {
			this.value = "";
		}
		this.style.color = '#000000';
	});

	// SMART JOURNEY PLANNER 'ADVANCED OPTIONS' LINK
	$("#jpForm .advanced").click(function() {
		$("input[name='ptOptionsActive']").attr("value", "1");
		$("input[name='execInst']").attr("value", "readOnly");
		$("#jpForm").submit();
		return false;
	});

	$("#name_origin").keyup(function() {
		validatePostcode(this);
	});

	$("#name_destination").keyup(function() {
		validatePostcode(this);
	});

	function validatePostcode(element) {
		// get current value
		validate = element.value;
		if (element.id) {
			selectType = document.getElementById(element.id.replace("name_", "type_"));
		}
		validate = validate.replace(' ', '');
		if (validate.search(/^[a-zA-Z]{1,2}[0-9][0-9A-Za-z]{0,1}[0-9][A-Za-z]{2}$/) == 0) {
			// SET AS POSTCODE
			selectType.selectedIndex = 1;
		}
		// OTHERWISE: default any input to a station IF postcode is selected
		else if (selectType.selectedIndex == 1) {
			selectType.selectedIndex = 0;
		}
	}

	// ADD PRINT PAGE LINK TO PAGE TOOLS BAR
	$("#page-tools").append(
		'<li><a href="#" class="print">Print</a></li>'
	);

	// ADD PRINT PAGE BEHAVIOUR
	$(".print").click(function() {
		window.print();
	});

	// ADD FILETYPE ICONS AND BEHAVIOUR TO DOCUMENT HYPERLINKS	
	var x
	var fileTypes = ['pdf', 'psd', 'txt', 'rtf', 'doc', 'xls', 'pdf', 'ppt', 'gif', 'jpg', 'zip'];
	$('a[href]').filter(function(index) {
		return $("img", this).length == 0;
	}).each(function(i) {
		for (x in fileTypes) {
			// Create regular expression: 'link ends in file extension'
			var re = "/." + fileTypes[x] + "$/i";
			re = eval(re);
			if (this.toString().match(re)) {
				$(this).addClass("new-window");
				$(this).addClass('filetype-' + fileTypes[x]);
			}
		}
	});

	// APPLY 'EXTERNAL SITE' CLASS TO LINKS TO EXTERNAL WEBSITES
	// 'External Sites' are defined as those not on the exception list below
	if (window.devMode != 1) {
		$("a[href*='://']")
		.not("[href*='javascript:']")
		.not("[href*='mailto:']")
		.not("[href*='tflpensionfund']")
		.not("[href*='londonliftshare']")
		.not("[href*='custhelp.com']")
		.not("[href*='pco.org']")
		.not("[href*='streetmanagement.org']")
		.not("[href*='tfl.gov.uk']")
		.not("[href*='oystercard.com']")
		.not("[href*='london.gov.uk']")
		.not("[href*='cclondon.com']")
		.not("[href*='dlrlondon.co.uk']")
		.not("[href*='www2.imovelondon.co.uk']")
		.not("[href*='.232']")
		.not("[href*='.241']")
		.not("[href*='192.']")
		.not("[href*='10.']")
		.not("[href*='172.']")
		.not("[href*='10.81.']")
		.not("[href*='localhost']")
		.addClass("external-site");
	}

	// ADD MICROSITE 'CLOSE WINDOW' LINKS
	// For microsites that have been opened from the main TfL site
	if (opener) {
		if ($('#microsite-link').length != 0) {
			$('#microsite-link').replaceWith('<a href="javascript:window.close();" class="close-window">Close window</a>');
			$('#branding p a').attr('style', 'display:none;');
		}
	}


});

// HIGHLIGHT CURRENT PAGE IN LOCAL NAVIGATION
$(function() {
	var path = location.pathname;
	if (path) {
		$('#local-navigation dd:has(a[href="' + path + '"])').attr('class', 'current-page')
	}
});

// ADD PAGE LINKS
$(function() {
	// If a 'page links' span exists...
	if ($('#page-links').length != 0) {
		// Insert an unordered list into the span
		$('#page-links').append('<dl class="pagelinks"><dt>On this page:</dt></dl>');
		// For each <h2> on the page...
		$("#main-content h2").each(function(i) {
			//Add an id attribute to the <h2>
			var text = $(this).text(), new_id = "page-link-" + text.replace(/[^\w]/g, "-").toLowerCase();
			$(this).attr("id", new_id);
			$(this).attr("class", "width-fix");
			//Add a 'top of page' link after each <h2> (but not the first one)
			if (i > 0) $(this).after('<a class="top-of-page" href="#">Top of page</a>');
			//Create a link to the <h2> and append it to the list of page links
			$('#page-links dl').append('<dd><a href="#' + new_id + '">' + text + '</a></dd>');
		});
	}
});

$(function() { if ($("ul.jqtabs").length > 0) $('#local-navigation a').each(function() { $("ul.jqtabs a:contains('" + $(this).html() + "')").parent().attr('class', 'selected') }) });

// POP-UP FORM HELP
$(function() {
	$('.styled li .help').hide();

	$('.styled li input').click(function() {
		$('.styled li .help').hide();
		$(this).siblings().fadeIn("fast");
	});
});

$.fn.PopUpWindow = function(config) {
	return this.each(function() {
		// configuration
		this.myConfig = {
			// valid address you want to open
			address: config && config.address ? config.address : null,
			// name for the new window. Used when refering to the new windows later
			name: config && config.name ? config.name : "PopUpWindow",
			// additional parameters for the window configuration like showing the toolbar or scrollbars
			params: config && config.params ? config.params : null
		}
		// for "A" tags. if they didn't provide an address for us, then we will
		// try to grab the link for the tag and use that
		if (this.nodeName.toLowerCase() == "a") {
			// see if they gave us an address
			if (!this.myConfig.address) {
				// try to grab the href link and use that
				this.myConfig.address = this.href;
			}
		}
		// append help text to the link title attribute
		$(this).attr("title", function() {
			return this.title + " (Opens in new window)"
		});
		// add the popup code to the tag's click event
		$(this).click(function() {
			// build parameters
			var params = "";
			if (this.myConfig.params != null) {
				params += this.myConfig.params;
			}
			window.open(this.myConfig.address, this.myConfig.name, params).focus();
			return false;
		});

	});
}

$(function() {
	$(".pop-up").PopUpWindow({
		name: "microsite",
		params: "width=778, height=550, scrollbars=yes, resizable=yes"
	});

	$(".microsite").PopUpWindow({
		name: "microsite",
		params: "width=778, height=550, scrollbars=yes, resizable=yes, location=yes, toolbar=yes"
	});

	$(".new-window").PopUpWindow({
		name: "_blank",
		params: "scrollbars=yes, location=yes, status=yes, titlebar=yes, toolbar=yes, resizable=yes"
	});

	//	if(externalSiteInNewWindow){
	$(".external-site").PopUpWindow({
		name: "_blank",
		params: "scrollbars=yes, location=yes, status=yes, titlebar=yes, toolbar=yes, resizable=yes"
	});
	//	}
});

$(function() { // IE6 PNG fix
	if (!($.browser.msie && $.browser.version == "6.0")) return;
	for (var i = 0; i < document.images.length; i++) {
		var img = document.images[i];
		var imgName = img.src.toUpperCase();
		if (imgName.substring(imgName.length - 3, imgName.length) == "PNG") {
			var imgID = (img.id) ? "id='" + img.id + "' " : "";
			var imgClass = (img.className) ? "class='" + img.className + "' " : "";
			var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' ";
			var imgStyle = "display:inline-block;" + img.style.cssText;
			if (img.align == "left") imgStyle = "float:left;" + imgStyle;
			if (img.align == "right") imgStyle = "float:right;" + imgStyle;
			if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle;
			var strNewHTML = "<span " + imgID + imgClass + imgTitle
				+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
				+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
				+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>";
			img.outerHTML = strNewHTML;
			--i;
		}
	}
});

$(function() { // turns whole div into clickable area
	$('div.click-div').click (function () {
      window.location = $(this).find("a").attr("href");
    })
});

$(function () { // adds H2 advertisement heading for banner and medium rectangle ad types
    $("#main-content .advert").prepend("<h2>Advertisement</h2>");
});

$(function () {
    $(".small-promotions div:first-child").css("margin-right", "18px"); //Provide margin-right for IE6,7 on small promotions
});

(function($){
	$.fn.tabs = function(options) {
		var defaults = {length: 300 }; //not used
		var options = $.extend(defaults, options);
		return this.each(function() {
			var obj = $(this);
			obj.addClass("promo-tabs").children().each(function (){
				var child = $(this);
				child.find("div")
					.css("background-image", "url("+child.find("img").attr("src")+")").attr("title", child.find("a").attr("title"))
					.addClass("change-to-background")
					.bind("click keydown", function () {
						window.location = $(child).find("a").attr("href");
					});
					
				child.find("p").bind("mouseover focus", function(){
					obj.find("div").hide();
					obj.find("a").removeClass("selected");
					$("a", this).addClass("selected");
					child.find("div").show();
				});
			});
			obj.find("p").filter(":first").mouseover()
		});
 };
})(jQuery);

$(function () {
	$("textarea[class*='maxlength-']").bind("change keyup keypress keydown paste", function() {
		var	limit = parseInt($(this).attr("class").match(/maxlength\-([1-9]\d{0,4})(\s+\w+)?/)[1]),
				text = $(this).val(), length = text.length, message = $(this).next(".maxlength-count");
		if (isNaN(limit)) return;
		if (!message.length) message = $(this).after($("<em></em>").addClass("maxlength-count")); // add counter span if not found
		if (length > limit) $(this).val(text.substring(0, limit));
		else message.text(length > limit - 10 ? limit - length + ' of ' + limit + ' characters remaining' : '');
	});
});