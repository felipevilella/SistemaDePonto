<?php if ($pontos): ?>
	<?php foreach ($pontos as $ponto): ?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-6">
					<?= date('D d  M', strtotime($ponto['data']));?>
				</div> 
				<div class="col-6">
					<button class="btn btn-primary btn-detalharPonto col-12" data-historico="<?= $ponto['data']?>"> Detalhar</button></i>
				</div>
			</div>
		</li>
	<?php endforeach ?>
<?php else: ?>
	<li class="list-group-item">
		<div class="row">
			<div class="col-12">
				Não existe marcação de ponto dentro deste periodo.
			</div> 
		</div>
	</li>
<?php endif ?>
