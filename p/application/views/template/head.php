<!DOCTYPE html>
<html lang="eng">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/barang/css')?>/bootstrap.css">
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		<!-- <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"> -->
		<!-- <link href="<?php echo base_url('assets/css/a-design.css') ?>" rel="stylesheet"> -->
		<!-- <link href="<?php echo base_url('assets/css/awesome.css') ?>" rel="stylesheet"> -->
		<!-- <link href="<?php echo base_url('assets/css/plugins/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet"> -->
		<!-- <link href="<?php echo base_url('assets/css/plugins/morris.css') ?>" rel="stylesheet"> -->
		<!-- <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"> -->
		<!-- <link href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" rel="stylesheet"> -->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery -->
		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<style>
			*{
				font-size: 13px;
				font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
			}
			body{
				background-color: #DDFEE8;
				/* background: radial-gradient(circle at top left, #d6ffe3,#e1feeb); */
				/* background: radial-gradient(circle at top left, #DEFCF9,#CADEFC,#C3BEF0, #CCA8E9); */
				/* background-size: cover; */
				/* background-repeat: no-repeat; */
				/* height: 100vh; */
			}
			#gogg{
				background-color: #7de07d;
				border-radius: 5px;
				background: rgba(104, 216, 104, 0.3);
			}
			.btn_block{
				width: 100%;
			}
			.text_white{
				color:  rgb(233, 233, 233);
			}
			.card_pas{
				padding: 4.63px;
			}
		</style>
	</head>
	<body>