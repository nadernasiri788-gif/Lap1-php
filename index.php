

<?php


// Part A, B and C
// Student Class


class Student
{
public studentId;
public $department;

// Constructor
function __construct($name, $studentId = null, $department = null) { $this->name = $name; $this->studentId = $studentId; $this->department = `$department;
}

// Part A
function sayHello()
{
echo "Hello! I am a student.<br>";
}

// Part B and C
function showInfo()
{
echo "Name: " . this->studentId . "<br>";
echo "Department: " . $this->department . "<br>";
}
}

// Part A
$student1 = new Student("Ahmad", 1001, "Computer Science");

$student1->sayHello();

echo "<hr>";

// Part B
$student1->showInfo();

echo "<hr>";

// Part C
$student2 = new Student(
"Sara",
1002,
"Information Systems"
);

$student2->showInfo();

echo "<hr>";


// Part D
// BankAccount Class


class BankAccount
{
public balance;

// Constructor
function __construct(balance)
{
ownerName;
balance;
}

function showBalance()
{
echo "Balance: " . $this->balance . "<br>";
}
}

$account1 = new BankAccount(
"Ahmad",
5000
);

echo "Owner: " . $account1->ownerName . "<br>";

$account1->showBalance();

echo "<hr>";


// Part E and F
// Inheritance


class Person
{
public $name;

// Constructor
function __construct($name) { $this->name = `$name;
}

function introduce()
{
echo "My name is " . $this->name . "<br>";
}
}

class StudentPerson extends Person
{
function study()
{
echo $this->name . " is studying.<br>";
}
}

$`student3 = new StudentPerson("Ahmad");

$student3-&gt;introduce(); $student3->study();

echo "<hr>";


// Part G
// Vehicle and Car


class Vehicle
{
protected $brand;

// Constructor
function __construct(latex
brand) {

this->brand = $brand;
}

function start()
{
echo "The vehicle is starting.<br>";
}
}

class Car extends Vehicle
{
function showBrand()
{
echo "Car brand: " . $this->brand;
}
}

$car1 = new Car("Toyota");

$car1->start();
$car1->showBrand();

?>