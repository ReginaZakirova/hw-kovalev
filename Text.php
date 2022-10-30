<?php

/* Класс Text описывает блок текстового контента. */
class Text
{
    /*  По сути единственное публичное свойство текущего класса - это содержащийся в нем текстовый контент. */
    public $content;
    /*  Приватные свойства $word_content (массив слов текстового контента) и $char_content (массив символов
        текстового контента) используются в работе методов данного класса. */
    private $word_content;
    private $char_content;

    /*  В конструкторе свойство $content будет инициализироваться значением строкового типа независимо от типа данных
        значения переданного в качестве аргумента данной функции-методу. */
    public function __construct($content) {
        if (is_string($content)) {
            $this->content = $content;
        }
        else {
            $this->content = (string) $content;
        }
        $this->word_content = explode(' ', $this->content);
        $this->char_content = mb_str_split($this->content);
    }

    /*  Метод GetCountWord() возвращает количество слов в экземпляре класса Text. */
    public function GetCountWord() {
        $count = 0;
        foreach ($this->word_content as $word) {
            $count++;
            /* Проверка на одиночные спецсимволы */
            if ($word == ',' or $word == ':' or $word == '-') {
                $count--;
            }
        }
        return $count;
    }

    /*  Метод GetCountVowel() возвращает количество гласных букв в экземпляре класса Text. */
    public function GetCountVowel() {
        $count = 0;
        /* Подсчет гласных букв выполняется по многосложному логическому условию - перебором всех гласных */
        foreach ($this->char_content as $char) {
            if ($char == 'а' or $char == 'е' or $char == 'и' or $char == 'о' or $char == 'у' or
                $char == 'ы' or $char == 'э' or $char == 'ю' or $char == 'я' or $char == 'А' or
                $char == 'Е' or $char == 'И' or $char == 'О' or $char == 'У' or $char == 'Э' or
                $char == 'Ы' or $char == 'Ю' or $char == 'Я') {
                $count++;
            }
        }
        return $count;
    }

    /* Метод PrintFirstSentenceColor() выводит текстовый контент, специально окрашивая первое предложение. */
    public function PrintFirstSentenceColor()
    {
        $first_sentence_flag = true;     // Флаг активности первого предложения.
        echo "<span class='red'>";
        foreach ($this->char_content as $char) {
            if ($first_sentence_flag) {
                echo $char;
                if (($char == ".") or ($char == "!") or ($char == "?")) {
                    echo "</span>";
                    $first_sentence_flag = !$first_sentence_flag;
                }
            } else {
                echo $char;
            }
        }
    }

    /*  Метод PrintEvenColor() выводит четные и нечетные слова разным цветом. */
    public function PrintEvenColor() {
        /* Вывод четных и нечетных слов согласно состоянию логического флага четного слова $even */
        $even = false;
        foreach ($this->word_content as $word) {
            $even = !$even; // Инвертируем флаг четности каждый раз.
            if ($even) {
                echo "<span class='red'> $word  </span>";
            }
            else {
                echo "<span class='blue'> $word  </span>";
            }
        }
    }

 }