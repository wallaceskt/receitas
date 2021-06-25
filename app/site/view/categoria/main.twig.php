{% extends "partials/body.twig.php" %}

{% block title %}Categorias - Receitas{% endblock %}

{% block body %}
<h1>Categorias</h1>
<p><a href="{{BASE}}categoria/adicionar/" class="btn btn-primary">Nova categoria</a></p>

<div class="overflow-auto">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-primary tr-thead">
                <th>Nome</th>
                <th>Slug</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-secondary">
                <td></td>
                <td></td>
                <td>Editar | Excluir</td>
            </tr>
        </tbody>
    </table>

</div>
{% endblock %}