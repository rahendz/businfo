<!DOCTYPE html>
<html>
<head>
<!-- Global head start -->
    <!-- Meta data -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    
    
    
    <link type="text/css" rel="stylesheet" href="views/BusInfo_demo_files/default0.css" media="all" />
    <link type="text/css" rel="alternate stylesheet" href="views/BusInfo_demo_files/large-te.css" title="Large text" media="screen" />
    <link type="text/css" rel="alternate stylesheet" href="views/BusInfo_demo_files/hi-contr.css" title="Hi-contrast" media="screen" />
    <link type="text/css" rel="stylesheet" href="views/BusInfo_demo_files/print000.css" media="print" />

<!-- Global head end -->
    <!-- Extra includes start -->
    
<!-- JS is disabled -->
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="pragma" content="no-cache" />
        
        <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?sensor=true">
</script>
        
        <script src="views/BusInfo_demo_files/jquery00.js" type="text/javascript"></script>
        <script src="views/BusInfo_demo_files/jquery01.js" type="text/javascript"></script>
        <script src="demo_files/markerma.js" type="text/javascript"></script>
        <script type="text/javascript" src="views/BusInfo_demo_files/jquery-1.js"></script>
    <script type="text/javascript" src="public/js/googlemap.js"></script>
    <script type="text/javascript"> 
          $(document).ready(function(){initialize(10.75, 106.65, "User's location", "search", true);});
    </script>


        <!--[if IE 6]>
            <link type="text/css" rel="stylesheet" href="tfl-bus-map/css/tfl-bus-mapIE6.css" media="all" />
        <![endif]-->        
        <link href="demo_files/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="demo_files/buttons0.js"></script>

    <!-- Extra includes end -->
</head>
<body class="template-5">
<!-- Container start -->
<div id="container" class="getting-around">

<div id="branding">

</div>
    <div id="section-title" class="bus-stops">Bus Maps</div>
    
    <div class="crumb-share">
        <ul class="crumb">
            <li>Search</li>
            <li>Bus routes</li>
        </ul>
    </div>

<div id="main-content" class="station-stop-page">
    
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTUzMzA0MTc3OGRk8q3svsi3bbHZXW/T36MADMtlrGo=" />
</div>

    
    <!-- Main content start -->

