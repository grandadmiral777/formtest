<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<?if ($_SERVER['SCRIPT_URL'] == '/') {?>
			<link rel="stylesheet" href="/uikit-3.1.6/css/uikit.min.css"/>
			<link rel="stylesheet" href="style.css"/>
			
			<script src="jquery.js"></script>
			<script src="/uikit-3.1.6/js/uikit.min.js"></script>
			<script src="all.js"></script>
		<?} else {?>
			<link rel="stylesheet" href="../uikit-3.1.6/css/uikit.min.css"/>
			<link rel="stylesheet" href="../style.css"/>
			
			<script src="../jquery.js"></script>
			<script src="../uikit-3.1.6/js/uikit.min.js"></script>
			<script src="../all.js"></script>
		<?}?>
		
		<?
		include 'lang/messages.php';	
		global $lang;
		$lang = $_COOKIE['deflang'];?>
		
	</head>
	<body>