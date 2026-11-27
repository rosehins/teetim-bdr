<?php 
// Constantes qui dépendent de chaque projet et qui doivent être secrète
// DONC: il faut placer en dehors du chemin du site web
// Il faut apprendre comment faire ca par vous meme
const HOTE = "db";
const UTIL = "teetim";
const MPD = "teetim";
const BD = "teetim";

// Librairie de code pour manipuler les données relationnelles

function connexion() {
    $dsn = "mysql:host=".HOTE.";dbname=";charset=utf8mb4";
    return new PDO($dsn, UTIL, MPD)
}

function creer() {


}

function lire() {

}

function modifier() {


}

function supprimer() {

}
?>