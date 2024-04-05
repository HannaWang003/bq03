<div class="half" style="vertical-align:top;padding:0;width:49%;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <style>
            .lists {
                width: 200px;
                height: 240px;
                padding: 0;
                margin: auto;
                overflow: hidden;
            }

            .list {
                width: 100%;
                height: 100%;
                text-align: center;
            }

            .list img {
                width: 100%;
            }

            .controls {
                width: 430px;
                height: 100px;
                padding: 0;
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btns {
                width: 360px;
                height: 100%;
                margin: auto;
                display: flex;
                overflow: hidden;
                position: relative;
            }

            .btn {
                flex-shrink: 0;
                width: 90px;
                height: 100%;
                text-align: center;
                position: relative;
            }

            .btn img {
                width: 60px;
            }

            .left,
            .right {
                border: 20px solid #000;
                border-top-color: transparent;
                border-bottom-color: transparent;
            }

            .left {
                border-left-width: 0;
            }

            .right {
                border-right-width: 0;
            }
            </style>
            <ul class="lists">
                <?php
                $posters = $Poster->all(['sh' => 1], "order by rank");
                foreach ($posters as $poster) {
                ?>
                <div class="list" data-ani="<?= $poster['ani'] ?>">
                    <img src="./img/<?= $poster['img'] ?>" alt="">
                    <div><?= $poster['text'] ?></div>
                </div>
                <?php
                }
                ?>

            </ul>
            <ul class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    foreach ($posters as $poster) {
                    ?>
                    <div class="btn" data-ani="<?= $poster['ani'] ?>"><img src="./img/<?= $poster['img'] ?>" alt="">
                        <div><?= $poster['text'] ?></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right"></div>
            </ul>
        </div>
    </div>
</div>
<script>
let total = $('.list').length;
let now = 0;
let next = 0;
let p = 0;
let timer = setInterval(slide, 3000);

function slide(n) {
    let ani = $('.list').eq(now).data('ani');
    if (typeof(n) == "undefined") {
        if (next >= total) {
            next = 0;
        } else {
            next = now + 1
        }
    } else {
        next = n
    }
    switch (ani) {
        case 1:
            $('.list').eq(now).fadeOut(1000, function() {
                $('.list').eq(next).fadeIn(1000)
            });
            break;
        case 2:
            $('.list').eq(now).hide(1000, function() {
                $('.list').eq(next).show(1000)
            });
            break;
        case 3:
            $('.list').eq(now).slideUp(1000, function() {
                $('.list').eq(next).slideDown(1000)
            });
            break;
    }
    now = next
}
$('.left,.right').on('click', function() {
    let arrow = $(this).attr('class');
    switch (arrow) {
        case "left":
            if (p - 1 >= 0) {
                p--;
            }
            break;
        case "right":
            if (p + 1 <= total - 4) {
                p++
            }
            break;
    }
    $('.btn').animate({
        right: 90 * p
    })
})
</script>
<style>
tr {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

td {
    margin: 1px;
    width: 48%;
    border: 1px solid #eee;
    display: flex;
    padding: 2px;
    height: 160px;
    align-items: center;
}
</style>
<div class="half" style="padding:0;width:49%;">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table style="width:100%;">
            <tbody>
                <tr>
                    <?php
                    $total = $Movie->count(['sh' => 1],);
                    $div = 4;
                    $pages = ceil($total / $div);
                    $now = ($_GET['p']) ?? 1;
                    $start = ($now - 1) * $div;
                    $movies = $Movie->all(['sh' => 1], "order by rank limit $start,$div");
                    foreach ($movies as $movie) {
                    ?>
                    <td>
                        <div><img src="./img/<?= $movie['img'] ?>" style="width:100px;"></div>
                        <div>
                            <div><?= $movie['text'] ?></div>
                            <div>分級:<img src="./icon/03C0<?= $movie['level'] ?>.png"
                                    style="width:20px;"><?= $level[$movie['level']] ?></div>
                            <div>上映日期:<?= $movie['ondate'] ?></div>
                        </div>
                    </td>
                    <?php
                    }
                    4                    ?>
                </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>