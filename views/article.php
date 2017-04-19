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
  <div>
    <div class="article">
      <h3><?=$article['title']?></h3>
      <em>Опубликовано: <?=$article['date']?></em>
      <p><?=$article['content']?></p>
    </div>
  </div>

  <footer>
    <p>Мой первый блог <br>Copyright © 2015</p>
  </footer>
</div>
</body>
</html>