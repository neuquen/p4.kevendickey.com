
$('.updateIncome').click(function() {
	var options = {
		type: "POST",
		url: "/profile/add",
		beforeSubmit: function(){
			$('#results').html("Updating...")
		},
		success: function(response){
			$('#results').html("Updated on " + currentDate);
			addIncome();
		}		
	}
	
	$('.form-income').ajaxForm(options);
});

$('.updateExpenses').click(addExpenses);

function addIncome () {
	console.log("Updated Income");
	
	var input = $('.form-income :input');
	
	var total = 0;
	input.each(function(){
		total += Number($(this).val());
	});
	
	// Truncate trailing zeros
	total = (total).toFixed(2);
	
	$('#output-income').html("$" + total);
	$('#total-income').val(total);
}

function addExpenses () {
	console.log("Updated Expenses")
	
	var input = $('.form-expenses :input');
	
	var total = 0;
	input.each(function(){
		total += Number($(this).val());
	});
	
	// Truncate trailing zeros
	total = (total).toFixed(2);
	
	$('#output-expenses').html("$" + total);
	
}


var d = new Date();
var currentDay = d.getDate();
var currentMonth = d.getMonth() + 1; //Months are zero based
var currentYear = d.getFullYear();
var currentHours = d.getHours();

    if (currentHours < 12){
    	AMPM = "AM";
    } else {
    	AMPM = "PM";
    }
    
    if (currentHours == 0) {
    	currentHours = 12;
    }
    
    if (currentHours > 12){
    	currentHours = currentHours - 12;
    }

var currentMinutes = d.getMinutes();

    currentMinutes = currentMinutes + ""; //Convert to string in order to check length

    if (currentMinutes.length == 1){
    	currentMinutes = "0" + currentMinutes;
    }

var currentSeconds = d.getSeconds();

var currentDate = currentMonth + "/" + currentDay + "/" + currentYear + " at " + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + AMPM;