<?php

include_once "class/EmployeeInterface.php";
include_once "class/ManagerInterface.php";
include_once "class/Worker.php";
include_once "class/Manager.php";
include_once "class/Output.php";

$outputFormat = trim(strtolower($_GET['type']));

$workersList1 = array(
    "worker1" => new Worker('Ivan', 50, 'Worker', '2015-02-12'),
    "worker2" => new Worker('Nikolai', 100, 'Worker', '2014-03-13'),
    "worker3" => new Worker('Sergey', 70, 'Worker', '2013-04-14')
);

$workersList2 = array(
    "worker4" => new Worker('Dmitry', 160, 'Worker', '2012-05-15'),
    "worker5" => new Worker('Petr', 120, 'Worker', '2011-06-16'),
    "worker6" => new Worker('Bogdan', 400, 'Worker', '2010-07-17')
);

$manager1 = new Manager('Avraam', '220', 'Manager', '2010-05-15');
foreach($workersList1 as $key => $value){
    $manager1->addEmploye($value);
}

$manager2 = new Manager('Moisha', '180', 'Manager','2017-06-30');
foreach($workersList1 as $key => $value){
    $manager2->addEmploye($value);
}

$managersList = array(
    "manager1" => $manager1,
    "manager2" => $manager2,
);

$output = new Output($outputFormat, $managersList);

switch ($outputFormat) {
    case 'html':
        header('Content-type: text/html');
        echo $output->getHTML();
        break;
    case 'xml':
        header('Content-type: text/xml');
        echo $output->getXML();
        break;
    case 'json':
        header('Content-type: application/json');
        echo $output->getJSON();
        break;
}
