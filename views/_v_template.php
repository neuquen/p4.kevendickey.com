<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	
	<!-- Main CSS -->
	<link href="css/main.css" rel='stylesheet' type='text/css'>
	
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Cinzel:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Moment.js for formatted date -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/moment.min.js"></script>
</head>

<body<?php if(isset($bodyID)) echo " id='$bodyID'" ?>>

	<?php if($user): ?>
	
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Don't Budge&trade;</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<form method="post" action="/profile/logout">
					<button class="btn btn-success navbar-btn navbar-right" type="submit">Log Out</button>
				</form>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	
	<?php else: ?>
	<?php endif; ?>
	
	<?php if(isset($content)) echo $content; ?>
	
	<!-- jQuery/jQuery UI JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	
	<!-- Bootstrap JS -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>
	
	<!-- Controller Specific JS -->
	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	
</body>
</html>