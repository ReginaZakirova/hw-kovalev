<?php
    require_once("prephp.php"); // Подключение файла с предварительным кодом PHP общим для всех страниц.
    require_once("Text.php");   // Подключение файла с описанием класса Text.
    require_once("header.php"); // Подключение файла с содержимым заголовочной части HTML кода для всех страниц.

        /*  Поместим весь фразовый контент индексного файла в соответствующие объекты класса Text. */
        $name = new Text("Ковалев Виктор");
        $about_me = new Text("Получил высшее образование по специальности 'Промышленная электроника'. " .
            "Практически весь профессиональный путь связан с работой в службах АСУ и КИП различных " .
            "подразделений ПАО 'ММК'. Имеется опыт некоммерческого программирования на языке ассемблера " .
            "для различных архитектур: Atmel AVR, Motorola MC680x, Intel x86. Знаком с базовыми элементами " .
            "языка программирования C. Английский язык - на уровне чтения технической документации.");
        $review = new Text("Для того чтобы сделать задание самостоятельно приходиться перелопатить тонны " .
            "информации для выстраивания системного подхода в обучении, фрагментированность " .
            "в котором обусловлена сжатым курсом в условиях ограниченного времени...");
        /*  Объектов мало не бывает! Только хардкор! Массивы объектов входят в чат... */
        $arr_sign = [
            new Text("HTML"),
            new Text("CSS"),
            new Text("PHP"),
            new Text("BITRIX")
        ];
        $arr_picture = [
            new Text("Ежа просто разрывает от смеха от твоих попыток написать работающий FlexBox код!"),
            new Text("Песик беззаботно нюхает цветок и радуется жизни - ему не нужно читать 60 страниц " .
                "английского текста с описанием спецификации CSS Flexible Box Layout!"),
            new Text("На вопрос помочь с написанием CSS кода котейка ответил просто: 'Не могу - у меня " .
                "лапки!'"),
            new Text("'Регина заставляет самостоятельно искать необходимые теги и свойства для решения " .
                "заданий? Возьми этого наглого ежа и кинь в Регину!' - ухахатывается маленький панда!")
        ];

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
                <h1><?php echo $name->content ?></h1>
            </div>
            <div class="me">
                <p>
                    <?php $about_me->PrintFirstSentenceColor() ?>
                </p>
            </div>
            <div class="review">
                <p>
                    <?php
                        $review->PrintEvenColor();
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
                    <?php echo $arr_sign[0]->content ?>
                </p>
            </div>
            <div class="grid-div1">
                <p>
                    <img src="Images/CSS.png" alt="CSS Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_sign[1]->content ?>
                </p>
            </div>
            <div class="grid-div1">
                <p>
                    <img src="Images/PHP.png" alt="PHP Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_sign[2]->content ?>
                </p>
            </div>
            <div class="grid-div1">
                <p>
                    <img src="Images/Bitrix.png" alt="Bitrix Logo">
                </p>
                <p class="sign">
                    <?php echo $arr_sign[3]->content ?>
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
                    <?php echo $arr_picture[0]->content ?>
                </p>
            </div>
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic2.png" alt="Dog">
                </p>
                <p class="animal">
                    <?php echo $arr_picture[1]->content ?>
                </p>
            </div>
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic3.png" alt="Cat">
                </p>
                <p class="animal">
                    <?php echo $arr_picture[2]->content ?>
                </p>
            </div>
            <div class="grid-div2">
                <p>
                    <img src="Images/Pic4.png" alt="Panda">
                </p>
                <p class="animal">
                    <?php echo $arr_picture[3]->content ?>
                </p>
            </div>
        </section>
        <br>
        <hr>
        <h3> Домашнее задание от 29.09.2022</h3>

        <?php
            /* Подсчет и вывод слов на странице */
            $total_word = $name->GetCountWord() + $about_me->GetCountWord() + $review->GetCountWord();
            foreach($arr_sign as $object) {
                $total_word += $object->GetCountWord();
            }
            foreach($arr_picture as $object) {
                $total_word += $object->GetCountWord();
            }
            echo "<br> Количество слов на странице: $total_word";

            /* Подсчет и вывод гласных букв на странице */
            $total_vowel = $name->GetCountVowel() + $about_me->GetCountVowel() + $review->GetCountVowel();
            foreach($arr_sign as $object) {
                $total_vowel += $object->GetCountVowel();
            }
            foreach($arr_picture as $object) {
                $total_vowel += $object->GetCountVowel();
            }
            echo "<br> Количество гласных букв на странице: $total_vowel<br><br>";

            /* Вывод даты и разницы в днях. */
            /* Не вижу смысла создавать отдельный класс для единичной задачи со временем. */
            $birthdate = "09.01.1982";
            $currentdate = date("d.m.Y");
            echo "Дата рождения: $birthdate <br> Дата текущая: $currentdate <br>";
            echo "Количество дней между датами: " . diff_days($birthdate);
        ?>

    </main>

    <?php
        include_once("footer.php");
