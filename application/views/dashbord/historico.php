<div class="container">
	<div class="col-12">
		<div class="card col-12" style="max-width: 200rem; top:40px;">
			<div class="card-body">
				<label>Começando em: </label>
				<input type="date" class='form-control' id='dataInicial'>
				<label>Terminando em: </label>
				<input type="date" class='form-control' id='dataFinal'>
			</div>
			<div class="col-12" style="max-width: 100rem">
				<button class="btn btn-success btn-buscar btn-sm col-12"> Buscar Ponto</button><hr><br><br>
			</div>
		</div>
	</div>
	<div class="container">
	<div class="col-12">
		<ul class="list-group historicoPonto">
			<?= $html ?>
		</ul>
	</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="modal-historico" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body detalharPonto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X Fechar</button>
      </div>
    </div>
  </div>
</div>