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
    height: auto;
}
</style>
<div style="height:300px;overflow:auto">
    <table>
        <tbody>
            <?php
            $movies = $Movie->all("order by rank");
            $total = $Movie->count();
            foreach ($movies as $idx => $movie) {
                $up = ($idx == 0) ? $idx : $idx - 1;
                $down = ($idx == ($total - 1)) ? $idx : $idx + 1;
            ?>
            <tr>
                <td><img src="./img/<?= $movie['img'] ?>"></td>
                <td>分級:<img src="./icon/03C0<?= $movie['level'] ?>.png" style="width:30px"></td>
                <td>
                    <div style="display:flex;justify-content:space-between">
                        <div><?= $movie['text'] ?></div>
                        <div><?= $movie['length'] ?></div>
                        <div><?= $movie['ondate'] ?></div>
                    </div>
                    <div> <button type="button" data-id="<?= $movie['id'] ?>"
                            data-chg="<?= $movies[$up]['id'] ?>">往上</button>
                        <button type="button" data-id="<?= $movie['id'] ?>"
                            data-chg="<?= $movies[$down]['id'] ?>">往下</button>
                        <input type="button" class="sh" data-id="<?= $movie['id'] ?>"
                            value=<?= ($movie['sh'] == 1) ? "顯示" : "隱藏" ?>>
                        <input type="button" class="del" data-id="<?= $movie['id'] ?>" value="刪除">
                    </div>
                    <div><?= $movie['intro'] ?></div>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</div>
<script>
$('button').on('click', function() {
    let id = $(this).data('id');
    let chg = $(this).data('chg');
    $.post('./api/moviechg.php', {
        id,
        chg
    }, function(res) {
        location.reload();
    })
})
$('.del').on('click', function() {
    let id = $(this).data('id');
    $.post('./api/del.php', {
        id
    }, function() {
        location.reload();
    })
})
$('.sh').on('click', function() {
    let id = $(this).data('id');
    $.post('./api/movie-sh.php', {
        id
    }, function() {
        location.reload();
    })
})
</script>