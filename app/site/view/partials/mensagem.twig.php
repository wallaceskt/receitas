{% extends "partials/body.twig.php" %}

{% block title %}{{titulo}} - Receitas{% endblock %}

{% block body %}
<h1>{{titulo}}</h1>

<div>

    <p>{{mensagem}}</p>

    <hr>

    <a href="{{BASE}}{{uri}}" class="btn btn-primary">Voltar</a>

</div>
{% endblock %}