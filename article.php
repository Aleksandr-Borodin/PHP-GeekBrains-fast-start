<?php

// Файл-точка входа для конкретной статьи

// Файл для подключения к б.д.
require_once("database.php");
// Файл с набором ф-ций
require_once("models/articles.php");

// Перем. $link присваиватся результат ф-ции db_connect с файла database.php, тоесть парам. подкл. к б.д.
$link = db_connect();
// Перем. $article присв. результат выпол. ф-ции articles_get, а отправ. $link с парам. подкл. к БД и полученое знач. с глобал. массива $_GET. Будет передано значение глобального массива $_GET с индексом id
$article = articles_get($link, $_GET['id']);

// Как будет выглядеть статья - тоесть шаблон
include("views/article.php");
?>