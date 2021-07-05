{% apply spaceless %}
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %}</title>
    <link href="{{BASE}}img/favicon.png" rel="icon">
    <link rel="stylesheet" href="{{BASE}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{BASE}}css/style.css">

    {% block head %}{% endblock %}
</head>
<body>

    {% include "partials/header.twig.php" %}

    <main class="container mt-4">

        {% block body %}{% endblock %}
    
    </main>

    <footer class="footer">
    
        <div class="container text-center">
    
            {% block footer %}
            <span class="text-muted">&copy; Copyright 2021 by <a href="http://www.wallaceoliveira.com">Wallace Oliveira</a>.</span>
            {% endblock %}
    
        </div>
    
    </footer>

    <script src="{{BASE}}js/script.js"></script>

</body>
</html>
{% endapply %}