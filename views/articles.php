<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>Мой первый блог</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>Мой первый блог</h1>
  <a href = "admin">Панель администратора</a>
  <div>
    <!-- Это все PHP-файл. Начало цикла, так как в $articles - 3-мерный массив, с 2-я индексами -->
    <?php foreach($articles as $a): ?>
      <div class="article">
	  
      <!-- Передаем знач. id для ее использования в точке входа для конкретной стати. ?id=<?=$a['id']?>. Знач. с индексом id в ассоц. массиве $a в глобальный массив $_GET, поскольку передача в адресной строке -->
      <h3>
	    <a href="article.php?id=<?=$a['id']?>">
		<?=$a['title']?>
		</a>
      </h3>
      <em>Опубликовано: <?=$a['date']?></em>
	  <!-- Обращение к ф-ции, которая примет $a['content'] - текст статьи, а передаст его укороченную версию -->
      <p><?=articles_intro($a['content'])?></p>
      </div>
    <!-- Чтобы остановить цикл, к-во выполнений цикла - 2 раза -->
    <?php endforeach ?>
  </div>
  <footer>
    <p>Мой первый блог <br>Copyright © 2015</p>
  </footer>
</div>
</body>
</html>