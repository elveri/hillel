<?php


class team
{
    public $team;

    public function __construct($team)
    {
        $this->team = $team;
    }

    public function getTeamHealth()
    {
        $teamHealth = array();

        for($i=0; $i<count($this->team); $i++)
        {
            $className = get_class($this->team[$i]);

            $totalHealth = 0;
            $totalHealth = $totalHealth + $this->team[$i]->health;
            $totalHealth = $totalHealth + $this->team[$i]->bodyParts['helmet']->additionalHealth;
            $totalHealth = $totalHealth + $this->team[$i]->bodyParts['armor']->additionalHealth;
/*
            $soldierDamage =$this->team[$i]->soldierDamage;
            $soldierDamage = $soldierDamage + $this->team[$i]->selectedWeapon->damage;

            if($soldierDamage>100) $soldierDamage = 100;
*/
            $teamHealth[$className.'_'.$i] = $totalHealth;//.'-'.$soldierDamage;
        }
        return $teamHealth;
    }

    public function getTeamDamage(): int
    {
        $totalDamage = 0;
        for($i=0; $i<count($this->team); $i++) {
            $soldierDamage =$this->team[$i]->soldierDamage;
            $soldierDamage = $soldierDamage + $this->team[$i]->selectedWeapon->damage;

            if($soldierDamage>100) $soldierDamage = 100;
            $totalDamage = $totalDamage+$soldierDamage;
        }
        return $totalDamage;
    }



}