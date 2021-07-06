function validar(validateId) {

    getById('divAlert').innerHTML = '';

    var valid = true;

    if (getValueById('txtTitulo').length < 2) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] Título inválido - mínimo 2 caracteres.</div>');

        valid = false;
        
    }

    if (getValueById('txtSlug').length < 3) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] Slug inválido - mínimo 3 caracteres.</div>');

        valid = false;
        
    }
    
    if (getValueById('slCategoria').length <= 0) {
        
        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] Categoria inválida!</div>');
        
        valid = false;
        
    }

    if (getValueById('txtLinhaFina').length < 10) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] Linha fina inválida - mínimo 10 caracteres.</div>');

        valid = false;
        
    }

    if (getValueById('txtImagem').length < 5) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] Informe uma imagem - mínimo 5 caracteres.</div>');

        valid = false;
        
    }

    if (CKEDITOR.instances['txtDescricao'].getData().length < 10) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] Descricao inválida - mínimo 10 caracteres.</div>');

        valid = false;
        
    }
    
    if (validateId && getValueById('txtId') <= 0) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] ID não encontrado.</div>');

        valid = false;
        
    }

    return valid;
    
}