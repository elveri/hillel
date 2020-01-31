<?php
include_once("class/weapon.php");
include_once("class/equipment.php");
include_once("class/soldier.php");
include_once("class/officer.php");
include_once("class/team.php");
include_once("class/fight.php");

echo "<h1>Ender's Game</h1>";

$knife = new weapon("knife", 15, 20);
$sword = new weapon("sword", 30, 25);
$lance = new weapon("lance", 45, 25);
$gun = new weapon("gun", 60, 10);
$rifle = new weapon("rifle", 90, 10);

$helmet = new equipment("helmet", "head", 50);
$armor = new equipment("armor", "body", 120);

$weaponList = array(
    "knife" => $knife,
    "sword" => $sword,
    "lance" => $lance,
    "gun" => $gun,
    "rifle" => $rifle,
);

$equipmentList = array(
    "helmet" => $helmet,
    "armor" => $armor,
);

// create Manticora soldiers
$soldierCount = rand(6, 10);

for($i=0; $i<=$soldierCount; $i++)
{
    $soldierDamage = rand(10, 100);

    $equipmentRand = rand(0, 2);
    $soldierEquipmentList = array_slice($equipmentList, $equipmentRand);

    $teamOne[$i] = new soldier($soldierDamage, $soldierEquipmentList, 100);

    $weaponRand = rand(0, 5);
    $soldierWeaponList = array_slice($weaponList, $weaponRand);
    $teamOne[$i]->setWeaponList($soldierWeaponList);

    $defaultWeaponKey = array_rand($weaponList, 1);
    $defaultWeapon = $weaponList[$defaultWeaponKey]->weaponName;
    $teamOne[$i]->setSelectedWeapon($defaultWeapon);
}

// create Manticora officer
$officerDamage = rand(10, 100);

$equipmentRand = rand(0, 2);
$officerEquipmentList = array_slice($equipmentList, $equipmentRand);

$teamOne[$i] = new officer($officerDamage, $officerEquipmentList, 110);

$weaponRand = rand(1, 5);
$officerWeaponList = array_slice($weaponList, $weaponRand);
$teamOne[$i]->setWeaponList($soldierWeaponList);

$defaultWeaponKey = array_rand($weaponList, 1);
$defaultWeapon = $weaponList[$defaultWeaponKey]->weaponName;
$teamOne[$i]->setSelectedWeapon($defaultWeapon);

$manticoraTeam = new team($teamOne);
$manticoraTeamHealth = $manticoraTeam->getTeamHealth();

//var_dump($manticoraTeam);
foreach ($manticoraTeamHealth as $k => $v) {
    echo $k.' = '.$v.'<br>';
}

$manticoraTeamDamage = $manticoraTeam->getTeamDamage();
echo 'Manticora Team Total Damage: '.$manticoraTeamDamage.'<hr>';


// create Dragon soldiers
for($i=0; $i<=$soldierCount; $i++)
{
    $soldierDamage = rand(10, 100);

    $equipmentRand = rand(0, 2);
    $soldierEquipmentList = array_slice($equipmentList, $equipmentRand);

    $teamTwo[$i] = new soldier($soldierDamage, $soldierEquipmentList, 100);

    $weaponRand = rand(0, 5);
    $soldierWeaponList = array_slice($weaponList, $weaponRand);
    $teamTwo[$i]->setWeaponList($soldierWeaponList);

    $defaultWeaponKey = array_rand($weaponList, 1);
    $defaultWeapon = $weaponList[$defaultWeaponKey]->weaponName;
    $teamTwo[$i]->setSelectedWeapon($defaultWeapon);
}

// create Dragon officer
$officerDamage = rand(10, 100);

$equipmentRand = rand(0, 2);
$officerEquipmentList = array_slice($equipmentList, $equipmentRand);

$teamTwo[$i] = new officer($officerDamage, $officerEquipmentList, 110);

$weaponRand = rand(1, 5);
$officerWeaponList = array_slice($weaponList, $weaponRand);
$teamTwo[$i]->setWeaponList($soldierWeaponList);

$defaultWeaponKey = array_rand($weaponList, 1);
$defaultWeapon = $weaponList[$defaultWeaponKey]->weaponName;
$teamTwo[$i]->setSelectedWeapon($defaultWeapon);

$dragonTeam = new team($teamTwo);
$dragonTeamHealth = $dragonTeam->getTeamHealth();

foreach ($dragonTeamHealth as $k => $v) {
    echo $k.' = '.$v.'<br>';
}

$dragonTeamDamage = $dragonTeam->getTeamDamage();
echo 'Dragon Team Total Damage: '.$dragonTeamDamage.'<hr>';

$fight = new fight($manticoraTeam, $dragonTeam);
$fight->setTeamOneDamage();
$manticoraHealthResult = $fight->getResultHealthTeamOne();
echo 'Manticora team health result:<br>';
foreach ($manticoraHealthResult as $l => $m) {
    echo $l.' = '.$m.'<br>';
}
$dragonHealthResult = $fight->getResultHealthTeamTwo();
echo '<hr> Dragon team health result:<br>';
foreach ($dragonHealthResult as $o => $p) {
    echo $o.' = '.$p.'<br>';
}
//$fight->setTeamTwoDamage();