<?php
include_once "db.php";
$tmp = $Movie->find($_POST);
$tmp['sh'] = ($tmp['sh'] == 1) ? "0" : "1";
$Movie->save($tmp);