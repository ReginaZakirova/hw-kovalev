<?php
    require_once("prephp.php"); // Подключение файла с предварительным кодом PHP общим для всех страниц.
    require_once("header.php"); // Подключение файла с содержимым заголовочной части HTML кода для всех страниц.
?>

    <main class="main">
        <h3>Циклы</h3>

    <?php
        /* ******************************    Задание 19 - 2    ****************************** */
        echo "<br> Задание 19 - 2 <br>";
        /*  Числа кратные 3 и 5, т.е. кратные 15 (15, 30, 45, ...) выводим курсивом и жирным.
            Числа кратные трем (3, 6, 9, ...) выводим курсивом. */
        for ($i = 1; $i <= 50; $i++) {
            if (($i % 3) == 0) {
                if (($i % 5) == 0) {
                    echo "<b><i>" . $i . "</i></b> ";
                }
                else {
                    echo "<i>" . $i . "</i> ";
                }
            }
            else {
                echo $i . " ";
            }
        }
        echo "<br>";
        /**************************************************************************************/


        /* ******************************    Задание 19 - 4    ****************************** */
        echo "<br> Задание 19 - 4 <br>";
        /*  Будем каждый элемент последовательности задавать парой переменных, где
            $i - знаменатель дроби, а $j - числитель.
            Как можно заметить на каждом шаге последовательности переменная $j увеличивается на 3,
            а переменная $i увеличивается на 1, что очень удобно, так как позволяет переменную $i
            использовать как счетчик элементов последовательности. */
        $sum = $i = $j = 1;
        do {
            $sum += (($j += 3) / ++$i);
        } while ($sum < 10);
        echo "Минимальное количество элементов последовательности: " . $i . "<br>";
        /**************************************************************************************/


        /* ******************************    Задание 20 - 1    ****************************** */
        echo "<br> Задание 20 - 1 <span class='red'> Решение через функцию</span><br>";

        function evensum($number)
        {
            $sum = 0;
            while ($number != 0) {
                $digit = $number % 10;
                if (($digit % 2) == 0) {
                    $sum += $digit;
                }
            $number = (int)($number / 10);
            }
            return $sum;
        }

        $K = 1234567890;
        echo "Сумма всех четных цифр числа $K равна " . evensum($K) . "<br>";
        /**************************************************************************************/


        /* ******************************    Задание 21 - 1    ****************************** */
        echo "<br> Задание 21 - 1 <span class='red'> Решение через функцию</span><br>";

        function numcol($lo, $hi) {
            if ($lo < $hi) {
                for ($i = $lo; $i <= $hi; $i++) {
                    echo $i . "<br>";
                }
            }
            else {
                echo "Некорректные входные параметры!<br>";
            }
        }

        numcol(5, 13);
        /**************************************************************************************/


        /* ******************************    Задание 21 - 2    ****************************** */
        echo "<br> Задание 21 - 2 <br>";
        $num = 1000; $i = 0;
        while (($num /= 2) >= 50) {
            $i++;
        }
        echo "Количество итераций: " . ++$i . "<br>";
        for ($num = 1000, $i = 0; (($num /= 2) >= 50); $i++) {
        }
        echo "Количество итераций: " . ++$i . "<br>";
        /**************************************************************************************/


        /* ******************************    Задание 21 - 3    ****************************** */
        echo "<br> Задание 21 - 3 <br>";
        /*  Можно заметить, что какое бы натуральное число из диапазона [0 .. 10] мы не задали
            в выводе всегда будет присутствовать 0, поэтому будет разумно сразу вывести его, тем
            самым облегчив задачу вывода всей последовательности, так как количество запятых меньше
        количества цифр на 1 */
        $i = 3;
        echo "0";
        for ($n = 1, $i = 10 - $i; $n <= $i; $n++) {
            echo ", $n";
        }
        /**************************************************************************************/
    ?>

    </main>

    <?php
        include_once("footer.php");