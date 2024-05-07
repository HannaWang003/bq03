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
<div style="display:flex;margin:auto;width:80%;">
    <div style="width:20%">影片資料</div>
    <table class="ct">
        <tr>
            <td>片名:</td>
            <td><input type="text" name="text"></td>
        </tr>
        <tr>
            <td>分級:</td>
            <td><input type="text" name="level"></td>
        </tr>
        <tr>
            <td>片長:</td>
            <td><input type="text" name="length"></td>
        </tr>
        <tr>
            <td>上映日期:</td>
            <td><input type="text" name="ondate"></td>
        </tr>
        <tr>
            <td>發行商:</td>
            <td><input type="text" name="publish"></td>
        </tr>
        <tr>
            <td>導演:</td>
            <td><input type="text" name="director"></td>
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
    <div style="width:80%"><textarea name=" intro" id="" style="width:90%;height:200px"></textarea>
    </div>
</div>
<br>
<div class="ct">
    <input type="submit" value="新增">&nbsp;&nbsp;<input type="reset" value="重置">
</div>