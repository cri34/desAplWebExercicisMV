<?php

session_start();
introduirArticleCarreto();
header('Location: mostra-carreto.php');


function introduirArticleCarreto()
{
    if (!isset($_SESSION["carreto"])) {
        $_SESSION["carreto"] = array();
    }
    if (isset($_GET["codi"])) {
        $length = count($_SESSION["carreto"]);
        $_SESSION["carreto"][$length] = $_GET["codi"];
    }
}

?>

