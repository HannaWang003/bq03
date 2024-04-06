<?php
include_once "db.php";
$today = date("Y-m-d");
$before = date("Y-m-d", strtotime("- 2days"));
$movies = $Movie->all("where `sh`=1 && `ondate` between '$before' and '$today' order by rank");
dd($movies);
