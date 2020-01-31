<?php


class fight
{
    public $teamOne;
    public $teamTwo;

    public function __construct($teamOne, $teamTwo)
    {
        $this->teamOne = $teamOne;
        $this->teamTwo = $teamTwo;
    }

    public function setTeamOneDamage()
    {
        $teamTwoDamage = $this->teamTwo->getTeamDamage();
        $teamTwoWariorCount = count($this->teamTwo->team);
        $personalDamage = ceil($teamTwoDamage/$teamTwoWariorCount);

        $teamOneWariorCount = count($this->teamOne->team);
        for($i=0; $i<$teamOneWariorCount; $i++)
        {
            $helmetDefense = intval(ceil($this->teamOne->team[$i]->bodyParts['helmet']->additionalHealth - $personalDamage));
            if($helmetDefense>=0)
            {
                $this->teamOne->team[$i]->bodyParts['helmet']->additionalHealth = $helmetDefense;
            }
            else
            {
                $armorDefense = intval(ceil($this->teamOne->team[$i]->bodyParts['armor']->additionalHealth - abs($helmetDefense)));
                if($armorDefense>=0)
                {
                    $this->teamOne->team[$i]->bodyParts['armor']->additionalHealth = $armorDefense;
                }
                else
                {
                    $bodyDefense = intval(ceil($this->teamOne->team[$i]->health - abs($armorDefense)));
                    if($bodyDefense>=0)
                    {
                        $this->teamOne->team[$i]->health = $bodyDefense;
                    }
                    else
                    {
                        unset($this->teamOne->team[$i]);
                    }
                }
            }
        }
        //var_dump($this->teamOne);
    }

    public function getResultHealthTeamOne()
    {
        $teamHealth = array();
        //var_dump($this->teamOne->team);
        for($i=0; $i<count($this->teamOne->team); $i++)
        {
            $className = get_class($this->teamOne->team[$i]);

            $totalHealth = 0;
            $totalHealth = $totalHealth + $this->teamOne->team[$i]->health;
            $totalHealth = $totalHealth + $this->teamOne->team[$i]->bodyParts['helmet']->additionalHealth;
            $totalHealth = $totalHealth + $this->teamOne->team[$i]->bodyParts['armor']->additionalHealth;

            $teamHealth[$className.'_'.$i] = $totalHealth;
        }

        //var_dump($this->teamOne->team);
        return $teamHealth;
    }

    public function setTeamTwoDamage()
    {
        $teamOneDamage = $this->teamOne->getTeamDamage();
        $teamOneWariorCount = count($this->teamOne->team);
        $personalDamage = ceil($teamOneDamage/$teamOneWariorCount);

        $teamTwoWariorCount = count($this->teamOne->team);
        for($i=0; $i<$teamOneWariorCount; $i++)
        {
            $helmetDefense = intval(ceil($this->teamTwo->team[$i]->bodyParts['helmet']->additionalHealth - $personalDamage));
            if($helmetDefense>=0)
            {
                $this->teamTwo->team[$i]->bodyParts['helmet']->additionalHealth = $helmetDefense;
            }
            else
            {
                $armorDefense = intval(ceil($this->teamTwo->team[$i]->bodyParts['armor']->additionalHealth - abs($helmetDefense)));
                if($armorDefense>=0)
                {
                    $this->teamTwo->team[$i]->bodyParts['armor']->additionalHealth = $armorDefense;
                }
                else
                {
                    $bodyDefense = intval(ceil($this->teamTwo->team[$i]->health - abs($armorDefense)));
                    if($bodyDefense>=0)
                    {
                        $this->teamTwo->team[$i]->health = $bodyDefense;
                    }
                    else
                    {
                        unset($this->teamTwo->team[$i]);
                    }
                }
            }
        }
    }

    public function getResultHealthTeamTwo()
    {
        $teamHealth = array();
        //var_dump($this->teamTwo->team);
        for($i=0; $i<count($this->teamTwo->team); $i++)
        {
            $className = get_class($this->teamTwo->team[$i]);

            $totalHealth = 0;
            $totalHealth = $totalHealth + $this->teamTwo->team[$i]->health;
            $totalHealth = $totalHealth + $this->teamTwo->team[$i]->bodyParts['helmet']->additionalHealth;
            $totalHealth = $totalHealth + $this->teamTwo->team[$i]->bodyParts['armor']->additionalHealth;

            $teamHealth[$className.'_'.$i] = $totalHealth;
        }

       // var_dump($this->teamOne->team);
        return $teamHealth;
    }
}