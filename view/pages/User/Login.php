<div class="row justify-content-md-center">
    <div class="col align-self-center border-right">
        <div class="form-group">´
            <h3>Já tenho acesso</h3>
            <form action="?pagina=autenticar&acao=login" method="POST">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="email">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                </div>
                <button type="submit" class="btn btn-primary">Acessar</button>
            </form>
        </div>
    </div>
    <div class="col align-self-center">
        <div class="form-group">
            <h3>Criar conta</h3>
            <form action="?pagina=autenticar&acao=cadastro" method="POST">
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="E-mail" name="email">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Prosseguir</button>
            </form>
        </div>
    </div>
</div>