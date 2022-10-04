    <?php
        require_once("header.php");
        /*  Поместим весь фразовый контент индексного файла в один ассоциативный массив. */
        $arr_content = [
                "name_text" => "Ковалев Виктор",
                "me_text" => "Получил высшее образование по специальности 'Промышленная электроника'. " .
                    "Практически весь профессиональный путь связан с работой в службах АСУ и КИП различных " .
                    "подразделений ПАО 'ММК'. Имеется опыт некоммерческого программирования на языке ассемблера " .
                    "для различных архитектур: Atmel AVR, Motorola MC680x, Intel x86. Знаком с базовыми элементами " .
                    "языка программирования C. Английский язык - на уровне чтения технической документации.",
                "review_text" => "Для того чтобы сделать задание самостоятельно приходиться перелопатить тонны " .
                    "информации для выстраивания системного подхода в обучении, фрагментированность " .
                    "в котором обусловлена сжатым курсом в условиях ограниченного времени...",
                "sign1" => "HTML",
                "sign2" => "CSS",
                "sign3" => "PHP",
                "sign4" => "BITRIX",
                "picture1_text" => "Ежа просто разрывает от смеха от твоих попыток написать работающий FlexBox код!",
                "picture2_text" => "Песик беззаботно нюхает цветок и радуется жизни - ему не нужно читать 60 страниц " .
                    "английского текста с описанием спецификации CSS Flexible Box Layout!",
                "picture3_text" => "На вопрос помочь с написанием CSS кода котейка ответил просто: 'Не могу - у меня ".
                    "лапки!'",
                "picture4_text" => "'Регина заставляет самостоятельно искать необходимые теги и свойства для решения " .
                    "заданий? Возьми ежа и кинь в Регину!' - ухахатывается маленький панда!"
        ];
        /*  На основе базового массива $arr_content создадим два массива с идентичными ключами:
            1. Массив $arr_content_word состоит из слов с разделением по пробелу
            2. Массив $arr_content_char состоит из одиночных символов
            И да - я использую функцию mb_str_split (>= PHP 7.4) - а что делать!? */
        $arr_content_word = [];
        $arr_content_char = [];
        foreach ($arr_content as $content_key => $content_text) {
            $arr_content_word[$content_key] = explode(' ', $content_text);
            $arr_content_char[$content_key] = mb_str_split($content_text);
        }
    ?>
    <main class="main">
        <!--            Секция main-first           -->
        <section class="main-first">
            <div class="photo">
                <img class="photo-img" src="Images/Me.jpg" alt="Моя фотография" title="Да, это я!">
            </div>
            <div class="name">
                <h1><?php echo $arr_content["name_text"] ?></h1>
            </div>
            <div class="me">
                <p>
                    <?php
                        /*  Будем действовать максимально тупо - просто охватим содержимое первой фразы тегом
                            <span> через функцию str_replace. */
                        echo str_replace("Получил высшее образование по специальности 'Промышленная электроника'. ",
                            "<span class='red'> Получил высшее образование по специальности " .
                            "'Промышленная электроника'. </span>", $arr_content["me_text"]);
                    ?>
                </p>
            </div>
            <div class="review">
                <p>
                    <?php
                    /* Вывод четных и нечетных слов согласно состоянию логического флага четного слова $even */
                        $even = false;
                        foreach ($arr_content_word["review_text"] as $word_review) {
                            $even = !$even; // Инвертируем флаг четности каждый раз.
                            if ($even) {
                                echo "<span class='red'> $word_review  </span>";
                            }
                            else {
                                echo "<span class='blue'> $word_review  </span>";
                            }
                        }
                    ?>
                </p>
            </div>
        </section>
        <!--            Секция main-second           -->
        <section class="main-second">
            <div class="grid-div1">
                <p>
                    <img src="Images/HTML.png" alt="HTML Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_content["sign1"] ?>
                </p>
            </div>
            <div class="grid-div1">
                <p>
                    <img src="Images/CSS.png" alt="CSS Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_content["sign2"] ?>
                </p>
            </div>
            <div class="grid-div1">
                <p>
                    <img src="Images/PHP.png" alt="PHP Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_content["sign3"] ?>
                </p>
            </div>
            <div class="grid-div1">
                <p>
                    <img src="Images/Bitrix.png" alt="Bitrix Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_content["sign4"] ?>
                </p>
            </div>
        </section>
        <!--            Секция main-third            -->
        <section class="main-third">
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic1.png" alt="Hedgehog">
                </p>
                <p class="animal">
                    <?php echo $arr_content["picture1_text"] ?>
                </p>
            </div>
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic2.png" alt="Dog">
                </p>
                <p class="animal">
                    <?php echo $arr_content["picture2_text"] ?>
                </p>
            </div>
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic3.png" alt="Cat">
                </p>
                <p class="animal">
                    <?php echo $arr_content["picture3_text"] ?>
                </p>
            </div>
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic4.png" alt="Panda">
                </p>
                <p class="animal">
                    <?php echo $arr_content["picture4_text"] ?>
                </p>
            </div>
        </section>
        <br>
        <hr>
        <h3> Домашнее задание от 29.09.2022</h3>
        <?php
            /* Подсчет гласных букв выполняется по многосложному логическому условию - перебором всех гласных */
            $char_count = 0;
            foreach ($arr_content_char as $chars) {
                foreach ($chars as $char) {
                    if ($char == 'а' or $char == 'е' or $char == 'и' or $char == 'о' or $char == 'у' or
                        $char == 'ы' or $char == 'э' or $char == 'ю' or $char == 'я' or $char == 'А' or
                        $char == 'Е' or $char == 'И' or $char == 'О' or $char == 'У' or $char == 'Э' or
                        $char == 'Ы' or $char == 'Ю' or $char == 'Я') {
                        $char_count++;
                    }
                }
            }
            echo "<br> Количество гласных на странице: $char_count";

            /* Подсчет слов выполняется за вычетом одиночных спецсимволов */
            $word_count = 0;
            foreach ($arr_content_word as $words) {
                foreach ($words as $word) {
                     $word_count++;
                    /* Проверка на одиночные спецсимволы */
                    if ($word == ',' or $word == ':' or $word == '-') {
                        $word_count--;
                    }
                }
            }
            echo "<br> Количество слов на странице: $word_count<br><br>";

            /* Определяем разницу в датах посредством функции strtotime по UNIX времени в секундах */
            $birthdate = "09.01.1982";
            $currentdate = date("d.m.Y");
            echo "Дата рождения: $birthdate <br> Дата текущая: $currentdate <br>";
            $diffdate = floor((strtotime(date("d-m-Y")) - strtotime("09-01-1982")) / (60 * 60 * 24));
            echo "Количество дней между датами: $diffdate";
        ?>
    </main>
    <?php
        include_once("footer.php");
