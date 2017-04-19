<?php
// Ф-ция извлечение всех строк с табл. б.д.. Ф-ция принимает перем. $link. Результат выпол. ф-ции - ассоц. массив $articles
function articles_all($link){
	
  // Сформируем парам. запроса в одну перем.
  // Выбрать все с табл. articles отсорт. по id с конца
  $query = "SELECT * FROM articles ORDER BY id DESC";
  
  // Собственное сам запрос к таблице б.д., где $link - ф-ция для обращения к б.д., а в перем. $query - сформирован сам запрос
  $result = mysqli_query($link, $query);
  
  // Если запрос не удался
  if (!$result) {
    die(mysqli_error($link));
  }
  
  // Извлечение данных из БД  
  // Посчитаем к-во строк в таблице - для будущего цикла
  $n = mysqli_num_rows($result);
  // Укажем что перем. $articles - массив
  $articles = array();
  
  // Цикл повтор. к-во раз, сколько строк в табл. б.д.
  for ($i = 0; $i < $n; $i++) {
    // Извлекаем каждую строку с разными данными в перем. $row
    $row = mysqli_fetch_assoc($result);
	// Записываем данные с каждой строки табл. б.д. в ассоциативный массив
	$articles[] = $row;
  }
// Результатом выпол. ф-ции станем запись всех строк с данными в ассоциативный массив $articles
return $articles;
}

// Ф-ция извлечения конкретной строки с табл. БД.
// Получает: $link - параметры подкл. к табл. БД, $id_article - знач. с глобал. массива $_GET с индексом id
function articles_get($link, $id_article) {
  // Запрос по id, где id равен $id_article
  $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
  $result = mysqli_query($link, $query);
  
  if (!$result)
    die (mysqli_error($link));

  $article = mysqli_fetch_assoc($result);
  
  // В перем. $article находит. конкретная строка табл. БД
  return $article;
}

// Ф-ция добавления новой статьи
function articles_new($link, $title, $date, $content){
  // Убираем пробелы слева и справа у строки title и content
  $title = trim($title);
  $content = trim($content);
  // Проверка
  if ($title == '')
    return false;

  // Запрос. s - значит стринг-строка
  $t = "INSERT INTO articles (title, date, content) VALUES ('%s', '%s', '%s')";
  
  $query = sprintf($t, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $content));

  $result = mysqli_query($link, $query);
  
  if (!$result) {
	// Если произошла ошибка mysqli-запроса, то нужно прекратить выполнение скрипта
    die(mysqli_error($link));
  }
  
  return true;
}

// Ф-ция редактирования статьи
function articles_edit($link, $id, $title, $date, $content){
  // Подготовка переменных
  $title = trim($title);
  $content = trim($content);
  $date = trim($date);
  $id = (int)$id;
  
  // Проверка
  if ($title == '')
    return false;

  // Запрос
  $sql = "UPDATE articles SET title='%s', content='%s', date='%s' WHERE id='%d'";
  
  $query = sprintf($sql, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $content), mysqli_real_escape_string($link, $date), $id);
  
  $result = mysqli_query($link, $query);
  
  if (!$result)
    die(mysqli_error($link));

  // Успешно ли отредактирована таблица, Да - 1, Нет - 0
  return mysqli_affected_rows($link);
}

// Ф-ция удаления строки таблицы БД - удаления статьи
function articles_delete($link, $id){
  $id = (int)$id;
  //Проверка
  if ($id == 0)
    return false;

  // Запрос
  $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
  $result = mysqli_query($link, $query);
  
  if(!result)
    die(mysqli_error($link));

  return mysqli_affected_rows($link);
}

// Ф-ция сокращенного вида текста статей
function articles_intro($text, $len=500) {
  // Копирует $text начиная с 0 позиции и до $len 500 символов
  return mb_substr($text, 0, $len);
}
?>