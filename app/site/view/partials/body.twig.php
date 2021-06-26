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

    <div class="container">
        {% block body %}{% endblock %}
    </div>

    <script src="{{BASE}}js/script.js"></script>

</body>
</html>