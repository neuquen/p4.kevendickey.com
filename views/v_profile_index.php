
<div class="container profile">

	<div class="starter-template">
		<h1>Welcome<?php if($user) echo ', '.$user->first_name; ?></h1>
		<p class="lead">To get started, fill out your income.  The amount of money you have to use on expenses will be based on that total.<br>
										Your totals will be displayed in the summary bar and will indicate how well you are doing at not budging.<br>
										GOOD LUCK! ...and remember... DON'T BUDGE!  (Not even for your girlfriend...)
		</p>
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
						<button type="submit" class="btn btn-danger btn-xs" id="clear-income">Clear Total</button>
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
        <button class="btn btn-lg btn-primary btn-block" id="update-income" type="submit" >Update</button>
        <div class="resultsIncome"></div>
    </form>

			</div>
		</div>
		
		<div class="col-md-6">
			<div class="content">
				<h2>Expenses
					<form class="form-clear-expenses" method="post" action="/profile/clearExpenses">
						<button type="submit" class="btn btn-danger btn-xs" id="clear-expenses">Clear Total</button>
					</form>
				</h2>
			<form class="form-expenses form-horizontal" role="form" method="post" action="/profile/update">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Rent/Mortgage</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Utilities</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Groceries</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Automobile</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Loans/Debt</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Credit Card</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Insurance</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Personal Care</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span>
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Entertainment</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Other</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <input type="text" class="form-control" name="expenses" id="total-expenses"/>
        <button class="btn btn-lg btn-primary btn-block" id="update-expenses" type="submit" >Update</button>
        <div class="resultsExpenses"></div>
    </form>
				
			</div>
			
		</div>
	</div>


</div><!-- /.container -->


