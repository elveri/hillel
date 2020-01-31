<?php


class weapon
{
    public $weaponName;
    public $damage;
    public $reloadTime;

    public function __construct(string $weaponName, int $damage, int $reloadTime)
    {
        $this->weaponName = $weaponName;
        $this->damage = $damage;
        $this->reloadTime = $reloadTime;
    }

    /**
     * @return int
     */
    public function getWeaponDamage(): int
    {
        return $this->damage;
    }
}