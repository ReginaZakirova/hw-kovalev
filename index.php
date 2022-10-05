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

        /*  Функция evencolor() выводит четные и нечетные слова строки разным цветом */
        function evencolor($str) {
            $arr = explode(' ', $str);
            /* Вывод четных и нечетных слов согласно состоянию логического флага четного слова $even */
            $even = false;
            foreach ($arr as $word) {
                $even = !$even; // Инвертируем флаг четности каждый раз.
                if ($even) {
                    echo "<span class='red'> $word  </span>";
                }
                else {
                    echo "<span class='blue'> $word  </span>";
                }
            }
        }

        /*  Функция str_count_word() возвращает количество слов в строке */
        function str_count_word($str) {
            $arr = explode(' ', $str);
            $count = 0;
            foreach ($arr as $word) {
                    $count++;
                    /* Проверка на одиночные спецсимволы */
                    if ($word == ',' or $word == ':' or $word == '-') {
                        $count--;
                    }
            }
            return $count;
        }

        /*  Функция str_count_char() возвращает количество гласных букв в строке */
        function str_count_vowel($str) {
            $arr = mb_str_split($str);
            $count = 0;
            /* Подсчет гласных букв выполняется по многосложному логическому условию - перебором всех гласных */
            foreach ($arr as $char) {
                    if ($char == 'а' or $char == 'е' or $char == 'и' or $char == 'о' or $char == 'у' or
                        $char == 'ы' or $char == 'э' or $char == 'ю' or $char == 'я' or $char == 'А' or
                        $char == 'Е' or $char == 'И' or $char == 'О' or $char == 'У' or $char == 'Э' or
                        $char == 'Ы' or $char == 'Ю' or $char == 'Я') {
                        $count++;
                    }
            }
            return $count;
        }

        /* Функция diff_days() возвращает разницу в датах */
        function diff_days($birthdate) {
            /* Определяем разницу в датах посредством функции strtotime() по UNIX времени в секундах.
               Для этого предварительно переформатируем дату рождения с российского на американский формат,
               как того требует функция strtotime() */
            $birthdate = str_replace(".", "-", $birthdate);
            return floor((strtotime(date("d-m-Y")) - strtotime($birthdate)) / (60 * 60 * 24));
        }

        /* !!! ИСПОЛЬЗОВАНИЕ ПОЛЬЗОВАТЕЛЬСКИХ ФУНКЦИЙ СМОТРЕТЬ В КОНЦЕ ДАННОЙ СТРАНИЦЫ !!! */
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
                        evencolor($arr_content["review_text"]);
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
            /* Подсчет и вывод слов на странице */
            $total_word = 0;
            foreach($arr_content as $string) {
                $total_word += str_count_word($string);
            }
            echo "<br> Количество слов на странице: $total_word";

            /* Подсчет и вывод гласных букв на странице */
            $total_vowel = 0;
            foreach($arr_content as $string) {
                $total_vowel += str_count_vowel($string);
            }
            echo "<br> Количество гласных букв на странице: $total_vowel<br><br>";

            /* Вывод даты и разницы в днях */
            $birthdate = "09.01.1982";
            $currentdate = date("d.m.Y");
            echo "Дата рождения: $birthdate <br> Дата текущая: $currentdate <br>";
            echo "Количество дней между датами: " . diff_days($birthdate);
        ?>

    </main>

    <?php
        include_once("footer.php");
