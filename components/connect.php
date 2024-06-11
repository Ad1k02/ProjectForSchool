<?php

   $db_name = 'mysql:host=localhost;dbname=course_db;port=3306';
  // "mysql:host=localhost;dbname=course_db"

   $user_name = 'root';
   $user_password = 'root';

   $conn = new PDO($db_name, $user_name, $user_password);

   
   function unique_id() {
      $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $rand = array();
      $length = strlen($str) - 1;
      for ($i = 0; $i < 20; $i++) {
          $n = mt_rand(0, $length);
          $rand[] = $str[$n];
      }
      return implode($rand);
   }


   
/*
$db_name = 'mysql:host=localhost;dbname=course_db';
$user_name = 'adik';
$user_password = 'adik02'; // Замените 'your_password' на ваш реальный пароль

try {
    $conn = new PDO($db_name, $user_name, $user_password);
    echo "Connected successfully"; // Сообщение, если соединение успешно
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Сообщение об ошибке, если соединение не удалось
}*/



?>


