<?php

require_once "Student.php";
class Person
{
    public $name;
    public $surname;
    public $age;
    public static $counter = 0;

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        self::$counter++;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public static function getcounter()
    {
        return self::$counter;
    }
}
