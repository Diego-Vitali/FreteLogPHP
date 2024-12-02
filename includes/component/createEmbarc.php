


<div class="card-body">
      <p class="login-box-msg textoPreto"><b>Novo Embarcador</b></p>

      <form action="CRUDs/crEmbarc.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="cnpj" maxlength="18" placeholder="CNPJ do Embarcador" name="cnpj" REQUIRED>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome do Embarcador" name="nome" REQUIRED>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Segmento do Embarcador" name="segmento" REQUIRED>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cidade do Embarcador" name="cidade" REQUIRED>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Estado do Embarcador" name="estado" REQUIRED>
        </div>
        <div class="mb-3">
            <label>
                Ativo
                <input type="radio" class="form-control" name="opcao" value="ativo" REQUIRED>
            </label>
            <label style="margin-left: 30px">
                Inativo
                <input type="radio" class="form-control" name="opcao" value= "inativo" REQUIRED>
            </label>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>