<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>Мой первый блог</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
  <h1>Мой первый блог</h1>
  <div>
    <!-- Если форма запол. правильно данные будут переданы методом POST в глобал. массиве -->
	<!-- Ассоциативный глобальный массив $_GET['action'] = 'add' -->
	<!-- Чтобы "не потерять значения массива GET, мы их, грубо говоря, переприсваиваем" -->
    <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
	  <label>
	    Название
		<!-- POST с индексом title, а значение то что будет введено -->
		<input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
	  </label>
	  <label>
	    Дата
		<!-- POST с индексом date, а значение то что будет введено -->
        <input type="date" name="date" value="<?=$article['date']?>" class="form-item" required>
	  </label>
	  <label>
	    Содержимое
		<!-- POST с индексом content, а значение то что будет введено -->
		<textarea class="form-item" name="content" required>
		  <?=$article['content']?>
		</textarea>
	  </label>
	  <!-- Кнопка для отправки данных формы на сервер -->
      <input type="submit" value="Сохранить" class="btn">
	</form>
  </div>
  <footer>
    <p>Мой первый блог <br>Copyright © 2015</p>
  </footer>
</div>
</body>
</html>