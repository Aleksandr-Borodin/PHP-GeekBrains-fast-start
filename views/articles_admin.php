<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>Мой первый блог</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>Мой первый блог</h1>
  <div>
    <!-- Обработчик находится в папке admin/index.php, а путь указ. именно так, поскольку этот файл подкл. к другому - admin/index.php -->
	<!-- Адрес обработчика, отправ. методом GET, в адрес. строке, в глобал. 2-х мерном массиве $_GET action => add -->
    <a href = "index.php?action=add">Добавить статью</a>
    <table class = "admin-table">
      <tr>
        <th>Дата</th>
	    <th>Заголовок</th>
	    <th></th>
	    <th></th>
      </tr>
      <!-- Начало цикла, так как в $articles - 3-мерный массив, с 2-я индексами -->
      <?php foreach($articles as $a): ?>
        <tr>
          <td><?=$a['date']?></td>
	      <td><?=$a['title']?></td>
		  <!-- Адрес обработчика, отправ. методом GET, в адрес. строке, в глобал. 2-х мерном массиве $_GET action = edit и id = число -->
	      <td><a href = "index.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
		  <!-- Адрес обработчика, отправ. методом GET, в адрес. строке, в глобал. 2-х мерном массиве $_GET action = delete и id = число -->
	      <td><a href = "index.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
        </tr>
      <!-- Чтобы остановить цикл -->
      <?php endforeach ?>	  
    </table>
  </div>
  <footer>
    <p>Мой первый блог <br>Copyright © 2015</p>
  </footer>
</div>
</body>
</html>