<?php
$movie = $Movie->find($_GET['id']);
[$year, $moth, $date] = explode("-", $movie['ondate']);
?>
<style>
    table {
        width: 80%;
    }

    table,
    tr,
    td {
        border-collapse: collapse;
    }

    td:nth-child(1) {
        width: 20%;
        text-align-last: justify;
    }

    td:nth-child(2) {
        width: 80%;

        input {
            width: 80%;
        }
    }
</style>
<form action="./api/movie-edit.php" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div style="display:flex;margin:auto;width:80%;">
        <div style="width:20%">影片資料</div>
        <table class="ct">
            <tr>
                <td>片名:</td>
                <td><input type="text" name="text" value="<?= $movie['text'] ?>"></td>
            </tr>
            <tr>
                <td>分級:</td>
                <td>
                    <select name="level" id="">
                        <option value="0">請選擇分級</option>
                        <option value="1" <?= ($movie['level'] == 1) ? "selected" : "" ?>>普遍級</option>
                        <option value="2" <?= ($movie['level'] == 2) ? "selected" : "" ?>>保護級</option>
                        <option value="3" <?= ($movie['level'] == 3) ? "selected" : "" ?>>輔導級</option>
                        <option value="4" <?= ($movie['level'] == 4) ? "selected" : "" ?>>限制級</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>片長:</td>
                <td><input type="text" name="length" value="<?= $movie['length'] ?>"></td>
            </tr>
            <tr>
                <td>上映日期:</td>
                <td>
                    <select name="y">
                        <option value="">西元年</option>
                        <option value="2024" <?= ($year == 2024) ? "selected" : "" ?>>2024</option>
                        <option value="2025" <?= ($year == 2025) ? "selected" : "" ?>>2025</option>
                    </select>
                    <select name="m">
                        <option value="">月份</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                        ?>
                            <option value="<?= $i ?>" <?= ($moth == $i) ? "selected" : "" ?>><?= $i ?></option>
                        <?php
                        }

                        ?>
                    </select>
                    <select name="d">
                        <option value="">日期</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                        ?>
                            <option value="<?= $i ?>" <?= ($date == $i) ? "selected" : "" ?>><?= $i ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>發行商:</td>
                <td><input type="text" name="publish" value="<?= $movie['publish'] ?>"></td>
            </tr>
            <tr>
                <td>導演:</td>
                <td><input type="text" name="director" value="<?= $movie['director'] ?>"></td>
            </tr>
            <tr>
                <td>預告影片:</td>
                <td><input type="file" name="mp4"></td>
            </tr>
            <tr>
                <td>電影海報:</td>
                <td><input type="file" name="img"></td>
            </tr>
        </table>
    </div>
    <div style="display:flex;margin:auto;width:80%;">
        <div style="width:20%">劇情簡介</div>
        <div style="width:80%"><textarea name=" intro" id="" style="width:90%;height:200px"><?= $movie['intro'] ?></textarea>
        </div>
    </div>
    <br>
    <div class="ct">
        <input type="submit" value="編輯">&nbsp;&nbsp;<input type="reset" value="重置">
    </div>
</form>