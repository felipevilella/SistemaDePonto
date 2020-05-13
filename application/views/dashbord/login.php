<div class="container">
	<div class="row">
		<div class="login">
			<div class="card col-12" >
				<br><center><p class="card-title">Login</p></center><hr>
				 <label class="error-login"></label>
				<div class="card-body">
					<h5 class="card-title">
						<div class="col-12">
					      <label class="sr-only" for="inlineFormInputGroup">Seu e-mail</label>
					      <div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="fa fa-id-card" aria-hidden="true"></i></div>
					        </div>
					        <input type="text" class="form-control" id='email' placeholder="E-mail">
					      </div>
					    </div>
					    <div class="col-12">
							<span class="error" id='error-email'></span>
						</div>
					</h5>
					<h5 class="card-title">
						<div class="col-12">
					      <label class="sr-only" for="inlineFormInputGroup">Sua senha</label>
					      <div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
					        </div>
					        <input type="password" class="form-control" id='senha' placeholder="Senha">
					      </div>
					   </div>
					   <div class="col-12">
							<span class="error" id='error-senha'></span>
						</div>
					</h5>
					<div class="container">
						<div class="row">
							<div class="col-6">
								<a href="<?= base_url(ROUTE_CADASTRO)?>"><button class="btn btn-primary col-12">Cadastrar</button></a>
							</div>
							<div class="col-6">
								<button class="btn btn-success btn-login col-12">Entrar</button>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>