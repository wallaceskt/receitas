function getValueById(id) {

    return document.getElementById(id).value;

}

function getById(id) {

    return document.getElementById(id);

}

function appendHTMLById(id, html) {

    document.getElementById(id).innerHTML += html;

}

function log(elemento) {

    console.log(elemento);

}

function pesquisar() {

    if (getValueById('txtPesquisa').length <= 2) {

        alert('[ERRO] Formulário inválido!');
        
        return;

    }

    var form = getById('frmPesquisa');
    var url = form.action + 'p/' + getValueById('txtPesquisa');

    document.location.href = url;

}