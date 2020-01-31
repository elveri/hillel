<?php


class soldier
{
    public $health;
    public $weaponList;
    public $soldierDamage;
    public $selectedWeapon;
    public $bodyParts;

    public function __construct(int $soldierDamage, array $bodyParts, int $health)
    {
        $this->soldierDamage = $soldierDamage;
        $this->bodyParts = $bodyParts;
        $this->health = $health;
    }

    public function setWeaponList(array $weaponList)
    {
        if(count($weaponList)>0 &&  count($weaponList)<=4) {
            $this->weaponList = $weaponList;
            return true;
        }
        else {
            return false;
        }

    }

    public function setSelectedWeapon(string $selectedWeapon)
    {
        if(empty($selectedWeapon)) {
            $this->selectedWeapon = $this->weaponList['knife'];
        }
        else {
            $this->selectedWeapon = $this->weaponList[$selectedWeapon];
        }

    }


}