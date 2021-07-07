{% extends "partials/body.twig.php" %}

{% block title %}{{receita.titulo}} - Receitas{% endblock %}

{% block body %}
<h1>{{receita.titulo}}</h1>

<a href="{{BASE}}receita/" class="btn btn-primary">Voltar</a> 
{% if session.Cliente %}
<a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-primary">Editar</a> 
<a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-primary">Excluir</a>
{% else %}
<a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-primary disabled" aria-disabled="true">Editar</a> 
<a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-primary disabled" aria-disabled="true">Excluir</a>
{% endif %}

<hr>

<div class="row">

    <h5>{{receita.linhaFina}}</h5>
    <p><em>Categoria: {{receita.categoria}}<br>Publicado em {{receita.data|date('d/m/Y H:i:s')}}</em></p>
    <img src="{{BASE}}img/{{receita.imagem}}" alt="{{receita.titulo}}">
    <p>{{receita.descricao|raw}}</p>

</div>
{% endblock %}