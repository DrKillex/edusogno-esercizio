<?php
require 'connection.php';

function deleteAndRedirect($id,$conn){
    $conn = $conn;
    $sqlDelete= "DELETE FROM `eventi` WHERE `id` = $id";
    $delete = $conn->query($sqlDelete);
    $redirect = 'http://localhost/edusogno-esercizio/home.php';
    header("Location: " . $redirect);
    exit();
};

if (isset($_GET["id"])){
    deleteAndRedirect($_GET["id"],$conn);
}
?>