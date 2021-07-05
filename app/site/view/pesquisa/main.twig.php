{% extends "partials/body.twig.php" %}

{% block title %}Pesquisa - Receitas{% endblock %}

{% block body %}
<h1>Pesquisa</h1>
<!-- <p><a href="{{BASE}}receita/adicionar/" class="btn btn-primary">Nova receita</a></p> -->

<p>Exibindo <span class="font-weight-bold">{{quantidadeResultado}}</span> registro(s) para o termo <span class="font-weight-bold">{{termo}}</span>.</p>

<div class="overflow-auto mt-4">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
                <th>#</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th>Publicado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            {% for receita in receitas %}
            <tr>
                <td>{{receita.id}}</td>
                <td>{{receita.titulo}}</td>
                <td>{{receita.slug}}</td>
                <td>{{receita.categoria}}</td>
                <td>{{receita.data|date('d/m/Y H:i:s')}}</td>
                <td><a href="{{BASE}}receita/ver/{{receita.id}}" class="btn btn-info">Ver</a>
                <a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-warning">Editar</a>
                <a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-danger">Excluir</a></td>
            </tr>
            {% endfor %}

        </tbody>
    </table>

</div>
{% endblock %}