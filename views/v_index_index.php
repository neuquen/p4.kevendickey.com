
<?php if($user):?>
		<?php Router::redirect('/profile'); ?>
<?php else: ?>

<div class="titleContainer">
	<div class="row header">
		<div class="col-md-5 col-md-offset-2 text-center" id="title">
			<h1 class="featurette-heading">Don't Budge&trade;</h1>
			<p class="lead">A budget calculator to help you save time and money.</p>
		</div>
		<div class="col-md-4" id="money">
			<img src="/img/money.png" class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
		</div>
	</div>
</div>

<div class="container index">

	<div class="row">
	
		<div class="col-md-4 col-md-offset-2" id="login">
			<form class="form-signin" method="post" action="/profile/login">
				<h2 class="form-signin-heading">Sign In</h2>
				<input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				<?php if(isset($loginerror)): ?>				
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<span class="glyphicon glyphicon-warning-sign"></span><strong>LOGIN FAILED.</strong>  PLEASE TRY AGAIN.
					</div>
				<?php endif;?>
			</form>
		</div>

		<div class="col-md-4" id="signup">
			<form class="form-signup" method="post" action="/users/signup">
				<h2 class="form-signup-heading">Sign up</h2>
				<input type="text" class="form-control" name="first_name" placeholder="First Name" required> 
				<input type="text" class="form-control" name="last_name" placeholder="Last Name" id="signup-name" required> 
				<input type="email" class="form-control" name="email" placeholder="Email address" id="signup-email" required> 
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
				<?php if(isset($signuperror)): ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<span class="glyphicon glyphicon-warning-sign"></span><strong>EMAIL TAKEN.</strong>  PLEASE TRY AGAIN.
					</div>
				<?php endif;?>
			</form>
		</div>

	</div>


</div><!-- /container -->

<?php endif; ?>