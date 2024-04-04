<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <style>
                .lists {
                    width: 200px;
                    height: 240px;
                    margin: auto;
                    padding: 0;
                    overflow: hidden;
                }

                .list {
                    width: 100%;
                    height: 100%;
                }

                .list img {
                    width: 100%;
                }
            </style>
            <ul class="lists">
                <?php
                $posters = $Poster->all(['sh' => 1], "order by rank");
                foreach ($posters as $poster) {
                ?>
                    <div class="list" data-ani="<?= $poster['ani'] ?>"><img src="./img/<?= $poster['img'] ?>">
                        <div style="text-align:center"><?= $poster['text'] ?></div>
                    </div>
                <?php
                }
                ?>
            </ul>
            <style>
                .controls {
                    width: 430px;
                    height: 100px;
                }

                .btns {
                    width: 360px;
                    height: 100%;
                    display: flex;
                    overflow: hidden;
                    position: relative;
                }

                .btn {
                    width: 90px;
                    height: 100%;
                    text-align: center;
                    flex-shrink: 0;
                    position: relative;
                }

                .btn img {
                    width: 60px;
                }

                .left,
                .right {
                    border: 20px solid #333;
                    border-top-color: transparent;
                    border-bottom-color: transparent;
                }

                .left {
                    border-left-width: 0;
                }

                .right {
                    border-right-width: 0;
                }

                .controls {
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
            </style>
            <ul class="controls" style="padding:0">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    foreach ($posters as $poster) {
                    ?>
                        <div class="btn"><img src="./img/<?= $poster['img'] ?>" alt="">
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
<div class=" half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
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
        next = now + 1;
        if (typeof(n) == "undefined") {
            if (next >= total) {
                next = 0
            }
        } else {
            next = n;
        }
        switch (ani) {
            case 1:
                $('.list').eq(now).fadeOut(1000, function() {
                    $('.list').eq(next).fadeIn(1000)
                })
                break;
            case 2:
                $('.list').eq(now).hide(1000, function() {
                    $('.list').eq(next).show(1000)
                })
                break;
            case 3:
                $('.list').eq(now).slideUp(1000, function() {
                    $('.list').eq(next).slideDown(1000)
                })
                break;
        }
        now = next;
    }
    $('.left,.right').on('click', function() {
        let arrow = $(this).attr('class');
        switch (arrow) {
            case "left":
                if (p - 1 >= 0) {
                    p--
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
    $('.btns').hover(function() {
        clearInterval(timer);
    }, function() {
        timer = setInterval(slide, 3000)
    })
    $('.btn').on('click', function() {
        let idx = $(this).index();
        setInterval(slide(idx), 3000)
    })
</script>