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
			$('.resultsIncome').html("Updating...");
			$('.form-income :input').val('');
		},
		success: function(response){
			$('.resultsIncome').html("<span class='glyphicon glyphicon-ok'></span> Updated on " + currentDate());
			
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
			
            // Inject the data into the page
            $('#output-income').html("$" + total['income']);
            
            // Re-load percentage and chart
            percentage();
            loadChart();
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
			$('.resultsExpenses').html("Updating...");
			$('.form-expenses :input').val('');
		},
		success: function(response){
			$('.resultsExpenses').html("<span class='glyphicon glyphicon-ok'></span> Updated on " + currentDate());
			
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
            
            // Inject the data into the page
            $('#output-expenses').html("$" + total['expenses']);
            outputExpensesBreakdown(response);
            
            // Re-load percentage and chart
            percentage();
            loadChart();
		}		
	}
	
	$('.form-expenses').ajaxForm(options);
});


$('#clear-income').click(function() {
	var options = {
		type: "POST",
		url: "/profile/clearIncome",
		beforeSubmit: function(){
			var answer = confirm('Are you sure you want to clear your income?');
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
            
            // Re-load percentage and chart
            percentage();
            loadChart();
		}		
	}
	
	$('.form-clear-income').ajaxForm(options);
});


$('#clear-expenses').click(function() {
	var options = {
		type: "POST",
		url: "/profile/clearExpenses",
		beforeSubmit: function(){
			var answer = confirm('Are you sure you want to clear your expenses?');
			if (!answer) {
				return false;
			}
		},
		success: function(response){
			// Parse the JSON results into an array
            var total = $.parseJSON(response);
            
            // Inject the data into the page
            $('#output-expenses').html("$" + total['expenses']);
            outputExpensesBreakdown(response);
            
            // Re-load percentage and chart
            percentage();
            loadChart();
		}		
	}
	
	$('.form-clear-expenses').ajaxForm(options);
});

// When the page is ready, load the progress bar and pie chart
$(document).ready(function() {
    percentage();
    loadChart();
});



/****************************************************************************************************
 * CUSTOM FUNCTIONS
 ****************************************************************************************************/

// Grab the income and return a total
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
	
	// Output to hidden form field, to be sent with form
	$('#total-income').val(total);
}


//Grab the expenses and return a total
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
	
	var income = $('#output-income').html().replace("$", "");
	var expenses = $('#output-expenses').html().replace("$", "");
	
	income = Number(income);
	totalExpenses = Number(expenses) + Number(total);
	
	if (totalExpenses > income){
		alert("Someone's been spending too much money... I'm sorry but unless you are the government, you can't continue... \n\n...not that they should either...");
		$('.form-expenses :input').val('');
		return false;
	} else {
		$('#total-expenses').val(total);
		
	}	
}


// Output the expenses to the page
function outputExpensesBreakdown(response) {
	var total = $.parseJSON(response);
	
	var input = $('.form-expenses :input').not("input[name='expenses']");
	
	input.each(function(){
		var inputId = this.id;
		$('#output-' + inputId).html("$" + total[inputId]);
	})
}

//Only load the chart if data is present
function loadChart(){
    var currentExpTotal = Number($('#output-expenses').html().replace("$", ""));
    
    if(currentExpTotal == 0){
    	$('#pie').detach();
    } else {
    	if($('#pie').length == 0){
    		$('#expenses-breakdown').append('<canvas id="pie" width="400" height="400"></canvas>');
    	}
    	pieChart();
    }
}

