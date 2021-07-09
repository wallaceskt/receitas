{% extends "partials/body.twig.php" %}

{% block title %}Área de clientes - Receitas{% endblock %}

{% block body %}
<h1>Área de clientes</h1>
<!-- <p><a href="{{BASE}}receita/adicionar/" class="btn btn-primary">Nova receita</a></p> -->

<div class="row">

    <form action="{{BASE}}login/logar/" method="post">

        <fieldset>

            <div class="row">

                <div class="col-md-4"></div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label for="txtUsuario" class="form-label">Usuário</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="email@dominio.com">

                    </div>

                    <div class="form-group mt-4">

                        <label for="txtSenha" class="form-label">Senha</label>
                        <input type="password" name="txtSenha" id="txtSenha" class="form-control" placeholder="senha">

                    </div>
        
                    <div class="form-group mt-4">

                        <button type="submit" class="btn btn-success w-100">Entrar</button>

                    </div>

                    <hr class="mt-4">
        
                    <div class="form-group mt-4">

                        <a href="{{BASE}}cliente/adicionar" class="btn btn-success btn-info w-100">Criar nova conta</a>

                    </div>

                </div>

                <div class="col-md-4"></div>

            </div>
        
        </fieldset>

    </form>

</div>
{% endblock %}