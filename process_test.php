

<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Тест</h2>
        <form action="process_test.php" method="post">
            <p>1. Дана функция f(x) = 5x<sup>3</sup>. Найдите f(2)</p>
            <input type="radio" name="q1" value="a"> a) 40<br>
            <input type="radio" name="q1" value="b"> b) 50<br>
            <input type="radio" name="q1" value="c"> c) 54<br>
            <input type="radio" name="q1" value="d"> d) 35<br>
            
            <p>2. При каких значениях аргумента значение функции у = -0,4х + 5, равно 13?</p>
            <input type="radio" name="q2" value="a"> a) -20<br>
            <input type="radio" name="q2" value="b"> b) -15<br>
            <input type="radio" name="q2" value="c"> c) 20<br>
            <input type="radio" name="q2" value="d"> d) 15<br>
            
            <p>3. Найдите область определения функции у=x/x-1</p>
            <input type="radio" name="q3" value="a"> a) -1&lt;x&lt;1<br>
            <input type="radio" name="q3" value="b"> b) 1<br>
            <input type="radio" name="q3" value="c"> c) x&lt;-1<br>
            <input type="radio" name="q3" value="d"> d) x&gt;1<br>
            
            <p>4. Найдите точки пересечения графика функции с осью абсцисс у = 3х - х<sup>2</sup></p>
            <input type="radio" name="q4" value="a"> a) (1;1)(2;0)<br>
            <input type="radio" name="q4" value="b"> b) (0;0)(1;1)<br>
            <input type="radio" name="q4" value="c"> c) (0;0)(3;0)<br>
            <input type="radio" name="q4" value="d"> d) (0;0)(0;3)<br>
            
            <p>5. Найдите координаты точек пересечения графика с осью ординат у = х<sup>2</sup> - 2х - 3</p>
            <input type="radio" name="q5" value="a"> a) (0;5)<br>
            <input type="radio" name="q5" value="b"> b) (0;1)<br>
            <input type="radio" name="q5" value="c"> c) (1;1)<br>
            <input type="radio" name="q5" value="d"> d) (0;-3)<br>
            
            <p>6. Найдите нули функции: у = 3х<sup>2</sup> + 5х - 2</p>
            <input type="radio" name="q6" value="a"> a) x=1<br>
            <input type="radio" name="q6" value="b"> b) x=5<br>
            <input type="radio" name="q6" value="c"> c) x=1/3, x=-2<br>
            <input type="radio" name="q6" value="d"> d) x=3,x=2<br>
            
            <br>
            <input type="submit" value="Закончить">
        </form>
    </div>
</body>
</html>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты теста</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            margin-bottom: 10px;
            color: #555;
        }
        .result {
            font-weight: bold;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            background-color: #8e44ad;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Результаты теста</h2>
        <div class="results">
            <?php
            $score = 0;
            $answers = [
                "q1" => "b",
                "q2" => "c",
                "q3" => "a",
                "q4" => "c",
                "q5" => "d",
                "q6" => "c"
            ];
            foreach ($_POST as $key => $value) {
                if (array_key_exists($key, $answers) && $value === $answers[$key]) {
                    $score++;
                }
            }
            ?>
            <p>Количество правильных ответов: <span class="result"><?php echo $score; ?></span></p>
            <p>Количество неправильных ответов: <span class="result"><?php echo count($answers) - $score; ?></span></p>
        </div>
        <a href="home.php" class="btn">Вернуться на главную</a>
    </div>
</body>
</html>






