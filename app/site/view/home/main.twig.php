{% extends "partials/body.twig.php" %}

{% block title %}Início - Receitas{% endblock %}

{% block body %}
<h1>Destaques</h1>

<hr>

{% for receitas in listaReceitas %}
<div class="row">

    {% for receita in receitas %}
    <div class="col-md-3">
    
        <div class="card border-secondary mb-3" style="max-width: 20rem;">

            <div class="card-header">{{receita.titulo}}</div>

            <div class="card-body">
                <!-- <h4 class="card-title">{{receita.titulo}}</h4> -->
                <!-- <p class="card-text">{{receita.linhaFina}}</p> -->
                <a href="{{BASE}}receita/ver/{{receita.slug}}">
                <img src="{{BASE}}img/{{receita.imagem}}" alt="{{receita.titulo}}" class="w-100 img-thumb">
                </a>
                <a href="{{BASE}}receita/ver/{{receita.slug}}" class="btn btn-success w-100 mt-2">Ver receita</a>
            </div>

        </div>
    
    </div>
    {% endfor %}

</div>
{% endfor %}

{% endblock %}