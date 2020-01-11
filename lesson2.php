<?php

function CheckName($var) {
    if (empty($var)) die('Error: Empty variable');
    $user = preg_replace('/[^A-Za-z0-9]/', '', $var);
    if ($user != $var) die('Error: Variable includes invalid characters');

    return $user;
}

$UserName = CheckName($_GET['user']);
echo 'Hi '.$UserName;


