<?php
session_start();
function recupJson($fichier){
    $donneesJson=file_get_contents("$fichier.json");
    return json_decode($donneesJson,true);
}
?>