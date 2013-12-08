/****************************************************************************************************
 * EVENT LISTENERS
 ****************************************************************************************************/

$('#update-income').click(function() {
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

$('#update-expenses').click(function(){
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


$('#clear-income').click(function() {
	var options = {
		type: "POST",
		url: "/profile/clearIncome",
		beforeSubmit: function(){
			var answer = confirm('Are you sure you want to clear your total income?');
			var expenses = $('#output-expenses').html().replace("$", "");
			
			if (!answer) {
				return false;
			}
			
			if (expenses != 0){
				alert('Your expenses cannot be greater than your income... \n...it\'s simple math... It\'s a good thing I\'m here to remind you.  \n\nPlease clear your expenses first.');
				return false;
			}
	
		},
		success: function(response){
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
            
            // Inject the data into the page
            $('#output-income').html("$" + total['expenses']);
		}		
	}
	
	$('.form-clear-income').ajaxForm(options);
});


$('#clear-expenses').click(function() {
	var options = {
		type: "POST",
		url: "/profile/clearExpenses",
		beforeSubmit: function(){
			var answer = confirm('Are you sure you want to clear your total expenses?');
			if (!answer) {
				return false;
			}
		},
		success: function(response){
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
            
            // Inject the data into the page
            $('#output-expenses').html("$" + total['expenses']);
		}		
	}
	
	$('.form-clear-expenses').ajaxForm(options);
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
	
	var income = $('#output-income').html().replace("$", "");
	income = Number(income);
	
	if (total > income){
		alert("Someone's been spending too much money... I'm sorry but unless you are the government, you can't continue... \n\n...not that they should either...");
		return false;
	} else {
		$('#total-expenses').val(total);
		
	}	
}


function percentage() {
	var income = $('#output-income').html().replace("$", "");
	var expenses = $('#output-expenses').html().replace("$", "");
	
	income = Number(income);
	expenses = Number(expenses);
	
	percentExpenses = (expenses/income) * 100;
	percentIncome = 100 - percentExpenses;
	
	//console.log(percentExpenses);
	//console.log(percentIncome);
	
	$('.progress-bar-expenses').css("width", percentExpenses + "%");
	$('.progress-bar-income').css("width", percentIncome + "%");
	
	if (percentExpenses > 50 && percentExpenses < 80){
		$('.progress-bar-expenses').removeClass('progress-bar-success').addClass('progress-bar-warning');
	} else if (percentExpenses >= 80){
		$('.progress-bar-expenses').removeClass('progress-bar-success progress-bar-warning').addClass('progress-bar-danger');
	} else {
		$('.progress-bar-expenses').addClass('progress-bar-success');
	}

}


/****************************************************************************************************
 * MOMENT.JS - DATE FUNCTION
 ****************************************************************************************************/
var currentDate = moment().format('MMMM Do YYYY, h:mm a');
//var currentDate = moment().startOf('minute').fromNow();


/****************************************************************************************************
 * FORM VALIDATION
 ****************************************************************************************************/
// Adds HTML5 validation to form inputs
// Only allows numbers and '.' in budget input forms (ex, 0123. 012.3 01.23 0.123 and .0123)
$( ".input-group input" ).attr("pattern", '\\d+(\\.\\d*)?|\\.\\d+').attr('title','Only whole numbers and decimals allowed.');

/*
// Prevents empty fields in signup form
window.onload = function(){
    var signup = document.getElementById('signup');
	//var budgetForms = document.document.getElementsByClassName('form-control');
    //var signup = $('#signup')[0];
    var budgetForms = $('.form-clear-income, .form-clear-expenses')[0];
    signup.onkeydown = preventSpace;
    signup.onpaste = preventPaste;
    
    budgetForms.onkeydown = preventSpace;
    budgetForms.onpaste = preventPaste;
    budgetForms.onkeydown = isNumberKey(e);
};

function preventSpace(e){
    var e = e || event;
    if (e.keyCode == 32) return false;  
}

function preventPaste(e){
    var e = e || event;
    var data = e.clipboardData.getData("text/plain");
    if (data.match(/\s/g)) return false;    
}

function isNumberKey(e){
   var charCode = (e.which) ? e.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

form.onsubmit = function(){
    return textarea.value.match(/^\d+(\.\d+)?$/);
}
*/

