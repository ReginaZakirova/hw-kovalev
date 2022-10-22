<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Ковалев В. А.</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/table.css">
</head>
<!--Ранее в коде на странице была сгенерирована переменная $background_color, которая задает текущий цвет страницы-->
<body <?php echo "style='background-color: $background_color'>" ?>
<div class="wrapper">
    <header class="header">
        <div class="header-wrapper">
            <div>
                <a href="index.php"><img class="logo-img" src="Images/Logo.jpg" alt="Ничоси логотип я выбрал!"></a>
            </div>
            <nav class="nav">
                <ul class="nav-ul">
                    <li><a href="index.php">ГЛАВНАЯ</a></li>
                    <li><a href="table.php">ТАБЛИЦА</a></li>
                    <li><a href="loop.php">ЦИКЛЫ</a></li>
                    <li><a href="array.php">МАССИВЫ</a></li>
                    <li><a href="string.php">СТРОКИ</a></li>
                    <li><a href="auth.php"><img src="Images/Enter.png" alt="Вход"></a></li>
                </ul>
            </nav>
        </div>
        <div style="text-align: right">
            <?php
                echo "Текущий пользователь: <span class='red'>" . $_SESSION["login"] . "</span>";
            ?>
        </div>
    </header>