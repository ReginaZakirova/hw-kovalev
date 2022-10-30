<?php

class Database
{
    private $hostname;
    private $db_user;
    private $db_password;
    private $db_name;
    private $db_con;
    /* Конструктор инициализирует переменные подключения к БД */
    public function __construct($hostname, $db_user, $db_password, $db_name) {
        $this->hostname = $hostname;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    }
    /* Метод dbConnect() возвращает true в случае успешного подключения к БД или false в противном случае. */
    public function dbConnect() {
        $this->db_con = mysqli_connect($this->hostname, $this->db_user, $this->db_password, $this->db_name);
        if ($this->db_con) {
            mysqli_set_charset($this->db_con, 'utf8');
            return true;
        }
        else {
            return false;
        }
    }
    /* Метод dbPasswordQuery() возвращает значение md5-хэша для запрашиваемого логина из БД. */
    public function dbPasswordQuery($login) {
        $query = "SELECT password FROM auth WHERE login = '" . $login . "'";
        $result = mysqli_query($this->db_con, $query);
        $arr_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $arr_result[0]["password"];
    }
}