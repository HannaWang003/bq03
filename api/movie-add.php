<?php
include_once "db.php";
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
if (!empty($_FILES['mp4']['tmp_name'])) {
    move_uploaded_file($_FILES['mp4']['tmp_name'], "../img/" . $_FILES['mp4']['name']);
    $_POST['mp4'] = $_FILES['mp4']['name'];
}
$_POST['ondate'] = $_POST['y'] . "-" . $_POST['m'] . "-" . $_POST['d'];
unset($_POST['y'], $_POST['m'], $_POST['d']);
$rank = $Movie->max('rank');
$_POST['rank'] = $rank + 1;
$Movie->save($_POST);
to("../back.php?do=movie");
