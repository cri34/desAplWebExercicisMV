<?php
session_start();
if(!isset($_SESSION["login"])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body class="container bg-dark">
<h1 class="text-center text-white">Alta producte</h1>
<form class="row justify-content-center" action="add-producte.php" method="post" enctype="multipart/form-data">
    <input class="col form-control" type="text" name="nom" placeholder="nom">
    <input class="col form-control mx-2" type="number" step="0.01" name="preu" min="0.01" max="99.99" placeholder="preu">
    <input class="col form-control" type="text" name="descripcio" placeholder="descripcio">
    <input class="col-12 form-control m-2" type="file" name="files">
    <input class="col-12 btn btn-primary m-2" type="submit" value="submit" name="submit">
</form>
</body>
</html>