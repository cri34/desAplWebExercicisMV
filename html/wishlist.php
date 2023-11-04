<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="wishlist.php">
        <input type="text" name = "nom">
        <input type="submit" value="Submit">
    </form>
<ul>
<?php
session_start();
if(isset($_GET["nom"])){
    if(!isset($_SESSION["desitjos"])){
        $_SESSION["desitjos"] = array();
    }
    $length = count( $_SESSION["desitjos"]);
    $_SESSION["desitjos"][$length] = $_GET["nom"];

    foreach ($_SESSION["desitjos"] as $key => $value){
        $itemDesitjat = '<li>'.$value.'</li>';
        echo $itemDesitjat;
    }
}
?>
</ul>
</body>
</html>
