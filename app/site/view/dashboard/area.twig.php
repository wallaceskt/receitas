{% extends "partials/body.twig.php" %}

{% block title %}Área do cliente - Receitas{% endblock %}

{% block body %}
<h1>Área do cliente</h1>

<a href="{{BASE}}" class="btn btn-primary">Voltar</a> 
<a href="{{BASE}}login/logout/" class="btn btn-primary">Sair</a> 

{% if session.Cliente and cliente.id == session.Cliente.id %}
<a href="{{BASE}}cliente/editar/{{session.Cliente.id}}" class="btn btn-primary">Editar</a> 
<a href="{{BASE}}cliente/excluir/{{session.Cliente.id}}" class="btn btn-primary">Excluir</a>
{% endif %}

<hr>

<div class="row">

    <h2>{{session.Cliente.nome}}</h2>
    <p>E-mail: {{session.Cliente.usuario}}</p>
    <p><em>Cadastrado em {{session.Cliente.cadastro|date('d/m/Y H:i:s')}}</em></p>

</div>
{% endblock %}