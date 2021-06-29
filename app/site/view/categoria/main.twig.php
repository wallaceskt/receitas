{% extends "partials/body.twig.php" %}

{% block title %}Categorias - Receitas{% endblock %}

{% block body %}
<h1>Categorias</h1>
<p><a href="{{BASE}}categoria/adicionar/" class="btn btn-primary">Nova categoria</a></p>

<div class="overflow-auto">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
                <th>#</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            {% for categoria in listaCategoria %}
            <tr>
                <td>{{categoria.id}}</td>
                <td>{{categoria.titulo}}</td>
                <td>{{categoria.slug}}</td>
                <td><a href="{{BASE}}categoria/editar/{{categoria.id}}" class="btn btn-warning">Editar</a> | <a href="{{BASE}}categoria/excluir/{{categoria.id}}" class="btn btn-warning">Excluir</a></td>
            </tr>
            {% endfor %}

        </tbody>
    </table>

</div>
{% endblock %}