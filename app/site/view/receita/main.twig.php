{% extends "partials/body.twig.php" %}

{% block title %}Receitas - Receitas{% endblock %}

{% block body %}
<h1>Receitas</h1>
{% if session.Cliente %}
<p><a href="{{BASE}}receita/adicionar/" class="btn btn-primary">Nova receita</a></p>
{% endif %}

<hr>

<form action="{{BASE}}receita/" method="post">
    <div class="row">

        <div class="col-md-8">
        
            <select name="slCategoria" id="slCategoria" class="form-control">
                {% for categoria in listaCategoria %}
                <option value="{{categoria.id}}" {{categoria.id == categoriaId ? 'selected' : ''}}>{{categoria.titulo}}</option>
                {% endfor %}
            </select>
        
        </div>

        <div class="col-md-4">

            <button type="submit" value="Buscar" class="btn btn-success">Buscar</button>

        </div>

    </div>
</form>

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
                <td><a href="{{BASE}}receita/ver/{{receita.slug}}" class="btn btn-info">Ver</a>
                {% if session.Cliente and session.Cliente.id == receita.clienteId %}
                <a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-warning">Editar</a>
                <a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-danger">Excluir</a>
                {% else %}
                <a href="{{BASE}}receita/editar/{{receita.id}}" class="btn btn-warning disabled" aria-disabled="true">Editar</a>
                <a href="{{BASE}}receita/excluir/{{receita.id}}" class="btn btn-danger disabled" aria-disabled="true">Excluir</a>
                {% endif %}
                </td>
            </tr>
            {% endfor %}

        </tbody>
    </table>

</div>
{% endblock %}