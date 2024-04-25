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
                        <button type="button" data-id="<?= $poster['id'] ?>"
                            data-chg="<?= $posters[$up]['id'] ?>">往上</button>
                        <button type="button" data-id="<?= $poster['id'] ?>"
                            data-chg="<?= $posters[$down]['id'] ?>">往下</button>
                        <select name="ani[]">
                            <option value="1" <?= ($poster['ani'] == 1) ? "selected" : "" ?>>淡入淡出</option>
                            <option value="2" <?= ($poster['ani'] == 2) ? "selected" : "" ?>>縮放</option>
                            <option value="3" <?= ($poster['ani'] == 3) ? "selected" : "" ?>>滑入滑出</option>
                        </select>
                    </td>
                    <td><input type="checkbox" name="sh[]" value="<?= $poster['id'] ?>"
                            <?= ($poster['sh'] == 1) ? "checked" : "" ?>>顯示
                        <input type="checkbox" name="del[]" value="<?= $poster['id'] ?>">刪除
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $poster['id'] ?>">
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
<form action="./api/addposter.php" method="post" enctype="multipart/form-data">
    <table style="background:#eee;margin-top:10px;">
        <thead style="background:#aaa">
            <tr>
                <th colspan="2">新增預告片清單</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>預告片海報: <input type="file" name="img"></td>
                <td>預告片片名: <input type="text" name="text"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="新增"><input type="reset" value="重置">
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script>
$('button').on('click', function() {
    let id = $(this).data('id');
    let chg = $(this).data('chg');
    $.post('./api/chg.php', {
        id,
        chg
    }, function(res) {
        location.reload();
    })
})
</script>