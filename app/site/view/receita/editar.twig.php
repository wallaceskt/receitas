{% extends "partials/body.twig.php" %}

{% block title %}Editar receita - Receitas{% endblock %}

{% block body %}
<h1>Editar receita</h1>

<a href="{{BASE}}receita/ver/{{receita.slug}}" class="btn btn-primary">Ver receita</a>

<hr>

<div class="row">

    <form action="{{BASE}}receita/alterar/{{receitaId}}" method="post" onsubmit="return validar(true);">

        <fieldset>
        
            <div class="row">
                
                <div id="divAlert">

                    <div class="alert alert-info">Preencha corretamente todos os campos!</div>

                </div>
            
            </div>

            <div class="row">
            
                <div class="form-group col-md-8 mt-4">
                    
                    <label for="txtTitulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Lorem ipsum dolor sit amet" value="{{receita.titulo}}">
                    <input type="hidden" id="txtId" value="{{receitaId}}">
                    <input type="hidden" id="txtClienteId" value="{{clienteId}}">
                
                </div>
            
                <!-- <div class="form-group col-md-4 mt-4">
                
                    <label for="txtSlug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="lorem-ipsum-dolor-sit-amet" value="{{receita.slug}}">
                
                </div> -->
            
                <div class="form-group col-md-4 mt-4">
                    
                    <label for="slCategoria" class="form-label">Categoria</label>
                    <select name="slCategoria" id="slCategoria" class="form-control">
                        {% for categoria in listaCategoria %}
                        <option value="{{categoria.id}}" {{categoria.id == receita.categoriaId ? 'selected' : ''}}>{{categoria.titulo}}</option>
                        {% endfor %}
                    </select>
                
                </div>

            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtLinhaFina" class="form-label">Linha fina</label>
                <input type="text" class="form-control" id="txtLinhaFina" name="txtLinhaFina" placeholder="Descreva a receita" minlength="10" maxlenght="250" value="{{receita.linhaFina}}">
            
            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtImagem" class="form-label">Imagem</label>
                <input type="text" class="form-control" id="txtImagem" name="txtImagem" placeholder="https://meusite.com/img/img.jpg" minlength="5" maxlenght="100" value="{{receita.imagem}}">
            
            </div>
        
            <div class="form-group mt-4">
                
                <label for="txtDescricao" class="form-label">Receita</label>
                <textarea id="txtDescricao" name="txtDescricao">{{receita.descricao}}</textarea>
            
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