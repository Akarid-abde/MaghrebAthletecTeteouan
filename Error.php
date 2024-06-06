<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/FinalLogo.png">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
        }
        .container h1 {
            font-size: 10rem;
            margin: 0;
        }
        .container h2 {
            font-size: 2rem;
            margin: 0;
        }
        .container p {
            font-size: 1.2rem;
            margin-top: 20px;
        }
        .container a {
            margin-top: 30px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Page non trouvée</h2>
        <br>
        <h2>Vous n'avez pas accès à cette page.</h2>
        <p>Désolé, la page que vous recherchez n'existe pas.</p>
        <button class="btn btn-primary" onclick="goBack()">Retourner en arrière</button>
        <button class="btn btn-warning"><a href="index.php">Se connecter</a></button>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
