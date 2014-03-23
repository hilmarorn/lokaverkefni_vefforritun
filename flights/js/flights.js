var lang = 'en';
var type = 'departures';
var json;

$(function() {

	$("input:radio[name=language]").click(function() {
		lang = $(this).val();
		update();
	});
	
	$("input:radio[name=flight-type]").click(function() {
		type = $(this).val();
		update();
	});
	
	update();
});

function update() {
	if(lang == null || type == null)
		return 0;
	
	$.getJSON('php/ajax.php?language=' + lang + '&type=' + type, function(data) {
		json = data;
		insertItems();
	});
}

function insertItems() {
	
	var html = '';
	
	var heading = '';
	
	if(lang === 'is'){
		heading += '<div class="flights" id="headFlight">' + '<div class="parDiv">' + "<p>" + "Dagur: " + "</p>" + "</div>" + 
				'<div class="parDiv">' + "<p>" + "Flugnúmer: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Flugvöllur: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Áætluð brottför: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Áætluð koma: " + "</p>" + "</div>" + 
				'<div class="parDiv">' + "<p>" + "Flugfélag: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Staðfest: " + "</p>" + "</div>" + "</div>";
		$('#depLabel').html("Brottfarir");
		$('#arrLabel').html("Komur");

	}
	if(lang === 'en'){
		heading += '<div class="flights" id="headFlight">' + '<div class="parDiv">' + "<p>" + "Day: " + "</p>" + "</div>" + 
				'<div class="parDiv">' + "<p>" + "Flightnumber: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Ariport: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Schedule departure: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Schedule arrival: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Airline: " + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + "Confirmed: " + "</p>" + "</div>" + "</div>";
		$('#depLabel').html("Departures");
		$('#arrLabel').html("Arrivals");

	}

	html += heading;

	$.each(json.results, function(key, val) {
		var temp = val.undefined;
		
		if(temp === undefined && lang === 'is'){
			temp = "Hefur ekki lent";
		}
		if(temp === undefined && lang === 'en'){
			temp = "Has not landed";
		}
		
		html += '<div class="flights" id="' + key + '">' +
				'<div class="parDiv">' + "<p>" + val.date + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + val.flightNumber + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + val.plannedArrival + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + val.realArrival + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + val.status + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + val.to + "</p>" + "</div>" +
				'<div class="parDiv">' + "<p>" + temp + "</p>" + "</div>" +
				"</div>";
	});
	
	$('#contentFlight').html(html);
}
