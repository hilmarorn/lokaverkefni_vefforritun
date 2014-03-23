var map;
var json;
var markers = [];

$(function() {
	googleMaps();
	
	$('select#busSelect').change(function() {
		updateLayout($(this).val());
	});
	
});

function googleMaps() {
	var map_canvas = document.getElementById('map-canvas');
	var map_options = {
      center: new google.maps.LatLng(64.143146, -21.915628),
      zoom: 11,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
	map = new google.maps.Map(map_canvas, map_options);
}

function updateLayout(bus) {

	if(bus != null)
		bus = '?busses=' + bus;
	else
		bus = '';

	$.getJSON("php/ajax.php" + bus, function(data) {
		json = data;
		insertItems();
	});
	
}
	
function insertItems() {
	
	var selected = $('select').val();
	var location = [];
	var html = '';
	
	$.each( json.results, function(key, val) {
		if(selected === val.busNr) {
			html += '<p id="busNr"><strong>' + "Bus number: " + val.busNr + "</strong></p>"
			$.each(val.busses, function(skey, sval) {
				if(sval.from !== ' ' && sval.to !== ' ') {
					if(sval.from.indexOf("/") === -1)
						location.push(sval);
					else {
						sval.from = sval.from.substring(0, sval.from.indexOf("/")-1);
						location.push(sval);
					}
				}
			});
		}		
	});
	printBusses(location, html);
}

function printBusses(busArray, info) {
	if(info === '') {
		info = 'This route is currently not running.';
		$('#content').html(info);
		return;
	}	
	
	for(var j = 0; j < busArray.length; j++) {
		for(var i = 1; i < busArray.length; i++) {
			if(busArray[j].from === busArray[i].from)
				busArray.splice(i, 1);
		}
	}

	$.each(busArray, function(key, val) {
		var time = unixTimeToTime(val.unixTime);
		info += '<div id="bus'+key+'" class="busDiv">' + "<p>" + "Arrives: " + time + "</p>";
		info += "<p>" + "From: " + val.from + "</p>";
		info += "<p>" + "To: " + val.to + "</p>" + "</div>";
	});
	
	addMarker(busArray);
	$('#content').html(info);
}

function addMarker(places) {
	for(var i = 0; i < places.length; i++) {
		var markerText = "<p> Arrives: " + unixTimeToTime(places[i].unixTime) + "</p>" +
					"<p> From: " + places[i].from + "</p>" +
					"<p> To: " + places[i].to + "</p>";
		geoCode(places[i].from, markerText);
	}
}

function geoCode(address, info) {
	if(markers.length !== 0) {
		for (var i = 0; i < markers.length; i++ ) {
			markers[i].setMap(null);
		}
		markers = [];
	}
	
	var geocoder = new google.maps.Geocoder();
	var infowindow = new google.maps.InfoWindow({});
	
	geocoder.geocode({'address': address}, function(results, status) {
		if(status == google.maps.GeocoderStatus.OK) {
			var marker = new google.maps.Marker({  
					map: map,  position: results[0].geometry.location 
			});
			
			marker['infowindow'] = info;
			
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(marker['infowindow']);
				infowindow.open(map, marker);
			});
			
			markers.push(marker);
		}
		else {
			alert('Did not get address because: ' + status);
		}
	});
}

function unixTimeToTime(unixTime) {
	var date = new Date(unixTime*1000);
	var minutes = date.getMinutes();

	//Til þess að fá mínúturnar rétt ef þær eru ekki komnar í tuginn
	if(minutes < 10)
		minutes = '0' + minutes;
	
	return date.getHours() + ":" + minutes;
}
