<?php
include_once "db.php";
$id = $Order->max('id') + 1;
$_POST['no'] = date("Ymd") . sprintf("%04d", $id);
$_POST['seats'] = serialize($_POST['seats']);
$Order->save($_POST);
to("../index.php?do=result&no={$_POST['no']}");
