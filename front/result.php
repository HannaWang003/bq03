<?php
$row = $Order->find(['no' => $_GET['no']]);
$seats = unserialize($row['seats']);
?>
<style>
table,
tr,
td {
    border: 1px solid #333;
}
</style>
<table style="width:80%;margin:auto">
    <tr>
        <td colspan="2">
            <h1 class="ct">感謝您的訂購，你的訂單編號是<?= $row['no'] ?></h1>
        </td>
        <!-- <td></td> -->
    </tr>
    <tr>
        <td style="width:20%">電影名稱:</td>
        <td><?= $row['movie'] ?></td>
    </tr>
    <tr>
        <td>日期:</td>
        <td><?= $row['date'] ?></td>
    </tr>
    <tr>
        <td>場次時間:</td>
        <td><?= $row['sess'] ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <div>座位:</div>
            <?php
            foreach ($seats as $seat) {
                $col = floor($seat / 5) + 1;
                $num = ($seat % 5) + 1;
                echo $col . "排" . $num . "號<br>";
            }

            ?>
        </td>
        <!-- <td></td> -->
    </tr>
    <tr>
        <td colspan="2" style="text-align:center;"><button onclick="location.href='index.php'">確認</button>
        </td>
        <!-- <td></td> -->
    </tr>
</table>