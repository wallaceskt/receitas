{% extends "partials/body.twig.php" %}

{% block title %}Nova receita - Receitas{% endblock %}

{% block body %}
<h1>Nova receita</h1>

<hr>

<div class="row">

    <form action="{{BASE}}receita/insert" method="post" onsubmit="return validar(false);">

        <fieldset>
        
            <div class="row">
                
                <div id="divAlert">

                    <div class="alert alert-info">Preencha corretamente todos os campos!</div>

                </div>
            
            </div>

            <div class="row">
            
                <div class="form-group col-md-4 mt-4">
                    
                    <label for="txtTitulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Lorem ipsum dolor sit amet">
                
                </div>
            
                <div class="form-group col-md-4 mt-4">
                    
                    <label for="txtSlug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="lorem-ipsum-dolor-sit-amet">
                
                </div>
            
                <div class="form-group col-md-4 mt-4">
                    
                    <label for="slCategoria" class="form-label">Categoria</label>
                    <select name="slCategoria" id="slCategoria" class="form-control">
                        {% for categoria in listaCategoria %}
                        <option value="{{categoria.id}}">{{categoria.titulo}}</option>
                        {% endfor %}
                    </select>
                
                </div>

            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtLinhaFina" class="form-label">Linha fina</label>
                <input type="text" class="form-control" id="txtLinhaFina" name="txtLinhaFina" placeholder="Descreva a receita" minlength="10" maxlenght="250">
            
            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtDescricao" class="form-label">Receita</label>
                <textarea id="txtDescricao" name="txtDescricao"></textarea>
            
            </div>
    
            <div class="form-group mt-4">

                <button type="submit" class="btn btn-success">Cadastrar</button>

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