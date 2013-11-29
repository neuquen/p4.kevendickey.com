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
	
</head>

<body<?php if(isset($bodyID)) echo " id='$bodyID'" ?>>

	<?php if(isset($content)) echo $content; ?>

	<!-- Controller Specific JS -->
	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	
	<!-- jQuery/jQuery UI JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	
	<!-- Bootstrap JS -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	
	<!-- Main JS -->
	
</body>
</html>