    <?php
        require_once("header.php");
    ?>

    <main class="main">
        <h3>Авторизация</h3>
        <br>
        <form name="enter" action="enter.php" method="post">
            <p class="center">
                Логин
                <br>
                <input name="login" type="text">
            </p>
            <p class="center">
                Пароль
                <br>
                <input name="password" type="password">
            </p>
            <p>
                <button style="margin: 20px auto; display: block" type="submit">
                    Войти
                </button>
            </p>
        </form>

        <?php
        $arr_passwd = [
            "Виктор" => "698d51a19d8a121ce581499d7b701668", // md5-хэш для пароля 111
            "Регина" => "bcbe3365e6ac95ea2c0343a2395834dd", // md5-хэш для пароля 222
        ];
        if ($arr_passwd[$_POST["login"]] == md5($_POST["password"])) {
            echo "<p class='center'> Добро пожаловать, ". $_POST["login"] . "!<br>";
        }
        else {
            echo "<p class='center'><img src='Images/Fail.jpg' alt='Ты не пройдешь!'></p>";
        }
        ?>


    </main>

    <?php
        include_once("footer.php");
