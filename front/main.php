<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <style>
                .lists {
                    width: 200px;
                    height: 240px;
                    margin: auto;
                    overflow: hidden;
                }

                .list {
                    width: 100%;
                    text-align: center;
                    display: none;
                }

                .list>img {
                    width: 100%;
                }

                .controls {
                    width: 430px;
                    height: 100px;
                    margin: auto;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .btns {
                    width: 360px;
                    height: 100px;
                    margin: auto;
                    overflow: hidden;
                    display: flex;
                    position: relative;
                }

                .btn {
                    width: 90px;
                    height: 100px;
                    flex-shrink: 0;
                    text-align: center;
                    position: relative;
                }

                .btn>img {
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
            <div class="lists">
                <?php
                $lists = $Poster->all(['sh' => 1], "order by rank");
                foreach ($lists as $list) {

                ?>
                    <div class="list" data-ani="<?= $list['ani'] ?>">
                        <img src="./img/<?= $list['img'] ?>">
                        <div><?= $list['text'] ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    $btns = $Poster->all(['sh' => 1], "order by rank");
                    foreach ($btns as $btn) {

                    ?>
                        <div class="btn">
                            <img src="./img/<?= $btn['img'] ?>">
                            <div><?= $btn['text'] ?></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>
<div class="half">
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
    $('.list').eq(0).show();
    let total = $('.list').length;
    let now = 0;
    let next = 0;
    let timer = setInterval(slide, 3000);
    let p = 0;

    function slide(n) {
        let ani = $('.list').eq(now).data('ani');
        next = now + 1;
        // console.log(ani)
        if (typeof(n) == "undefined") {
            if (next >= total) {
                next = 0;
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
        // console.log(arrow);
        switch (arrow) {
            case "right":
                if (p + 1 <= total - 4) {
                    p++
                }
                break;
            case "left":
                if (p - 1 >= 0) {
                    p--
                }
                break;

        }
        $('.btn').animate({
            right: 90 * p
        })
    })
    $('.btn').hover(function() {
        clearInterval(timer);
    }, function() {
        timer = setInterval(slide, 3000)
    })
    $('.btn').on('click', function() {
        let idx = $(this).index();
        // console.log(idx);
        setInterval(slide(idx), 3000)
    })
</script>