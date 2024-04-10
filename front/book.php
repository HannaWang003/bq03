<style>
    #room {
        width: 540px;
        height: 370px;
        box-sizing: border-box;
        padding: 19px 112px 0 112px;
        margin: auto;
        background: url('./icon/03D04.png')
    }

    #seats {
        width: 100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 63px;
        height: 85px;
        position: relative;
        margin-top: -5px;
    }

    .seat input {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    #info {
        width: 540px;
        box-sizing: border-box;
        padding: 19px 90px 0 90px;
        margin: auto;
    }

    #info input {
        border: 0;
        background: transparent;
        color: red;
        width: 100px;
    }

    #info .num {
        width: 10px;
    }
</style>
<form action="./api/book.php" method="post">
    <div id="room">
        <div id="seats">
            <?php
            for ($i = 0; $i < 20; $i++) {
                $col = floor($i / 5) + 1;
                $num = ($i % 5) + 1;
            ?>
                <div class="seat">
                    <div><?= $col ?>排<?= $num ?>號</div>
                    <div><img src="./icon/03D02.png" alt=""></div>
                    <input type="checkbox" name="seats[]" class="chk" value="<?= $i ?>">
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <section id="info">
        <div>您選擇的電影是 : <input type="text" name="movie" value="<?= $_POST['movie'] ?>" readonly></div>
        <div>您選擇的時刻是 : <input type="text" name="date" value="<?= $_POST['date'] ?>" readonly><input type="text" name="sess" value="<?= $_POST['sess'] ?>" readonly></span></div>
        <div>您已勾選了<input type="text" name="qt" value="0" readonly class="num">張票，最多可以購買<span style="color:red">4</span>張票</div>
    </section>
    <div style="text-align:center;"><input type="button" value="上一步" onclick="history.go(-1)" style="margin:0 2px;"><input type="submit" value="訂購" style="margin:0 2px;">
    </div>
</form>
<Script>
    let total = 0;
    let seats = new Array();
    $('.chk').on('click', function() {
        if ($(this).prop('checked')) {
            total++;
            if (total > 4) {
                total--
                $(this).prop('checked', false)
                alert('一個人最多只能選擇四張票');
            } else {
                seats.push($(this).val());
            }
        } else {
            total--;
            seats.splice(seats.indexOf($(this).val()))
        }
        // console.log(seats)
        $('.num').val(total)
    })
</Script>