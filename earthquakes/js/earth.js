var map;
var json;

$(function() {
	update();
	googleMaps();
});

function update() {
	$.getJSON("php/ajax.php", function(data) {
		json = data;
		insertItems();
	});
}

function insertItems() {
	var markers = [];
	for(var i = 0; i < json.results.length; i++) {
		markers[i] = new Array(3);
		markers[i][0] = json.results[i].latitude;
		markers[i][1] = json.results[i].longitude;
		markers[i][2] = "<h4>" + json.results[i].humanReadableLocation + "</h4>" + 
						"<p> Size: " + json.results[i].size + " richter" + "</p>" + 
						"<p> Depth: " + json.results[i].depth + " km" + "</p>" + 
						"<p>" + getDate(json.results[i].timestamp) + "</p>";
	}
	addMarker(markers);
}

function getDate(date) {
	var newDate = new Date(date);
	var str = newDate.toString().split(" ");

	switch(str[0]) {
		case 'Mon':
			return 'Monday ' + str[2] + ' ' + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
		case 'Tue':
			return 'Tuesday ' + str[2] + ' '  + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
		case 'Wed':
			return 'Wednesday ' + str[2] + ' '  + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
		case 'Thu':
			return 'Thursday ' + str[2] + ' '  + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
		case 'Fri':
			return 'Friday ' + str[2] + ' '  + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
		case 'Sat':
			return 'Saturday ' + str[2] + ' '  + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
		case 'Sun':
			return 'Sunday ' + str[2] + ' '  + str[1] + '<br/>' + 'Time: ' + str[4];
			break;
	}
}

function googleMaps() {
	var map_canvas = document.getElementById('map-canvas');
	var map_options = {
      center: new google.maps.LatLng(64.758904, -18.661866),
      zoom: 6,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
	map = new google.maps.Map(map_canvas, map_options);
}

function addMarker(markers) {
	var infowindow = new google.maps.InfoWindow({});
	var globalMarkers = [];
	
	for (var i = 0; i < markers.length; i++) {
        // obtain the attribues of each marker
        var lat = parseFloat(markers[i][0]);
        var lng = parseFloat(markers[i][1]);
        var trailhead_name = markers[i][2];

        var myLatlng = new google.maps.LatLng(lat, lng);

        var contentString = "<html><body><div><p><h2>" + trailhead_name + "</h2></p></div></body></html>";

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "Coordinates: " + lat + " , " + lng + " | Trailhead name: " + trailhead_name
        });

        marker['infowindow'] = contentString;

        globalMarkers[i] = marker;

        google.maps.event.addListener(globalMarkers[i], 'click', function() {
            infowindow.setContent(this['infowindow']);
            infowindow.open(map, this);
        });
    }
}
