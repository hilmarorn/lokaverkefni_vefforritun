var lang;
var station;
var json;

$(function() {
	
	$('select#stationNR').change(function() {
		station = ($(this).val());
		update();
	});
	
	$("input:radio[name=language]").change(function() {
		lang = $(this).val();
		update();
	});
	
	station = $('select#stationNR').val();
	lang = $("input:radio[name=language]#langEN").val();
	update();
});

function update() {
	$.getJSON('http://apis.is/weather/forecasts/' + lang + '/?stations=' + station, function(data) {
		json = data;
		insertItems(0);
		initSlider(json.results);
	});
}

function initSlider(value) {
	$('#slider').slider({
		min: 0,
		max: value[0].forecast.length,
		step: 1,
		range: false,
		value: 0,
		slide: function(event, ui) {
			insertItems(ui.value);
		}
	});
}

function insertItems(forecastNumber) {
	
	var html = '';
	var forecastArray = json.results[0].forecast;
	if(lang === 'is') {
		html += '<div class="weather">' + "<h3>" + json.results[0].name + "</h3>"
			+ "<p>Veðurspá gerð: </p>"
			+ formattedTime(forecastArray[forecastNumber].ftime)
			+ "<p> Veðurskilyrði: " + forecastArray[forecastNumber].W + "</p>"
			+ "<p> Hitastig: " + forecastArray[forecastNumber].T + "</p>"
			+ "<p> Vindátt: " + forecastArray[forecastNumber].D + "</p>"
			+ "<p> Metrar á sek: " + forecastArray[forecastNumber].F + "</p>";
	} else {
		html += '<div class="weather">' + "<h3>" + json.results[0].name + "</h3>"
			+ "<p>Forecast made: </p>"
			+ formattedTime(forecastArray[forecastNumber].ftime)
			+ "<p> Weather conditions: " + forecastArray[forecastNumber].W + "</p>"
			+ "<p> Temperature: " + forecastArray[forecastNumber].T + "</p>"
			+ "<p> Wind direction: " + forecastArray[forecastNumber].D + "</p>"
			+ "<p> Meters per sec: " + forecastArray[forecastNumber].F + "</p>";
	}
		
	$('#content').html(html);
}

function formattedTime(time) {
	var array = time.split(" ");
	var date = array[0].split("-");
	
	switch(date[1]) {
		case '1':
			if(lang === 'is')
				date[1] = 'janúar';
			else
				date[1] = 'January';
			break;
		case '2':
			if(lang === 'is')
				date[1] = 'febrúar';
			else
				date[1] = 'February';
			break;
		case '3':
			if(lang === 'is')	
				date[1] = 'mars';
			else
				date[1] = 'March';
			break;
		case '4':
			if(lang === 'is')
				date[1] = 'apríl';
			else
				date[1] = 'April';
			break;
		case '5':
			if(lang === 'is')
				date[1] = 'maí';
			else
				date[1] = 'May';
			break;
		case '6':
			if(lang === 'is')	
				date[1] = 'júní';
			else
				date[1] = 'June';
			break;
		case '7':
			if(lang === 'is')
				date[1] = 'júlí';
			else
				date[1] = 'July';
			break;
		case '8':
			if(lang === 'is')
				date[1] = 'ágúst';
			else
				date[1] = 'August';
			break;
		case '9':
			if(lang === 'is')
				date[1] = 'september';
			else
				date[1] = 'September';
			break;
		case '10':
			if(lang === 'is')
				date[1] = 'október';
			else
				date[1] = 'October';
			break;
		case '11':
			if(lang === 'is')	
				date[1] = 'nóvember';
			else
				date[1] = 'November';
			break;
		case '12':
			if(lang === 'is')	
				date[1] = 'desember';
			else
				date[1] = 'December';
			break;
	}
	
	var formTime = array[1].split(":");
	
	if(lang === 'is')
		var timestamp = "</p>" + '<p> Klukkan: ' + formTime[0] + ':' + formTime[1] + '</p>';
	else
		var timestamp = "</p>" + '<p> Time: ' + formTime[0] + ':' + formTime[1] + '</p>'
		
	return "<p>" + date[2] + '. ' + date[1] + "</p>" + timestamp;
}

function getTime(time) {
	var array = time.split(" ");
	var formTime = array[1].split(":");
	return formTime[0];
}