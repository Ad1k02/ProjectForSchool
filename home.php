<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Главная</title>

   <!-- Ссылка на CDN шрифтов Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- Ссылка на пользовательский CSS-файл -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- Начало раздела быстрого выбора -->

<section class="quick-select">

   <h1 class="heading">Быстрый доступ</h1>

   <div class="box-container">

      <?php
         if($user_id != ''){
      ?>
      <div class="box">
         <h3 class="title">Лайки и комментарии</h3>
         <p>Всего лайков : <span><?= $total_likes; ?></span></p>
         <a href="likes.php" class="inline-btn">Посмотреть лайки</a>
         <p>Всего комментариев : <span><?= $total_comments; ?></span></p>
         <a href="comments.php" class="inline-btn">Посмотреть комментарии</a>
         <p>Сохраненные плейлисты : <span><?= $total_bookmarked; ?></span></p>
         <a href="bookmark.php" class="inline-btn">Посмотреть закладки</a>
      </div>
      <?php
         }else{ 
      ?>
      <div class="box" style="text-align: center;">
         <h3 class="title">Пожалуйста, войдите или зарегистрируйтесь</h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn">Войти</a>
            <a href="register.php" class="option-btn">Регистрация</a>
         </div>
      </div>
      <?php
      }
      ?>

      


      <div class="box tutor">
         <h3 class="title">Преподаватели</h3>
         <p>Если вы преподаватель то вам сюда!</p>
         <a href="admin/register.php" class="inline-btn">Войти</a>
      </div>

      <div class="box tutor">
      <h3 class="title">Всем ученикам</h3>
      <p>Если вы хотите пройти тест по математике то попробуйте!</p>
      <a href="process_test.php" class="inline-btn">Тест</a>
      </div>

      


   </div>

</section>

<!-- Конец раздела быстрого выбора -->

<!-- Начало раздела курсов -->

<section class="courses">

   <h1 class="heading">Уроки</h1>

   <div class="box-container">

   <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC LIMIT 6");
         $select_courses->execute(['active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_course['date']; ?></span>
            </div>
         </div>
         <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fetch_course['title']; ?></h3>
         <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">Просмотреть плейлист</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Курсы еще не добавлены!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="courses.php" class="inline-option-btn">Просмотреть</a>
   </div>

</section>

<!-- Конец раздела курсов -->

<!-- Начало раздела подвала -->

<?php include 'components/footer.php'; ?>
<!-- Подвал завершается здесь -->

<!-- Ссылка на пользовательский JS-файл -->
<script src="js/script.js"></script>
   
</body>
</html>
