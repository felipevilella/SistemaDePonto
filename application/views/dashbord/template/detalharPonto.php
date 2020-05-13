<?php if ($pontos): ?>
	<?php foreach ($pontos as $ponto): ?>
		<b><?=$ponto['nome']?></b>: <?= $ponto['horario'];?><hr>
		</li>
	<?php endforeach ?>
<?php endif ?>
