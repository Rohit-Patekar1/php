<?php

require_once "Person.php";
class Student extends Person
{
    public string $studentId;

    public function __construct($name, $surname, $student)
    {
        $this->studentId = $student;
        parent::__construct($name, $surname);
    }
}
