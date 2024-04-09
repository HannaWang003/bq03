<h1 class="ct">線上訂票</h1>
<style>
.ordsect {
    width: 50%;
}

.ordsect td:nth-child(2) {
    width: 80%;

    select {
        width: 100%;
    }
}

.ordsect td {
    padding: 5px 10px;
    background: #aaa;
}

.ordsect tr {
    margin: 5px 0;
}
</style>
<form action="?do=book" method="post">
    <table class="ordsect" style="margin:auto">
        <tr>
            <td>電影:</td>
            <td><select name="movie" id="movie"></select></td>
        </tr>
        <tr>
            <td>日期:</td>
            <td><select name="date" id="date"></select></td>
        </tr>
        <tr>
            <td>電影:</td>
            <td><select name="sess" id="sess"></select></td>
        </tr>
        <tr>
            <td colspan="2" class="ct">
                <input type="submit" value="確定" style="margin:0 2px;"><input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
<script>
let now = <?= $_GET['id']; ?>;
getmovie(now);
$('#movie').on('change', function() {
    let movie = $('#movie').val();
    getdate(movie)
})
$('#date').on('change', function() {
    let movie = $('#movie').val();
    let date = $('#date').val();
    getsess(movie, date)
})

function getmovie(now) {
    $.post('./api/getmovie.php', {
        now
    }, function(res) {
        $('#movie').html(res);
        let movie = $('#movie').val();
        getdate(movie)
    })
}

function getdate(movie) {
    $.post('./api/getdate.php', {
        movie
    }, function(res) {
        $('#date').html(res);
        let movie = $('#movie').val();
        let date = $('#date').val();
        getsess(movie, date)
    })
}

function getsess(movie, date) {
    $.post('./api/getsess.php', {
        movie,
        date
    }, function(res) {
        $('#sess').html(res)
    })
}
</script>