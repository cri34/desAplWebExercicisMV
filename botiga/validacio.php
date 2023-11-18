<?php
session_start();
include 'connexioBDD.php';

if (isset($_GET["usuari"]) && isset($_GET["password"])) {
    $select = 'select * from usuari where usuari = "' . $_GET["usuari"] . '" and password = "' . $_GET["password"] . '"';
    $result = $conn->query($select);
    while ($row = $result->fetch_assoc()) {
        $equalUser = $row["usuari"] === $_GET["usuari"];
        $equalPassword = $row["password"] === $_GET["password"];
        if($equalUser && $equalPassword){
            $_SESSION["login"] = $_GET["usuari"] ;
            header('Location: alta-producte.php');
            return;
        }

    }

}
header('Location: login.php');
?>