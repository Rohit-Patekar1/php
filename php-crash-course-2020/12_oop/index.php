<?php

// What is class and instance

// class Person
// {
//     public $name;
//     public $surname;
//     public $age;

//     public function __construct($name,$surname)
//     {

//     }
// }

// $p = new Person();
// $p->name = 'Brad';
// $p->surname = 'Traversy';

// echo '<pre>';
// var_dump($p);

include_once "Person.php";
include_once "Student.php";

$p = new Person('Brad', 'traversy');

$p->setAge(20);
echo '<pre>';
var_dump($p);
echo '<pre>';
echo $p->getAge();


$p1 = new Person('rohit', 'traversy');

$p1->setAge(20);
echo '<pre>';
var_dump($p1);
echo '<pre>';
echo $p1->getAge();
echo '<pre>';
echo Person::$counter;

$student = new Student("Ramesh", "Patekar", 20);
var_dump($student);
