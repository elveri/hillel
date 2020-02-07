<?php


class Worker implements EmployeeInterface
{
    public $workerName;
    public $workerSalary;
    public $workerPosition;
    public $workerStartDate;

    public function __construct(string $workerName, int $workerSalary, string $workerPosition, string $workerStartDate)
    {
        $this->workerName = $workerName;
        $this->workerSalary = $workerSalary;
        $this->workerPosition = $workerPosition;
        $this->workerStartDate = new DateTime($workerStartDate);
    }

    public function getName(): string
    {
        return $this->workerName;
    }

    public function getSalary(): int
    {
        $startWorkYear = $this->workerStartDate->format("Y");
        $yearNow = date("Y");

        $workedYears = $yearNow - $startWorkYear;

        if($workedYears>1) {
            $bonusPercent = ($workedYears-1) * 0.05 + 1;
        }
        $nowSalary = floor($this->workerSalary * $bonusPercent);
        return $this->workerSalary = $nowSalary;
    }

    public function getPosition(): string
    {
        return $this->workerPosition;
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->workerStartDate;
    }

}