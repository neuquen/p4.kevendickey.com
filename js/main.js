$('.updateIncome').click(addIncome);
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