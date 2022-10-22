<?php
    require_once("prephp.php"); // Подключение файла с предварительным кодом PHP общим для всех страниц.
    if ($_SESSION["login"]) {
        $_SESSION["last_page"] = "fact.php";
    }
    require_once("header.php"); // Подключение файла с содержимым заголовочной части HTML кода для всех страниц.
?>

    <main class="main">
        <h3>Страница fact.html</h3>
    </main>

    <?php
    include_once("footer.php");
