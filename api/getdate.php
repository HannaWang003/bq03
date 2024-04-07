<?php
include_once "db.php";
$movie = $Movie->find(['text' => $_POST['movie']]);
$ondate = strtotime($movie['ondate'] . "+2 days");
$today = strtotime(date("Y-m-d"));
$diff = ($ondate - $today) / (60 * 60 * 24);
for ($i = 0; $i <= $diff; $i++) {
    $date = date("Y-m-d", strtotime("+$i days"));
    echo "<option>$date</option>";
}
