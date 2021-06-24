<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{BASE}}css/bootstrap.min.css">

    {% block head %}{% endblock %}
</head>
<body>

    {% include "partials/header.twig.php" %}
    {% block body %}{% endblock %}
    
</body>
</html>