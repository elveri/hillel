<?php


interface ManagerInterface
{
    public function getEmployees(): array;
    public function addEmploye(EmployeeInterface $employe): void;
    public function getCountEmployees(): int;
}