<?php
/* В данном файле содержится предварительный код PHP общий для всех страниц сайта. */

if (isset($_COOKIE[session_name()])) {
    session_start();
    if (!isset($_SESSION["login"])) {
        setcookie(session_name(), session_id(), time() - 60 * 60 * 24);
        session_destroy();
        header('Location: auth.php');
    }
}

/*  По условию задания выбор цвета для страницы не связан с авторизацией и значит доступен для каждого
    посетителя сайта. В таком случае будем запоминать выбранный цвет страницы посредством генерации
    куки с именем "background_color" и длительностью жизни в неделю. */
$background_color = "#fffff";   // Определим переменную в которой будем задавать текущий цвет для страницы
                                // и присвоим ей значение по умолчанию в виде белого цвета.
if ($_GET["color"]) {           // Если поступил запрос на изменение цвета,
    $background_color = $_GET["color"]; // то фиксируем новый цвет в переменной $background_color.
    /* Генерируем куку c выбранным цветом и сроком жизни в неделю. */
    setcookie("background_color", $background_color, time() + 60 * 60);
}
else {                                      // Если не было запроса на изменение цвета,
    if ($_COOKIE["background_color"]) {     // но существует кука с заданным цветом,
        $background_color = $_COOKIE["background_color"];   // то переопределяем переменную $background_color.
    }
}