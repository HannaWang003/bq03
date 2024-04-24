<?php
include_once "db.php";
$now = $Poster->find($_POST['id']);
$chg = $Poster->find($_POST['chg']);
$tmp = $now['rank'];
$now['rank'] = $chg['rank'];
$chg['rank'] = $tmp;
$Poster->save($now);
$Poster->save($chg);
