{% extends "partials/body.twig.php" %}

{% block title %}Cadastro de clientes - Receitas{% endblock %}

{% block body %}
<h1>Cadastro de clientes</h1>
<!-- <p><a href="{{BASE}}cadastro/adicionar/" class="btn btn-primary">Novo cadastro</a></p> -->

<div class="row">

    <form action="{{BASE}}cliente/inserir" method="post" onsubmit="return validar(true);">

        <fieldset>

            <div class="row">

                <div class="col-md-4"></div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label for="txtNome" class="form-label">Nome</label>
                        <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="João do Pé de Feijão">

                    </div>

                    <div class="form-group mt-4">

                        <label for="txtEmail" class="form-label">E-mail</label>
                        <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="email@dominio.com">

                    </div>

                    <div class="row mt-4">

                        <div class="form-group col-md-6">

                            <label for="txtSenha" class="form-label">Senha</label>
                            <input type="password" name="txtSenha" id="txtSenha" class="form-control" placeholder="senha">

                        </div>

                        <div class="form-group col-md-6">

                            <label for="txtConfirmaSenha" class="form-label">Confirme a senha</label>
                            <input type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" class="form-control" placeholder="repita a senha">

                        </div>
                    
                    </div>
        
                    <div class="form-group mt-4">

                        <button type="submit" class="btn btn-success w-100">Entrar</button>

                    </div>

                </div>

                <div class="col-md-4"></div>

            </div>
        
        </fieldset>

    </form>

</div>
{% endblock %}