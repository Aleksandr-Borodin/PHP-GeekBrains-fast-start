<?php
  require_once("../database.php");
  require_once("../models/articles.php");
  
  $link = db_connect();
  
  // Если есть входящий параметр с файла списка статетй, а также с файла с добав. новой статьи
  if(isset($_GET['action']))
    $action = $_GET['action'];
  else
    $action = "";

  if($action == "add") {
    // Будет работать уже с меню добав. новой статьи
	// Если заполнен. форма в меню добав. новой статьи не пустая, тоесть заполненая и отправленная методом POST
	if(!empty($_POST)) {
	  // Значит передаем значения глобал. моссива $_POST с соответствующими индексами в ф-цию созд. новой статьи
	  articles_new($link, $_POST['title'], $_POST['date'], $_POST['content']);
	  
	  // Ф-ция отправки HTTP-заголовка
	  header ("location: index.php");
	}
	
	// Меню-форма добавления новой статьи
    include("../views/article_admin.php");
  }
  else if($action == "edit") {
    if(!isset($_GET['id']))
	  // Переадресация на гравную страницу
	  header("Location: index.php");
    // Если id - текст, то $id = 0
    $id = (int)$_GET['id'];
	
	if (!empty($_POST) && $id > 0) {
      articles_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content']);
	  // Переадресация на гравную страницу
	  header("Location: index.php");
	}
	
	// Ф-ция articles_get возвращает выбраную строку таблицы - статьи
	$article = articles_get($link, $id);
	// По этому шаблону будет отобр. заранее выбр. строка табл. - статья
	include("../views/article_admin.php");
  }
  else if($action == "delete") {
    $id = $_GET['id'];
	$article = articles_delete($link, $id);
	header("Location: index.php");
  }
  
  else {
	// Иначе отображаем список всех статей в админ. панели
    $articles = articles_all($link);  
    include("../views/articles_admin.php");
  }  
?>