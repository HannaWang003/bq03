<?php
include_once "db.php";
$now = $Movie->find($_POST['id']);
$chg = $Movie->find($_POST['chg']);
$tmp = $now['rank'];
$now['rank'] = $chg['rank'];
$chg['rank'] = $tmp;
$Movie->save($now);
$Movie->save($chg);