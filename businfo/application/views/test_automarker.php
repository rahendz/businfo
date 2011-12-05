<!DOCTYPE html>
<html>
<head>
    <title>Commute</title>
	
	<!-- @see http://code.google.com/apis/maps/documentation/javascript/index.html#Mobile -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	
	<!-- stylesheets -->
	<style type="text/css">
	html {
height:100%;
}
body {
margin:0;
height:100%;
}
#map {
width:100%;
height:100%;
} 
	</style>
	
	<!-- scripts -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

	<script type="text/javascript" >
	/**
	 * Commute module (singleton)
	 * 
	 * This module is used to initiate everything and launch the animation through 
	 *COMMUTE.init(document.getElementById("map"));. 
	  
	 * Here's what it does more specifically:
	 * 1) Creates the map
	 * 2) Fetches the list of vehicles, their schedule and their route
	 * 3) Runs an infinite loop that updates each vehicles GPS position according to time
	 * 
	 */
	var COMMUTE = (function() {
	    /**
	     * Default map options
	     */
	  
	    var default_coor = new google.maps.LatLng(10.75913978771365, 106.66536514282234);
		var _mapOptions = {
			zoom: 13,
			center: default_coor,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		//map = new google.maps.Map(document.getElementById("mm-map"), myOptions);
	    return {
	        /**
	         * Frames per second
	         */
	        FPS: 10,
	        debug: true,
	        
	        /**
	         * @param {DOMElement} map_container DOM element where to draw the map
	         */
	        init: function(map_container) {
	            /* init map */
	            this.initMap(map_container);
	            
	            this.mockup(); // populate vehicles with fake vehicle objects
	            this.run();
	        },
	        
	        run: function() {
	            // Launch this.refresh "FPS" times per second
	            var refresh_rate = 1000 / this.FPS;
	            var that = this;
	            setInterval(function() {
	                that.refresh();
	            }, refresh_rate);
	        },
	        
	        refresh: function() {
	            for(var i in this.vehicles) {
	                var vehicle = this.vehicles[i];
	                
	                /* refresh() is executed this.FPS times per second */
	                var latlng = vehicle.getLatLng();
	                console.log(latlng);
	                if (latlng) {
	                    //new google.maps.Marker({map: COMMUTE.map, position: latlng});
	                    vehicle.marker.setPosition(latlng);
	                }
	            }
	        },
	        
	        /**
	         * Populates vehicles with mockup objects
	         */
	        mockup: function() {
	            /**
	             * Mockup vehicles
	             */
	            var autobus164 = new Vehicle("Autobus 164");
	            
	            /**
	             * Mockup routes
	             */
	            var cp_hb_tolhurst = new google.maps.LatLng(10.54618811983987, 106.67327973246574);
	            var cp_gouin_tolhurst = new google.maps.LatLng(10.54821567388476, 106.67987394332886);
	            var cp_gouin_stlaurent = new google.maps.LatLng(10.55137463551124, 106.67438077926636);
	            var cp_hb_stlaurent = new google.maps.LatLng(10.55035247214096, 106.6709475517273);
	            var cp_stlaurent_fleury = new google.maps.LatLng(10.548513959010506, 106.66489380598068);
	            
	            var autobus164_checkpoints = [cp_gouin_tolhurst, cp_hb_tolhurst, cp_gouin_stlaurent,cp_hb_stlaurent, cp_stlaurent_fleury];
	            
	            autobus164.route = new Route();
	            
	            var self = this;
	            RouteUtil.generateRoute(function(res) {
	                var path = res.path;
	                var checkpoints = res.checkpoints;
	                var checkpointsIndexInPath = res.checkPointsIndexInPath;
	                autobus164.route.setPath(path);
	                autobus164.route.setCheckpoints(autobus164_checkpoints);
	                
	                /**
	                 * DRAW ROUTE + CHECKPOINTS FOR DEBUGGING
	                 */
	                if(COMMUTE.debug) {
	                    // Draw route
	                    new google.maps.Polyline({map: COMMUTE.map, path: autobus164.route.getPath()});
	                    // Put markers on checkpoints
	                    for(var i in checkpoints){
	                        var checkpoint = checkpoints[i];
	                        new google.maps.Marker({map: COMMUTE.map, position: checkpoint});
	                    }
	                }
	                
	                /**
	                 * Mockup schedules
	                 */
	                var now = new Date();
	                var delay1 = new Date(now.getTime() + 20 /* second */ * 1000);
	                var delay2 = new Date(now.getTime() + 40 /* second */ * 1000);
	                var delay3 = new Date(now.getTime() + 360 /* second */ * 1000);
	                
	                autobus164.schedule = new Schedule();
	                autobus164.schedule.add(now, res.checkpoints[0]);
	                autobus164.schedule.add(delay1, res.checkpoints[1]);
	                autobus164.schedule.add(delay2, res.checkpoints[2]);
	                autobus164.schedule.add(delay3, res.checkpoints[3]);
	                
	                self.addVehicle(autobus164);


	                autobus164.schedule = new Schedule();
	                autobus164.schedule.add(now, res.checkpoints[0]);
	                autobus164.schedule.add(delay3, res.checkpoints[1]);
	                autobus164.schedule.add(delay1, res.checkpoints[2]);
	                autobus164.schedule.add(delay3, res.checkpoints[3]);
	                
	                self.addVehicle(autobus164);
	            }, autobus164_checkpoints);
	        },

	        initMap: function(map_container) {
	            /* init map */
	            this.map = new google.maps.Map(map_container, _mapOptions);
	        },
	        
	        /**
	         * Add vehicle and associate marker to it
	         * 
	         * @param {Vehicle} vehicle
	         */
	        addVehicle: function(vehicle) {
	            vehicle.marker = new google.maps.Marker({map: COMMUTE.map, title: name, icon: "<?php echo base_url()?>public/img/Skins/tab_img_end.png"});
	            this.vehicles.push(vehicle);
	        },
	        
	        vehicles: []
	    };
	}());

	/**
	 * Vehicle class
	 * 
	 * @param {string} name
	 */
	var Vehicle = function(name) {
	    this.name = name;
	    this.schedule = {};
	    this.route = {};
	    this._latlng = {};
	    
	    this.getLatLng = function() {
	        /* get current position according to time/schedule */
	        try {
	            var next = this.schedule.getNext();
	            var previous = this.schedule.getPrevious();
	            
	            var now = new Date();
	            var time_since_previous_checkpoint = now - previous.date;
	            var time_delta = next.date - previous.date;
	            
	            var progress_since_previous_checkpoint = time_since_previous_checkpoint / time_delta;
	            
	            var subpath = this.route.getSubpath(previous.checkpoint, next.checkpoint);
	            
	            //console.log(subpath);
	            console.log('Progress since last checkpoint: ' + progress_since_previous_checkpoint);
	            return RouteUtil.getLatLng(subpath, progress_since_previous_checkpoint);
	        }
	        catch(e) {
	            console.log(e);
	        }
	    }
	}

	/**
	 * Schedule class
	 * 
	 * A schedule consists of a queue of checkpoints. A checkpoint is a time <-> latlng association.
	 * 
	 * @todo: Righ now, we assume earlier checkpoints are pushed first. Behaves like a queue.
	 */
	var Schedule = function() {
	    this._queue = [];
	    this._previousIndex = 0;
	    this.add = function(date, checkpoint) {
	        // Make sure date is later than array's last element
	        if(this._queue.length == 0 || this._queue[this._queue.length-1].date < date) {
	            this._queue.push({date: date, checkpoint: checkpoint});
	        }
	        // Otherwise, insert in the right order
	        else {
	            // todo...
	            console.error("Todo: Insert in right position in queue so we keep it ordered by date...");
	        }
	    }
	    this.getNext = function() {
	        var previousIndex = this._getPreviousIndex();
	        return this._queue[previousIndex + 1];
	    }
	    this.getPrevious = function() {
	        var previousIndex = this._getPreviousIndex();
	        return this._queue[previousIndex];
	    }
	    // Puts the previous index at the right place considering time
	    this._getPreviousIndex = function() {
	        var now = new Date();
	        var previous = this._queue[this._previousIndex];
	        var next = this._queue[this._previousIndex + 1];
	        
	        if (typeof next == 'undefined') throw "Nothing scheduled for the future!"
	        
	        if (now >= next.date) {
	            this._previousIndex++;
	        }
	        else if (now <= previous.date) {
	            this._previousIndex--;
	        }
	        return this._previousIndex;
	    }
	}

	/**
	 * Route class
	 */
	var Route = function() {
	    this._path = [];
	    this._checkpoints = [];
	    this.setPath = function(path) {
	        this._path = path;
	    }
	    this.getPath = function() {
	        return this._path;
	    }
	    this.setCheckpoints = function(checkpoints) {
	        this._checkpoints = checkpoints;
	    }
	    this.getSubpath = function(checkpoint1, checkpoint2) {
	        var index1 = this._checkpointPathIndex(checkpoint1);
	        var index2 = this._checkpointPathIndex(checkpoint2);
	        index2++; // slice is non inclusive
	        if(index2 == this._path.length)
	            return this._path.slice(index1);
	        else 
	            return this._path.slice(index1, index2);
	    }
	    this._checkpointPathIndex = function(checkpoint) {
	        //console.log('Looking for ' + checkpoint);
	        for(var i in this._path) {
	            if(this._path[i].equals(checkpoint)) {
	                return i;
	            }
	        }
	        console.error('Checkpoint ' + checkpoint + ' not found in path.');
	    }
	}

	/**
	 * RouteUtil module (singleton)
	 */
	var RouteUtil = (function() {
	    return {
	        /**
	         * Generates the smallest route between a set of checkpoints
	         * 
	         * @param {Array} checkpoints
	         * @param {Array} waypoints
	         */
	        generateRoute: function(callback, checkpoints) {
	            var path = [];
	            
	            var drnService = new google.maps.DirectionsService();
	            function genPath(i) {
	                var drnRequest = {
	                    origin: checkpoints[i],
	                    destination: checkpoints[i+1],
	                    travelMode: google.maps.DirectionsTravelMode.DRIVING
	                }
	                drnService.route(drnRequest, function(drnRes, drnStatus) {
	                    // We take the first found route
	                    var drnRoute = drnRes.routes[0];
	                    var current_path = drnRoute.overview_path;
	                    console.log(current_path);
	                    // Discard last position
	                    var last_position = current_path.pop();
	                    // Correct our checkpoint
	                    checkpoints[i] = current_path[0];
	                    path = path.concat(current_path);
	                    
	                    // Next is not last checkpoint
	                    if (i + 1 < checkpoints.length - 1) {
	                        genPath(i + 1);
	                    }
	                    else {
	                       // Put back last position
	                       path.push(last_position);
	                       // Update last checkpoint
	                       checkpoints[i+1] = last_position;
	                       //Callback
	                       callback({path: path, checkpoints: checkpoints});
	                    }
	                });
	            }
	            
	            genPath(0);
	        },
	        
	        getLatLng: function(path, distance_ratio) {
	            console.log('Current path segment: ' + path);
	            var segment_distances = [0];
	            var total_distance = 0;
	            for (var i = 1; i < path.length; i++) {
	                total_distance += this.getDistance(path[i-1], path[i]);
	                segment_distances.push(total_distance);
	            }
	            
	            console.log('Segment distances: ' + segment_distances);
	            
	            var current_distance = distance_ratio * total_distance; 
	            
	            for (var i = 0; i < path.length-1; i++) {
	                if (segment_distances[i+1] < current_distance) continue;
	            
	                var distance_in_segment = current_distance - segment_distances[i];
	                var segment_length = segment_distances[i+1] - segment_distances[i];
	                var ratio_in_segment = distance_in_segment / segment_length;
	                
	                var delta_lat = path[i+1].lat() - path[i].lat();
	                var delta_lng = path[i+1].lng() - path[i].lng();
	                
	                var lat = path[i].lat() + ratio_in_segment * delta_lat;
	                var lng = path[i].lng() + ratio_in_segment * delta_lng;
	                
	                return new google.maps.LatLng(lat, lng);
	            }
	        },
	        
	        /**
	         * Not very accurate way to compute distance between 2 GPS coords
	         * @param {Object} latlng1
	         * @param {Object} latlng2
	         */
	        getDistance: function(latlng1, latlng2) {
	            var delta_lat = latlng2.lat() - latlng1.lat();
	            var delta_lng = latlng2.lng() - latlng1.lng();
	            
	            var distance = Math.sqrt(Math.pow(delta_lat, 2) + Math.pow(delta_lng, 2));
	            return distance;
	        }
	    };
	})();
		
	</script>
	<script type="text/javascript">
		window.onload = function(){
			COMMUTE.init(document.getElementById("map"));
		};
	</script>
	
	<script language="Javascript">
	setInterval(function() {
      var curtime = new Date();
      var curhour = curtime.getHours();
      var curmin = curtime.getMinutes();
      var cursec = curtime.getSeconds();
	  
	  document.getElementById("clock").innerHTML = curhour + ":" + curmin + ":" + cursec;
	}, 1000);	 
	</script>

</head>
<body>
	<div id="clock"></div>
	<div id="map"></div>
</body>

</html>
