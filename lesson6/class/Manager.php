<?php


class Manager extends Worker implements ManagerInterface
{
    public $worker = array();

    public function getEmployees(): array
    {
        return $this->worker;
    }

    public function addEmploye(EmployeeInterface $employe): void
    {
        $this->worker[] = $employe;
    }

    public function getCountEmployees(): int
    {
        $workersCount = count($this->worker);
        return $workersCount;
    }

    public function getSalary(): int
    {
        $startWorkYear = $this->workerStartDate->format("Y");
        $yearNow = date("Y");

        $workedYears = $yearNow - $startWorkYear;

        if($workedYears>1) {
            $bonusPercent = ($workedYears-1) * 0.05 + 1 + $this->getCountEmployees() * 0.02;
        }
        $nowSalary = floor($this->workerSalary * $bonusPercent);
        return $this->workerSalary = $nowSalary;
    }
}