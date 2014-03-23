var json;
var currencyInfo = [];

$(function() {
	
	$.getJSON("php/ajax.php", function(data) {
		json = data;
		insertToArray();
	});
	
	$("input[type='text']").keyup(function() {
		if(this.id === 'ISK') 
			calcCurrFromISK($(this).val());
		else	
			calcCurr(this.id, $(this).val())
	});
	
	$('#more').click(function() {
		$('#hidden').show();
		$('#more').hide();
	});
	
	$('#less').click(function() {
		$('#hidden').hide();
		$('#more').show();
	});
	
	$('#hidden').hide();
});

function calcCurr(id, value) {
	var j, temp, tempValue;
	
	for(j = 0; j < currencyInfo.length; j++) {
		if(id === currencyInfo[j][0]) {
			temp = j
			tempValue = value*currencyInfo[j][1];
		}
	}
	
	for(i = 0; i < currencyInfo.length; i++) {
		if(i !== temp) {
			var number = tempValue/currencyInfo[i][1];
			$("input[type='text']#" + currencyInfo[i][0]).val(number.toFixed(2));
		}
		else {
			var toISK = value*currencyInfo[i][1];
			$("input[type='text']#ISK").val(toISK.toFixed(2));
		}
	}
}

function calcCurrFromISK(value) {
	for(i = 0; i < currencyInfo.length; i++) {
		var number = value/currencyInfo[i][1];
		$("input[type='text']#" + currencyInfo[i][0]).val(number.toFixed(2));
	}
}

function insertToArray() {
	for(var i = 0; i < json.results.length; i++) {
		currencyInfo[i] = new Array(2);
		currencyInfo[i][0] = json.results[i].shortName;
		currencyInfo[i][1] = json.results[i].askValue;
	}
}