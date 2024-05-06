<style>
    table {
        width: 100%;
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
            width: 60%;
        }
    }
</style>
<table>
    <tr>
        <td>片名:</td>
        <td><input type="text" name="text"></td>
    </tr>
    <tr>
        <td colspan="2" style="border-top:1px solid black">
            <input type="submit" value="新增"><input type="reset" value="重置">
        </td>
    </tr>
</table>