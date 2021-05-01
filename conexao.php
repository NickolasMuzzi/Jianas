<?php
define('HOST', '127.0.0.1');
define('usuario', 'saiinfo2018');
define('senha', 'saiinfo2018pass');
define('db', 'jianas');

$conexao = mysqli_connect(HOST,usuario,senha,db) or die("Não foi possivel conectar.");
?>