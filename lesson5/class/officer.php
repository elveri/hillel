<?php

class officer extends soldier
{
    public $health;

    public function __construct(int $soldierDamage, array $bodyParts, int $health)
    {
        $this->soldierDamage = $soldierDamage;
        $this->bodyParts = $bodyParts;
        $this->health = $health;
    }

    public function setSelectedWeapon(string $selectedWeapon)
    {
        if(empty($selectedWeapon)) {
            $this->selectedWeapon = $this->weaponList['gun'];
        }
        else {
            $this->selectedWeapon = $this->weaponList[$selectedWeapon];
        }

    }
}