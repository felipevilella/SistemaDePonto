<div class="container">
	<div class="col-12">
		<div class="card col-12" style="max-width: 200rem; top:40px;">
			<div class="card-body">
				 <?= $nome?> - Estagiario <hr>
				<b>Data e Hora</b>: <?= date('d/m H:i', strtotime('- 3 hours'));?><hr>
				<b> Ultimo registro</b> :  <?= $ultimoPonto['dataPonto'].' '.$ultimoPonto['horarioPonto'];?> 
			</div>
			<div class="col-12" style="max-width: 100rem">
				<button class="btn btn-success  btn-sm col-12  <?= isset($diaConcluido)? 'disabled': 'btn-registrarPonto'?>">
					Registrar ponto
				</button><hr>
			</div>
		</div>
	</div>
</div>