<!-- START OF BUS MAP ===========================================
================================================================== -->

                <div class="clearer">
                </div>
                
                <div class="panel interactive content">
                    <h2>
                        Find bus routes and stops</h2>
                    <div class="login-style">
                                        <label for="SearchBox_Overlay">Enter a location, route number or stop name</label>
                                        <fieldset>
                                        <input type="text" id="SearchBox_Overlay" class="mm-inputTxt-SearchBox" value="" maxlength="250" size="40" />
                                        <div class="tfl-field form-buttons"><input type="button" id="searchbutton_overlay" value="Go" /></div>
                                        <br />
                                        <span class="mm-searchValidationMsg"></span>
                                        </fieldset>
                                        <ul class="linklist">
                                        <li><a href="">Download HCM bus maps</a></li>
                                        </ul>
                                        
                    </div>
                </div>
                
            
                <!-- START MAP VERSION -->
                <!--div class="busesHolder_preTop">
                </div-->
                <div id="busesHolder">
                    <div id="busesLeftCol">

                        <div style="text-decoration: underline; color: #4444ff; width: 150px; valign: top;">
                            <!-- =========== side_bar with scroll bar ================= -->
                            <div id="side_bar"  style="float:left; overflow:auto; height:450px;"></div>
                            <!-- ===================================================== -->
                        </div>
                        <!-- /#busesLeftCol_TabsHolder -->
                        <div id="busesLeftCol_Routes">
                            <div id="mm-LHP-NoResults">
                                <div class="mm-LHP-NoResults_heading" >
                                    <h3>
                                        <img src="demo_files/exclamat.png" class="no_resultsIcon" alt="" />
                                        No results found</h3>
                                </div>
                            </div>
                            <div id="mm-LHP-ServerErrorMsg" style="display: none;">
                                <div class="mm-LHP-NoResults_heading">
                                    <h3>
                                        <img src="demo_files/exclamat.png" class="no_resultsIcon" alt="" />
                                        Server Error</h3>
                                </div>
                                <div>
                                    The server encountered a temporary error and could not complete your request. 
                                    Please try again in a few minutes.
                                </div>
                            </div>
                            <div id="mm-LHP-AppErrorMsg" style="display: none;">
                                <div class="mm-LHP-NoResults_heading">
                                    <h3>
                                        <img src="demo_files/exclamat.png" class="no_resultsIcon" alt="" /></h3>
                                </div>
                                <div>
                                    Sorry something seems to have gone wrong.
                                    <a onclick="window.location.reload()">Please reload the page.</a>
                                </div>
                            </div>
                            <div id="mm-LHP-ValidationErrorMsg" style="display: none;">
                                <div class="mm-LHP-NoResults_heading">
                                    <h3>
                                        <img src="demo_files/exclamat.png" class="no_resultsIcon" alt="" />
                                        Error</h3>
                                </div>
                                <div class="mm-searchValidationMsg">
                                </div>
                            </div>
                            <div id="mm-LHP-content">
                                <div id="mm-search-result">
                                </div>
                                <div id="mm-show-all-routes" class="showAllRoutesActive " style="display: none;">
                                    Show all routes
                                </div>
                                <div id="mm-bus-routes-holder">
                                    <!-- ROUTES LOAD INTO HERE VIA SCRIPT -->
                                </div>
                                <!-- mm-bus-routes-holder -->
                            </div>
                            <!-- mm-LHP-content -->
                            <div id="buses_route_area">
                                
                            </div>
                            <!-- /#buses_route_area-->
                            <div class="LHS_bottomFadeToGrey">
                            </div>
                        </div>
                        <!-- /#busesLeftCol_Routes -->
                        <div class="clearer">
                        </div>
                    </div>
                    <!-- /#busesLeftCol -->
                    <div id="busesRightCol">
                        
                        <div id="busesRightCol_MapHolder">
                            <noscript>
                                <p>
                                    <strong>This site requires javascript to function.
                                        <a href="http://www.tfl.gov.uk/tfl/gettingaround/maps/buses/tfl-bus-map/text/">Switch to text version</a></strong>
                                </p>
                            </noscript>
                            
                            <div id="mm-map" style="float:right; width: 550px; height: 450px"></div>
                        </div>
                            
                        </div>
                        <!-- /#busesRightCol -->
                    </div>

                </div>
                <div id="InfoWindowPrintVersion">
                </div>
                <div class="NonMapInfoWindowHolder">
                </div>
                <div class="clearer">
                </div>
                <div id="mm-footer">
                    <div id="mm-footer-left">
                        
                    </div>
                    <div id="mm-footer-right">
                        
                    </div>
                </div>
                <!-- /#mm-footer-->
                <!-- /#busesHolder -->
                <!-- END MAP VERSION -->

            <!-- END OF BUS MAP ===========================================
================================================================== -->

    <!-- Main content end -->
<!-- Supporting content start -->
<div id="supporting-content">
    
    
</div>
<!-- Supporting content end -->


<!-- Local Navigation start -->

<!-- Local Navigation end -->
<div id="bug-fix-1"></div>

<!-- Global navigation start -->
      <dl id="global-navigation">
        <dt>Main site sections:</dt>
        <dd id="nav-main"><a href="" title="" accesskey="1">Main</a></dd>
        <dd id="nav-news"><a href="" title="Service updates, Mobile services, Traffic news&hellip;">News</a></dd>
        <dd id="nav-user-guide"><a href="">User's Guide</a></dd>
        <dd id="nav-search"><a href="">Search</a></dd>
        <dd id="nav-faq"><a href="">FAQ</a></dd>
        <dd id="nav-about-us"><a href="">About us</a></dd>
        <dd id="nav-site-map"><a href="">Site map</a></dd>
      </dl>
<!-- Global navigation end -->
<!-- Extra footer includes start -->

<!-- Extra footer includes end -->

</div>
<!-- global -->

<!-- Container end -->
<!-- Global footer start -->
    
<!-- Global footer end -->




</body>


</html>