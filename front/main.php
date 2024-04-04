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
                <div class="list"><img src="./img/<?= $poster['img'] ?>">
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
            }

            .btn {
                width: 90px;
                height: 100%;
                text-align: center;
                flex-shrink: 0;
            }

            .btn img {
                width: 60px;
            }

            .left,
            .right {
                border: 20px solid #eee;
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