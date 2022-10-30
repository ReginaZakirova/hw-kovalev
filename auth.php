<?php
    require_once("Database.php"); // Подключение файла с описанием класса Database (подключение и запросы к БД)

    /* Массив хранящий пары Логин - md5-хэш пароля */
    $arr_password = [
        "Виктор" => "698d51a19d8a121ce581499d7b701668", // md5-хэш для пароля 111
        "Регина" => "bcbe3365e6ac95ea2c0343a2395834dd", // md5-хэш для пароля 222
        ];
    /* Если пришла сессионная кука, то возобновить сессию. В данном состоянии для пользователя на данной странице
       авторизации не будет доступна форма авторизации. Таким образом он сможет только выйти из аккаунта при желании. */
    if (isset($_COOKIE[session_name()])) {
        session_start();
        /* Теперь необходимо проверить не было ли превышено время жизни сессионного хранилища на сервере в случае
           если пользователь был неактивен. Если время жизни было превышено при старте исполнения скрипта сборщик мусора
           сессий мог уничтожить ее (с какой либо вероятностью в зависимости от настроек сессий в файле php.ini
           и вся хранившаяся информация в массиве $_SESSION уже недоступна. Значит вновь стартовавшая сессия по сути
           является пустой и уже не хранит актуальную информацию о сессии и ее придется принудительно уничтожить,
           поле чего произвести редирект на страницу авторизации! */
        if (!isset($_SESSION["login"])) {
            setcookie(session_name(), session_id(), time() - 60 * 60 * 24);
            session_destroy();
            header('Location: auth.php');
        }
    }
    /* Проверка условий авторизации */
    if (!empty($_POST)) {
        /* Создание нового объекта класса Database. */
        $db = new Database("localhost", "Victor", "1", "site");
        /* Если база данных не была успешно подключена остановить дальнейшее выполнение и выдать сообщение */
        if (!($db->dbConnect())) {
            die("<br>Ошибка базы данных! Обратитесь к администратору сайта!");
        }
        else {
            if (($db->dbPasswordQuery($_POST["login"])) == md5($_POST["password"])) {
                /* Будем иницировать новую сессию только для авторизованных пользователей! */
                session_start();
                $_SESSION["login"] = $_POST["login"];    // Текущий пользователь сессии
                /* После успешной авторизации переходим на главную страницу сайта */
                header("Location: index.php");
            } else {
                $auth_fail = true;  // Флаг проваленной авторизации
            }
        }
    }
    /* Проверка нажатия кнопки выхода из аккаунта и ликвидации сессии */
    if ($_GET["logout"] == "1") {
        session_unset();
        setcookie(session_name(), session_id(), time() - 60 * 60 * 24);
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Ковалев В. А.</title>
    <link rel="stylesheet" href="Styles/auth.css">
</head>
<body <?php echo "style='background-color: $background_color'>" ?>
    <main>
        <div class="auth-wrapper">
            <h1>Авторизация</h1>
            <?php
                if ($auth_fail) {
                    echo "
                        <div class='auth-box pink-box'>
                        Неправильные пароль или логин!
                        </div>";
                }
            ?>
            <?php
                if (!$_SESSION["login"]) {
                    echo "
                        <div class='auth-box grey-box'>
                            <form class='auth-form' name='auth' action='auth.php' method='post'>
                                <label class='auth-label'>Логин</label>
                                <input class='auth-input' name='login' type='text'>
                                <label class='auth-label'>Пароль</label>
                                <input class='auth-input' name='password' type='password'>
                                <button class='auth-button' type='submit'>Войти</button>
                            </form>
                        </div>";
                }
            ?>
            <?php
                if ($_SESSION["login"]) {
                    echo "
                        <div class='auth-box green-box'>
                            Текущий пользователь: " . $_SESSION['login'] .
                        "</div >
                        <div class='auth-box grey-box'>
                            <p><a href='fact.php'>Страница fact.php</a></p>
                            <p><a href='bitrix.php'>Страница bitrix.php</a></p>
                            <p>Последнее посещение: " . $_SESSION['last_page'] . "</p>
                        </div>
                        <div class='auth-box grey-box'>
                            <form name='logout' action='auth.php' method='get'>
                                <label class='auth-label'>Выйти и уничтожить сессию</label>
                                 <button class='auth-button' name='logout' value='1' type ='submit'>Выйти</button>
                            </form>
                        </div>";
                }
            ?>
        </div>
    </main>
</body>
</html>