// Calculate percentages of totals
function percentage() {
	var income = $('#output-income').html().replace("$", "");
	var expenses = $('#output-expenses').html().replace("$", "");
	
	income = Number(income);
	expenses = Number(expenses);
	
	percentExpenses = (expenses/income) * 100;
	percentIncome = 100 - percentExpenses;
	
	var stuff = $('.progress-bar-expenses').css("width", percentExpenses + "%");
	var things = $('.progress-bar-income').css("width", percentIncome + "%");
		
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
function currentDate() {
	return moment().format('MMMM Do YYYY, h:mm:ss a');
}

//var currentDate = moment().startOf('minute').fromNow();

/****************************************************************************************************
 * CHART.JS - CUSTOM CHARTS
 ****************************************************************************************************/

function pieChart(){
	
	var housing = Number($('#output-housing').html().replace("$", ""));
	var utilities = Number($('#output-utilities').html().replace("$", ""));
	var food = Number($('#output-food').html().replace("$", ""));
	var automobile = Number($('#output-automobile').html().replace("$", ""));
	var debt = Number($('#output-debt').html().replace("$", ""));
	var medical = Number($('#output-medical').html().replace("$", ""));
	var insurance = Number($('#output-insurance').html().replace("$", ""));
	var personal = Number($('#output-personal').html().replace("$", ""));
	var entertainment = Number($('#output-entertainment').html().replace("$", ""));
	var other = Number($('#output-other').html().replace("$", ""));

	var pieData = [
					{
						value:  housing,
						color:"#FFC901",
						label : 'Housing',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : utilities,
						color : "#E8330C",
						label : 'Utilities',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : food,
						color : "#9100FF",
						label : 'Food/Dining',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : automobile,
						color : "#0CA9E8",
						label : 'Automobile',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : debt,
						color : "#1BFF0D",
						label : 'Loans/Debt',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : medical,
						color : "#D7F700",
						label : 'Medical',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : insurance,
						color : "#E88008",
						label : 'Insurance',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : personal,
						color : "#FF048F",
						label : 'Personal Care',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : entertainment,
						color : "#0816E8",
						label : 'Entertainment',
				        labelColor : 'white',
				        labelFontSize : '18'
					},
					{
						value : other,
						color : "#09FFA9",
						label : 'Other',
				        labelColor : 'white',
				        labelFontSize : '18'
					}
				
				];

	/*****Pure JS******/
	//Get the context of the canvas element we want to select
	var ctx = document.getElementById("pie").getContext("2d");
	var pieChart = new Chart(ctx).Pie(pieData);
	
	/****Shortened JS****/
	//var pieChart = new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);

	/*****jQuery version*******/
	//Get context with jQuery - using jQuery's .get() method.
	//var ctx = $("#pie").get(0).getContext("2d");
	//This will get the first returned node in the jQuery collection.
	//var pieChart = new Chart(ctx).Pie(pieData);	
	
}


/****************************************************************************************************
 * FORM VALIDATION
 ****************************************************************************************************/
// Adds HTML5 validation to form inputs
// Only allows numbers and '.' in budget input forms (ex, 0123. 012.3 01.23 0.123 or .0123) using regex
$( ".input-group input" ).attr("pattern", '\\d+(\\.\\d*)?|\\.\\d+').attr('title','Only positive numbers in decimal form');

// Generic email regex validation to only allow certain formatting for email addresses
$( ".form-signup input[type=email]" ).attr("pattern", "[a-z0-9!#$%&'*+/=?^_{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?").attr('title','Ex. username@emailaddress.com');


// Prevents empty fields in signup form
window.onload = function(){
    //var signup = document.getElementById('signup');
    var signup = $('#signup')[0];
    signup.onkeydown = preventSpace;
    signup.onpaste = preventPaste;
}

function preventSpace(e){
    var e = e || event;
    if (e.keyCode == 32) return false;  
}

function preventPaste(e){
    var e = e || event;
    var data = e.clipboardData.getData("text/plain");
    if (data.match(/\s/g)) return false;    
}


/******
 * Font Size

function fontsize() {
    var fontSize = $(".progress-bar-expenses").width() * .25; // 10% of container width
    console.log(fontSize);
    $(".progress span").css('font-size', fontSize);
};
$(window).resize(fontsize);
$(document).ready(fontsize);

 */