{% extends "partials/body.twig.php" %}

{% block title %}Receitas - Receitas{% endblock %}

{% block body %}
<h1>Receitas</h1>
<p><a href="{{BASE}}receita/adicionar/" class="btn btn-primary">Nova receita</a></p>

<div class="overflow-auto">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
                <th>#</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            {% for receita in listaReceita %}
            <tr>
                <td>{{receita.id}}</td>
                <td>{{receita.titulo}}</td>
                <td>{{receita.slug}}</td>
                <td>{{receita.categoria}}</td>
                <td><a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-warning">Editar</a> | <a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-warning">Excluir</a></td>
            </tr>
            {% endfor %}

        </tbody>
    </table>

</div>
{% endblock %}