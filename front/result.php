<?php
$row = $Order->find(['no' => $_GET['no']]);
?>
<h1 class="ct">感謝您的訂購，你的訂單編號是<?= $row['no'] ?></h1>