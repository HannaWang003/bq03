<style>
table {
    width: 100%;
}

table,
tr,
th,
td {
    border-collapse: collapse;
}

td {
    text-align: center;
    border-bottom: 1px solid #333;
}

img {
    width: 90px;
}

tbody {
    height: 200px;
}
</style>
<form action="./api/poster.php" method="post">
    <div style="height:300px;overflow:auto">
        <table>
            <thead>
                <tr>
                    <th colspan="4">預告片清單</th>
                </tr>
                <tr style="background:#eee;">
                    <th>預告片海報
                    </th>
                    <th>預告片片名
                    </th>
                    <th>預告片排序
                    </th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $posters = $Poster->all("order by rank");
                $total = $Poster->count();
                foreach ($posters as $idx => $poster) {
                    $up = ($idx == 0) ? $idx : $idx - 1;
                    $down = ($idx == ($total - 1)) ? $idx : $idx + 1;
                ?>
                <tr>
                    <td><img src="./img/<?= $poster['img'] ?>"></td>
                    <td><input type="text" name="text[]" value="<?= $poster['text'] ?>"></td>
                    <td>
                        <button type="button" data-chg="<?= $posters[$up]['id'] ?>">往上</button>
                        <button type="button" data-chg="<?= $posters[$down]['id'] ?>">往下</button>
                        <select name="ani[]">
                            <option value="1">淡入淡出</option>
                            <option value="2">縮放</option>
                            <option value="3">滑入滑出</option>
                        </select>
                    </td>
                    <td><input type="checkbox" name="sh[]" value="<?= $poster['id'] ?>"
                            <?= ($poster['sh'] == 1) ? "checked" : "" ?>>隱藏
                        <input type="checkbox" name="del[]" value="<?= $poster['id'] ?>">刪除
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>