<?php

// Full Name: Nader Nasiri
// Student ID: R32002771



// Task 1
// Class Constant


class Library
{
    // This is a constant because the maximum number of books is a fixed rule.
    const MAX_BOOKS = 3;
}

echo "<h2>Task 1: Class Constant</h2>";
echo "Maximum books allowed: " . Library::MAX_BOOKS;

echo "<hr>";



// Task 2
// Static Property and Method


class StudentCounter
{
    public static $count = 0;

    public static function addStudent()
    {
        self::$count++;
    }
}

StudentCounter::addStudent();
StudentCounter::addStudent();
StudentCounter::addStudent();

echo "<h2>Task 2: Static Property and Static Method</h2>";
echo "Total students: " . StudentCounter::$count;

echo "<hr>";



// Task 3
// Abstract Class and Abstract Method


abstract class Vehicle
{
    abstract public function start();
}


class Car extends Vehicle
{
    public function start()
    {
        echo "Car engine started.";
    }
}


class Bike extends Vehicle
{
    public function start()
    {
        echo "Bike started.";
    }
}


$car = new Car();
$bike = new Bike();

echo "<h2>Task 3: Abstract Class and Abstract Method</h2>";

$car->start();

echo "<br>";

$bike->start();

?>