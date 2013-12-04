
<div class="container profile">

	<div class="starter-template">
		<h1>Welcome<?php if($user) echo ', '.$user->first_name; ?></h1>
		<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.
		</p>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="content">
				<h2>Summary</h2>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar">
						<span id="output-expenses">$0.00</span>
					</div>
					<div class="progress-bar progress-bar-warning" role="progressbar">
						<span>$0.00</span>
					</div>
					<div class="progress-bar progress-bar-danger" role="progressbar">
						<span>$0.00</span>
					</div>
					<div class="progress-bar progress-bar-income" role="progressbar">
						<span id="output-income">$0.00</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="content">
				<h2>Income</h2>
			<form class="form-income form-horizontal" role="form" method="post" action="/profile/add">
        <div class="form-group">
            <label for="paycheck" class="control-label col-sm-3">Paycheck</label>
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
        <input type="text" class="form-control" name="income" id="total-income" />
        <button class="btn btn-lg btn-primary btn-block updateIncome" type="submit" >Update</button>
        <div id='results'></div>
    </form>

			</div>
		</div>
		
		<div class="col-md-6">
			<div class="content">
				<h2>Expenses</h2>
			<form class="form-expenses form-horizontal" role="form">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Rent/mortgage</label>
            <div class="input-group input-group-lg col-sm-9"> 
            	<span class="input-group-addon">$</span> 
              <input type="text" class="form-control" id="" />
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Utilies</label>
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
        <button class="btn btn-lg btn-primary btn-block updateExpenses" type="button" >Update</button>
    </form>
				
			</div>
			
		</div>
	</div>


</div><!-- /.container -->


