<script type="text/javascript">
//http://www.developersnippets.com/2009/05/20/evaluate-scripts-while-working-on-ajax-requests/
var req;
function makeRequest_2(pageUrl, divElementId, loadinglMessage, pageErrorMessage){
	document.getElementById(divElementId).innerHTML = loadinglMessage;
	try {
		req = new XMLHttpRequest(); /* e.g. Firefox */
    } catch(e) {
       try {
       req = new ActiveXObject("Msxml2.XMLHTTP");  /* some versions IE */
       } catch (e) {
         try {
         req = new ActiveXObject("Microsoft.XMLHTTP");  /* some versions IE */
         } catch (E) {
          req = false;
         } 
       } 
     }
     req.onreadystatechange = function() {responsefromServer(divElementId, pageErrorMessage);};
     req.open("GET",pageUrl,true);
     req.send(null);
  }
 
function responsefromServer(divElementId, pageErrorMessage) {
   //var output = '';
   if(req.readyState == 4) {
      if(req.status == 200) {
         output = req.responseText;
         document.getElementById(divElementId).innerHTML = parseScript(output);
         } else {
         document.getElementById(divElementId).innerHTML = pageErrorMessage+"\n"+output;
         }
      }
  }
 
function parseScript(_source)
{
		var source = _source;
		var scripts = new Array();
 
		// Strip out tags
		while(source.indexOf("<script") > -1 || source.indexOf("</script") > -1) {
			var s = source.indexOf("<script");
			var s_e = source.indexOf(">", s);
			var e = source.indexOf("</script", s);
			var e_e = source.indexOf(">", e);
 
			// Add to scripts array
			scripts.push(source.substring(s_e+1, e));
			// Strip from source
			source = source.substring(0, s) + source.substring(e_e+1);
		}
 
		// Loop through every script collected and eval it
		for(var i=0; i<scripts.length; i++) {
			try {
				eval(scripts[i]);
			}
			catch(ex) {
				// do what you want here when a script fails
			}
		}
		// Return the cleaned source
		return source;
}
</script>
<div id="change_div" style="padding: 10px; width: 200px; border: 1px solid #dcdcdc;">
	some content that is here when the page loads
	<br /><br />
	<a href="#" onclick="makeRequest_2('http://localhost/businfo/application/views/load_page.php?count_to=1','change_div','loading...','error page not loaded message');">change div</a>
</div>