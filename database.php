<?php
  define('MYSQL_SERVER', 'localhost');
  define('MYSQL_USER', 'root');
  define('MYSQL_PASSWORD', '');
  define('MYSQL_DB', 'blog');
  // Ф-ция подключения  к б.д. blog - "все в одном"
  function db_connect() {
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
	//действие в случаи не подключения
	or die("Error: ".mysqli_error($link));
	// Если кодировка не utf8
	if (!mysqli_set_charset($link, "utf8")) {
	  printf("Error: ".mysqli_error($link));
	}
	// В переменной $link забито через константы подключение к б.д. blog
	return $link;
  }
?>