{% extends "partials/body.twig.php" %}

{% block title %}Editar receita - Receitas{% endblock %}

{% block body %}
<h1>Editar receita</h1>

<hr>

<div class="row">

    <form action="{{BASE}}receita/alterar/{{receitaId}}" method="post" onsubmit="return validar(true);">

        <fieldset>
        
            <div class="row">
                
                <div id="divAlert">

                    <div class="alert alert-info">Preencha corretamente todos os campos!</div>

                </div>
            
            </div>
        
            <div class="form-group">
                
                <label for="txtTitulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Lorem ipsum dolor sit amet" value="{{receita.titulo}}">
                <input type="hidden" id="txtId" value="{{receitaId}}">
            
            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtSlug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="lorem-ipsum-dolor-sit-amet" value="{{receita.slug}}">
            
            </div>
    
            <div class="form-group mt-4">

                <button type="submit" class="btn btn-success">Editar</button>

            </div>

        </fieldset>

    </form>

</div>

<script src="{{BASE}}js/receita.js"></script>
<script src="{{BASE}}vendor/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('txtDescricao');
</script>
{% endblock %}