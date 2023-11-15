<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add-producte.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="nom">
        <input type="number" step="0.01" name="preu" placeholder="preu">
        <input type="text" name="descripcio" placeholder="descripcio">
        <input type="file" name="files" >
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>