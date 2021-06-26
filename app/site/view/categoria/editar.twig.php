{% extends "partials/body.twig.php" %}

{% block title %}Editar categoria - Receitas{% endblock %}

{% block body %}
<h1>Editar categoria</h1>

<hr>

<div class="row">

    <form action="{{BASE}}categoria/insert" method="post" onsubmit="return validar(false);">

        <fieldset>
        
            <div class="row">
                
                <div id="divAlert">

                    <div class="alert alert-info">Preencha corretamente todos os campos!</div>

                </div>
            
            </div>
        
            <div class="form-group">
                
                <label for="txtTitulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Lorem ipsum dolor sit amet">
            
            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtSlug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="lorem-ipsum-dolor-sit-amet">
            
            </div>
    
            <div class="form-group mt-4">

                <button type="submit" class="btn btn-success">Cadastrar</button>

            </div>

        </fieldset>

    </form>

</div>

<script src="{{BASE}}js/categoria.js"></script>
{% endblock %}