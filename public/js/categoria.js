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

    if (validateId && getValueById('txtId') <= 0) {

        appendHTMLById('divAlert', '<div class="alert alert-warning">[ERRO] ID não encontrado.</div>');

        valid = false;
        
    }

    return valid;
    
}