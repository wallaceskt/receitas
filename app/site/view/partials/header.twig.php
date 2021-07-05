<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    
    <div class="container-fluid">
    
        <a class="navbar-brand" href="{{BASE}}">Receitas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
        
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#">Início
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{BASE}}categoria/">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{BASE}}receita/">Receitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{BASE}}sobre/">Sobre</a>
                </li>
                <li class="nav-item">
                    {% if session.Cliente %}
                    <a class="nav-link" href="{{BASE}}dashboard/area/">Área</a>
                    {% else %}
                    <a class="nav-link" href="{{BASE}}login/">Área</a>
                    {% endif %}
                </li>
            </ul>

            <form method="get" action="{{BASE}}pesquisa/" id="frmPesquisa" class="d-flex" onsubmit="return false;">
                <input class="form-control me-sm-2" type="text" name="txtPesquisa" id="txtPesquisa" placeholder="Pesquisar" min-length="2" required>
                <button class="btn btn-secondary my-2 my-sm-0" type="button" onclick="pesquisar();">Pesquisar</button>
            </form>

        </div>

    </div>

</nav>