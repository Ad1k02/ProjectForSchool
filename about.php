<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>О нас</title>

   <!-- Ссылка на файл шрифтов Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- Ссылка на настраиваемый файл CSS -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- Начало раздела "О нас" -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Почему выбирают нас?</h3>
         <p>Школа №94 — это учебное заведение, где обучение сочетается с инновационными методами и заботой о каждом ученике. Вот почему наша школа привлекает внимание родителей и учеников.</p>
         <a href="courses.php" class="inline-btn">Наши уроки</a>
      </div>

   </div>

   <div class="box-container">

      

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>Лучшие выпускники</h3>
            <span></span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>Самые лучшие ученики</h3>
            <span></span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>Опытные преподаватели</h3>
            <span></span>
         </div>
      </div>

   </div>

</section>

<!-- Конец раздела "О нас" -->

<!-- Начало раздела "Отзывы студентов" -->



<!-- Конец раздела "Отзывы студентов" -->

<?php include 'components/footer.php'; ?>

<!-- Ссылка на файл настраиваемого JavaScript -->
<script src="js/script.js"></script>
   
</body>
</html>
