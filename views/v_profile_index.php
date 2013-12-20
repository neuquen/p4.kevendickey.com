
<div class="container profile">

	<div class="intro">
		<h1>Welcome<?php if($user) echo ', '.$user->first_name; ?></h1>
		<p class="lead">To get started, fill out your income.  The amount of money you have to use on expenses will be based on your income.
										Once your expenses are filled out, you can see a breakdown of how much you spend on each item.
										Your totals displayed in the summary bar and expenses breakdown will indicate how well you are doing at not budging.
		</p>								
		<p class="lead">GOOD LUCK! ...and remember... DON'T BUDGE&trade;!</p>
		
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="content">
				<h2>Summary</h2>
				<div class="progress text-center">
					<div class="progress-bar progress-bar-expenses" role="progressbar">
						<span id="output-expenses">$<?php echo $total['expenses']?></span>
					</div>
					<div class="progress-bar progress-bar-income" role="progressbar">
						<span id="output-income">$<?php echo $total['income']?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<div class="content">
				<h2>Income
					<form class="form-clear-income" method="post" action="/profile/clearIncome">
						<button type="submit" class="btn btn-danger btn-xs" id="clear-income"><span class="glyphicon glyphicon-trash"></span> Clear Income</button>
					</form>
				</h2>
			<form class="form-income form-horizontal" role="form" method="post" action="/profile/update">
        <div class="form-group">
            <label for="paycheck" class="control-label col-sm-3">Paycheck/Salary</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="paycheck" />
            </div>
        </div>
        <div class="form-group">
            <label for="investments" class="control-label col-sm-3">Investments</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" id="investments" />
            </div>
        </div>
        <div class="form-group">
            <label for="otherIncome" class="control-label col-sm-3">Other</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="otherIncome" />
            </div>
        </div>
        <input type="text" class="form-control" name="income" id="total-income"/>
        <button class="btn btn-lg btn-primary btn-block" id="update-income" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Update</button>
        <div class="resultsIncome"></div>
    </form>

			</div>
			
			<div class="content" id="expenses-breakdown">
				<h2>Expenses Breakdown</h2>
				<table class="table table-hover">
				  <thead>
					  <tr class="success">
						  <th>Category</th>
						  <th>Total</th>
					  <tr>
				  </thead>
				  <tbody>
					  <tr>
						  <td>Housing</td>
						  <td id="output-housing">$<?php echo $total['housing']?></td>
					  </tr>
					  <tr>
						  <td>Utilities</td>
						  <td id="output-utilities">$<?php echo $total['utilities']?></td>
					  </tr>
					  <tr>
						  <td>Food/Dining</td>
						  <td id="output-food">$<?php echo $total['food']?></td>
					  </tr>
					  <tr>
						  <td>Automobile</td>
						  <td id="output-automobile">$<?php echo $total['automobile']?></td>
					  </tr>
					  <tr>
						  <td>Loans/Debt</td>
						  <td id="output-debt">$<?php echo $total['debt']?></td>
					  </tr>
					  <tr>
						  <td>Medical</td>
						  <td id="output-medical">$<?php echo $total['medical']?></td>
					  </tr>
					  <tr>
						  <td>Insurance</td>
						  <td id="output-insurance">$<?php echo $total['insurance']?></td>
					  </tr>
					  <tr>
						  <td>Personal Care</td>
						  <td id="output-personal">$<?php echo $total['personal']?></td>
					  </tr>
					  <tr>
						  <td>Entertainment</td>
						  <td id="output-entertainment">$<?php echo $total['entertainment']?></td>
					  </tr>
					  <tr>
						  <td>Other</td>
						  <td id="output-other">$<?php echo $total['other']?></td>
					  </tr>
				  </tbody>
				</table>

			</div>
			
			
		</div>
		
		<div class="col-md-6">
			<div class="content">
				<h2>Expenses
					<form class="form-clear-expenses" method="post" action="/profile/clearExpenses">
						<button type="submit" class="btn btn-danger btn-xs" id="clear-expenses"><span class="glyphicon glyphicon-trash"></span> Clear Expenses</button>
					</form>
				</h2>
			<form class="form-expenses form-horizontal" role="form" method="post" action="/profile/update">
        <div class="form-group">
            <label for="housing" class="control-label col-sm-3">Housing</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="housing" id="housing" />
            </div>
        </div>
        <div class="form-group">
            <label for="utilities" class="control-label col-sm-3">Utilities</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" name="utilities" id="utilities" />
            </div>
        </div>
        <div class="form-group">
            <label for="food" class="control-label col-sm-3">Food/Dining</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="food" id="food" />
            </div>
        </div>
        <div class="form-group">
            <label for="automobile" class="control-label col-sm-3">Automobile</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="automobile" id="automobile" />
            </div>
        </div>
        <div class="form-group">
            <label for="debt" class="control-label col-sm-3">Loans/Debt</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" name="debt" id="debt" />
            </div>
        </div>
        <div class="form-group">
            <label for="medical" class="control-label col-sm-3">Medical</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="medical" id="medical" />
            </div>
        </div>
        <div class="form-group">
            <label for="insurance" class="control-label col-sm-3">Insurance</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="insurance" id="insurance" />
            </div>
        </div>
        <div class="form-group">
            <label for="personal" class="control-label col-sm-3">Personal Care</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" name="personal" id="personal" />
            </div>
        </div>
        <div class="form-group">
            <label for="entertainment" class="control-label col-sm-3">Entertainment</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="entertainment" id="entertainment" />
            </div>
        </div>
        <div class="form-group">
            <label for="other" class="control-label col-sm-3">Other</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" name="other" id="other" />
            </div>
        </div>
        <input type="text" class="form-control" name="expenses" id="total-expenses"/>
        <button class="btn btn-lg btn-primary btn-block" id="update-expenses" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Update</button>
        <div class="resultsExpenses"></div>
      </form>
				
		  </div>
	  </div>
		



		
		
		
	</div>


</div><!-- /.container -->


