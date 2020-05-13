<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
		<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css');?>">
		<title>Solides - AppPonto</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		  <div class="container">
		    <a class="navbar-brand" href="#">
					App Ponto
		        </a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		          <span class="navbar-toggler-icon"></span>
		        </button>
		    <div class="collapse navbar-collapse" id="navbarResponsive">
		      <ul class="navbar-nav ml-auto">
		        <li class="nav-item active">
		          <a class="nav-link" href="#">Olá , <?= $primeiroNome?>
		                <span class="sr-only">(current)</span>
		              </a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=base_url(ROUTE_MARCACAO_PONTO)?>"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Marcar ponto</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=base_url(ROUTE_HISTORICO_PONTO)?>"><i class="fa fa-history" aria-hidden="true"></i> Meu ponto</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link btn-sair" href="<?=base_url(ROUTE_LOGOUT);?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>

