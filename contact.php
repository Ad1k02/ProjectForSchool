<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $name = $_POST['name']; 
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email']; 
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number']; 
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg']; 
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_contact->execute([$name, $email, $number, $msg]);

   if($select_contact->rowCount() > 0){
      $message[] = 'Сообщение уже отправлено!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, number, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);
      $message[] = 'Сообщение успешно отправлено!';
   }

}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Контакты</title>

   <!-- Ссылка на файл шрифтов Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- Ссылка на настраиваемый файл CSS -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- Секция контактов начинается -->

<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>Свяжитесь с нами</h3>
         <input type="text" placeholder="Введите ваше имя" required maxlength="100" name="name" class="box">
         <input type="email" placeholder="Введите ваш email" required maxlength="100" name="email" class="box">
         <input type="number" min="0" max="9999999999" placeholder="Введите ваш номер телефона" required maxlength="10" name="number" class="box">
         <textarea name="msg" class="box" placeholder="Введите ваше сообщение" required cols="30" rows="10" maxlength="1000"></textarea>
         <input type="submit" value="Отправить сообщение" class="inline-btn" name="submit">
      </form>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>Номер телефона</h3>
         <a href="tel:1234567890">0771710116</a>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>Email</h3>
         <a href="mailto:adidns183@gmail.com">adidns183@gmail.come</a>
         
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>Адрес </h3>
         <a href="#">​Проспект Чынгыза Айтматова, 66</a>
      </div>


   </div>

</section>

<!-- Секция контактов завершается -->











<?php include 'components/footer.php'; ?>  

<!-- Ссылка на файл настраиваемого JavaScript -->
<script src="js/script.js"></script>
   
</body>
</html>
