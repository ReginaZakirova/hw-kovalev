    <?php
        require_once("header.php");
    ?>

    <main class="main">
        <h3>Массивы</h3>

    <?php
        /* ******************************    Задание 14 - 4    ****************************** */
        echo "<br> Задание 14 - 4 <span class='red'> Решение через функцию</span><br>";
        /*  Не будем переусложнять функцию, а пойдем по рациональному пути - сделаем две отдельные функции
            polmin() и negmax() для поиска искомых минимального положительного и максимального отрицательного.
            Обе функции будут возвращать найденное значение или же 0 - в случае если положительных или отрицательных
            чисел соответсвенно в массиве не было найденою */

        function polmin($arr) {
            $polmin = 101;
            foreach ($arr as $value) {
                if (($value > 0) and ($value < $polmin)) {
                    $polmin = $value;
                }
            }
            if ($polmin != 101) {
                return $polmin;
            }
            else {
                return 0;
            }
        }

        function negmax($arr) {
            $negmax = -101;
            foreach ($arr as $value) {
                if (($value < 0) and ($value > $negmax)) {
                    $negmax = $value;
                }
            }
            if ($negmax != -101) {
                return $negmax;
            }
            else {
                return 0;
            }
        }

        /*  Сгенерируем тестовый массив */
        $n = 10;
        echo "Массив: ";
        for ($i = 0; $i < $n; $i++) {
            $arr1[$i] = mt_rand(-100, 100);
            echo "$arr1[$i] ";
        }
        /*  Проверка и вывод результата поиска  */
        $polminres = polmin($arr1);
        $negmaxres = negmax($arr1);
        if (!$polminres) {
            echo "<br>Положительных чисел в массиве нет!<br>";
        }
        else {
            echo "<br>Минимальное положительное значение: $polminres<br>";
        }
        if (!$negmaxres) {
            echo "Отрицательных чисел в массиве нет!<br>";
        }
        else {
            echo "Максимальное отрицательное значение: $negmaxres<br>";
        }
        /**************************************************************************************/


        /* ******************************    Задание 15 - 5    ****************************** */
        echo "<br> Задание 15 - 5 <br>";
        $arr2 = [
            'Иванов' => NULL,
            'Петров' => NULL,
            'Сидоров' => NULL
        ];
        foreach ($arr2 as $name => $value) {
            $arr2[$name] = [
            'математика' => mt_rand(3, 5),
            'физика' => mt_rand(3, 5),
            'химия' => mt_rand(3, 5),
            'информатика' => mt_rand(3, 5)
        ];
        }
        $scores = [
            'математика' => 0,
            'физика' => 0,
            'химия' => 0,
            'информатика' => 0
        ];
        foreach ($arr2 as $value) {
            foreach ($value as $science => $score) {
                $scores[$science] += $score;
            }
        }
        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        foreach ($scores as $science => $score) {
            echo "Суммарная оценка по предмету $science: $score. Средняя оценка: ". round($score / count($arr2),
                1) . "<br>";
        }
        /**************************************************************************************/


        /* ******************************    Задание 15 - 6    ****************************** */
        echo "<br> Задание 15 - 6 <br>";
        $arr3 = [
            'Январь' => NULL,
            'Февраль' => NULL,
            'Март' => NULL,
            'Апрель' => NULL,
            'Май' => NULL,
            'Июнь' => NULL,
            'Июль' => NULL,
            'Август' => NULL,
            'Сентябрь' => NULL,
            'Октябрь' => NULL,
            'Ноябрь' => NULL,
            'Декабрь' => NULL
        ];
        foreach ($arr3 as $month => $value)
            $arr3[$month] = [
                'Куба' => mt_rand(20, 40),
                'Тринидад' => mt_rand(20, 40),
                'Ямайка' => mt_rand(20, 40),
                'Гаити' => mt_rand(20, 40)
            ];
        echo "<pre>";
        print_r($arr3);
        echo "</pre>";
        foreach ($arr3 as $month => $value) {
            $maxtemp = 0;
            foreach ($value as $island => $temp) {
            if ($temp > $maxtemp) {
                $maxtemp = $temp;
            }
        }
        $arrmax[$month] = $maxtemp;
        }
        echo "<pre>";
        print_r($arrmax);
        echo "</pre>";
        /**************************************************************************************/


        /* ******************************    Задание 15 - 7    ****************************** */
        echo "<br> Задание 15 - 7 <br>";
        define('ROW', 5);               // Зададим константой ROW число строк массива
        define('COL', 6);               // Зададим константой COL число столбцов массива
        $mul = 1;                       // Зададим начальное значение произведения максимальных элементов четных столбцов
        /*  Сгенерируем массив 5x6 из случайных элементов в диапазоне [1 .. 100] и выведем его визуальное представление
            с помощью HTML-тега <pre> для сохранения форматирования символами пустого пространства.
        По условию задания нам придется искать максимальное значение в четных столбцах - и здесь мы приходим
        к вопросу: "А какой именно столбец считать четным? Четным по индексу или четным по счету? Чтобы разрешить этот
        казус я решил воспользоваться возможностью языка PHP начинать индексацию с произвольного числа и уровнять эти
        две категории, задавая индексацию столбцов с 1, а не с 0. */
        echo "<pre>";
        for ($i = 0; $i < ROW; $i++) {
            for ($j = 1; $j < COL + 1; $j++) {
                $arr4[$i][$j] = mt_rand(1, 100);
            echo $arr4[$i][$j] . "\t";
            }
        echo "<br>";
        }
        echo "</pre>";
        /*  Для поиска максимальных значений в четных столбцах организуем внешний цикл обхода индекса столбцов,
            начиная с значения 2 и с шагом 2. Для каждого четного столбца будем значению искомого максимального элемента
            $maxcol присваивать значение элемента первой строки. Во внутреннем цикле обхода индекса строк будем искать
            значение максимального элемента. */
        for ($j = 2; $j < COL + 1; $j += 2) {
        $maxcol = $arr4[0][$j];
        for ($i = 1; $i < ROW; $i++) {
            if ($arr4[$i][$j] > $maxcol) {
                $maxcol = $arr4[$i][$j];
            }
        }
        $mul *= $maxcol;            // Переопределяем значение произведения максимальных элементов четных столбцов
        echo "Максимальный элемент в четном столбце $j равен: $maxcol<br>";
        }
        echo "Произведение максимальных элементов в четных столбцах массива равно: $mul";
        /**************************************************************************************/
    ?>

    </main>

    <?php
        include_once("footer.php");