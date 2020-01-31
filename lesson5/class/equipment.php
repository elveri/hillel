<?php


class equipment
{
    public $armorName;
    public $bodyPart;
    public $additionalHealth;

    /**
     * armor constructor.
     * @param $armorName
     * @param $bodyPart
     * @param $additionalHealth
     */
    public function __construct(string $armorName, $bodyPart, int $additionalHealth)
    {
        $this->armorName = $armorName;
        $this->bodyPart = $bodyPart;
        $this->additionalHealth = $additionalHealth;
    }

    /**
     * @return int
     */
    public function getAdditionalHealth(): int
    {
        return $this->additionalHealth;
    }
}