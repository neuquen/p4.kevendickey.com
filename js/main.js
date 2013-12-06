/****************************************************************************************************
 * EVENT LISTENERS
 ****************************************************************************************************/

$('.updateIncome').off('click').on('click', function() {
	var options = {
		type: "POST",
		url: "/profile/update",
		beforeSerialize: function(){
            addIncome();
		},
		beforeSubmit: function(){
			$('.resultsIncome').html("Updating...")
		},
		success: function(response){
			$('.resultsIncome').html("Updated on " + currentDate);
			
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
            
            // Inject the data into the page
            $('#output-income').html("$" + total['income']);
		}		
	}
	
	$('.form-income').ajaxForm(options);
}); 

$('.updateExpenses').off('click').on('click', function(){
	var options = {
		type: "POST",
		url: "/profile/update",
		beforeSerialize: function(){
            addExpenses();
		},
		beforeSubmit: function(){
			$('.resultsExpenses').html("Updating...")
		},
		success: function(response){
			$('.resultsExpenses').html("Updated on " + currentDate);
			
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
            
            // Inject the data into the page
            $('#output-expenses').html("$" + total['expenses']);
		}		
	}
	
	$('.form-expenses').ajaxForm(options);
});


// When page is ready, calculate percentage
$(window).load(percentage);

// When totals change, recalculate percentage
$('.progress').bind("DOMSubtreeModified",function(){
	  percentage();
});


/****************************************************************************************************
 * CUSTOM FUNCTIONS
 ****************************************************************************************************/

// Grab the user inputs and return a total
function addIncome () {
	console.log("Updated Income");
	
	var input = $('.form-income :input').not("input[name='income']");
	
	// Loop through form inputs
	var total = 0;
	input.each(function(){
		total += Number($(this).val());
	});
	
	// Truncate trailing zeros
	total = (total).toFixed(2);
	
	// Grab current Total
	var currentTotal = $('#output-income').html().replace("$", "");
	
	// Convert strings to numbers
	total = Number(total) + Number(currentTotal);
	
	// Output to hidden form field, to be sent with form
	$('#total-income').val(total);
}


//Grab the user inputs and return a total
function addExpenses () {
	console.log("Updated Expenses")
	
	var input = $('.form-expenses :input').not("input[name='expenses']");
	
	// Loop through form inputs
	var total = 0;
	input.each(function(){
		total += Number($(this).val());
	});
	
	// Truncate trailing zeros
	total = (total).toFixed(2);
	
	// Grab current Total
	var currentTotal = $('#output-expenses').html().replace("$", "");
	
	// Convert strings to numbers
	total = Number(total) + Number(currentTotal);
	
	$('#total-expenses').val(total);
	
}


function percentage() {
	var income = $('#output-income').html().replace("$", "");
	var expenses = $('#output-expenses').html().replace("$", "");
	
	income = Number(income);
	expenses = Number(expenses);
	
	percentExpenses = (expenses/income) * 100;
	percentIncome = 100 - percentExpenses;
	
	console.log(percentExpenses);
	console.log(percentIncome);
	
	$('.progress-bar-expenses').css("width", percentExpenses + "%");
	$('.progress-bar-income').css("width", percentIncome + "%");
	
	if (percentExpenses > 50 && percentExpenses < 80){
		$('.progress-bar-expenses').removeClass('progress-bar-success').addClass('progress-bar-warning');
	} else if (percentExpenses > 80){
		$('.progress-bar-expenses').removeClass('progress-bar-success progress-bar-warning').addClass('progress-bar-danger');
	} else {
		$('.progress-bar-expenses').addClass('progress-bar-success');
	}

}


/****************************************************************************************************
 * CUSTOM DATE FUNCTION
 ****************************************************************************************************/

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

	currentSeconds = currentSeconds + ""; //Convert to string in order to check length
	
	if (currentSeconds.length == 1){
		currentSeconds = "0" + currentSeconds;
	}

var currentDate = currentMonth + "/" + currentDay + "/" + currentYear + " at " + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + AMPM; 