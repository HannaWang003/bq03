<?php
include_once "db.php";
$today = date("Y-m-d");
$g = date("G");
$start = ($g > 14 && $_POST['date'] == $today) ? 6 - floor((24 - $g + 1) / 2) : 0;
for ($i = $start; $i < 5; $i++) {
    echo "<option>$sess[$i]</option>";
}
