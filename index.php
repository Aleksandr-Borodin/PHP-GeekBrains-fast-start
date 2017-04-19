<?php

// Точка входа дле всего перечня статей

// Файл для подключения к б.д.
require_once("database.php");
// Файл с набором ф-ций
require_once("models/articles.php");

// Перем. $link присваиватся результат ф-ции db_connect, тоесть парам. подкл. к б.д.
$link = db_connect();
// Перем. $articles присв. результат ф-ции articles_all, но отправ. в ф-цию перем. $link, тоесть все необходимое для подключения
$articles = articles_all($link);

// Шаблон для отображения нескольких статей
include("views/articles.php");
?>