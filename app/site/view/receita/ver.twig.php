{% extends "partials/body.twig.php" %}

{% block title %}{{receita.titulo}} - Receitas{% endblock %}

{% block body %}
<h1>{{receita.titulo}}</h1>

<a href="{{BASE}}receita/" class="btn btn-primary">Voltar</a> 
<a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-primary">Editar</a> 
<a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-primary">Excluir</a>
<hr>

<div class="row">

    <p>Categoria: {{receita.categoria}}<br>Publicado em {{receita.data|date('d/m/Y H:i:s')}}</p>
    <p>{{receita.slug}}</p>
    <p>{{receita.linhaFina}}</p>
    <p>{{receita.descricao}}</p>

</div>

{% endblock %}