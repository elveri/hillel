<?php
    class Worker
    {
            private $name;
            private $age;
            private $salary;

            private function checkAge(int $age) {
                if($age>0 && $age<=100) return true;
                else return false;
            }

            public function setName(string $name) {
                $this->name = $name;
            }

            public function getName(): ?string {
                return $this->name;
            }

            public function setAge(int $age) {
                if(self::checkAge($age)==true) $this->age = $age;
                else die('Error: Age value is incorect, please check input data!');
            }

            public function getAge(): ?int {
                return $this->age;
            }

            public function setSalary(int $salary) {
                $this->salary = $salary;
            }

            public function getSalary(): ?int {
                return $this->salary;
            }
    }

    // create new objects WorkerFirst
    $WorkerFirst = new Worker();

    // set param for new object WorkerFirst
    $WorkerFirst->setName('Иван');
    $WorkerFirst->setAge(25);
    $WorkerFirst->setSalary(1000);

    // create new object WorkerSecond
    $WorkerSecond = new Worker();

    // set param for new object WorkerSecond
    $WorkerSecond->setName('Вася');
    $WorkerSecond->setAge(26);
    $WorkerSecond->setSalary(2000);

    // get values from WorkerFirst methods
    $WorkerFirstAge = $WorkerFirst->getAge();
    $WorkerFirstSalary = $WorkerFirst->getSalary();

    // get values from WorkerSecond methods
    $WorkerSecondAge = $WorkerSecond->getAge();
    $WorkerSecondSalary = $WorkerSecond->getSalary();

    echo 'Total worker age: '.$TotalAge = $WorkerFirstAge + $WorkerSecondAge.'<br>';
    echo 'Total worker salary: '.$TotalSalary = $WorkerFirstSalary + $WorkerSecondSalary.'<br>';

    // function for output worker's name and age
    function GetNameAge($worker) {
        echo "The name of the worker is {$worker->getName()}, and his age is {$worker->getAge()} years old.<br>";
    }

    GetNameAge($WorkerFirst);
    GetNameAge($WorkerSecond);

?>