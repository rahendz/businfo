			
			function callAHAH(url, pageElement, callMessage, errorMessage) 
			{ 
				document.getElementById(pageElement).innerHTML = callMessage; 
				try 
				{ 
					req = new XMLHttpRequest(); /* e.g. Firefox */ 
				} 
				catch(e) 
				{ 
				try 
				{ 
					req = new ActiveXObject("Msxml2.XMLHTTP"); /* some versions IE */ 
				} 
				catch (e) 
				{ 
						try 
						{ 
							req = new ActiveXObject("Microsoft.XMLHTTP"); /* some versions IE */ 
						} 
						catch (E) 
						{ 
							req = false; 
						} 
					} 
				} 
				req.onreadystatechange = function() 
				{
					responseAHAH(pageElement, errorMessage);
				}; 
				req.open("GET",url,true); 
				req.send(null); 
			} 

			
			function responseAHAH(pageElement, errorMessage) 
			{ 
				var output = '';
				if(req.readyState == 4) 
				{ 
					if(req.status == 200) 
					{ 
						output = req.responseText; 
						document.getElementById(pageElement).innerHTML = parseScript(output); 
					} 
					else 
					{ 
						document.getElementById(pageElement).innerHTML = errorMessage+"\n"+output; 
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
				 