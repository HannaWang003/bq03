<style>
table {
    width: 100%;
}

table,
tr,
td {
    border-collapse: collapse;
}

td {
    text-align: center;
    border-bottom: 1px solid #333;
}
</style>
<form action="./api/addmovie.php" method="post" enctype="multipart/form-data">
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