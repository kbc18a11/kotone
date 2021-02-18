<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>reset</title>
    <link rel="stylesheet" href="reset.css">
    <h1>kotone</h1>
</head>

<body>
    <center>
        <table width="100%">
            <tr>
                <td align="center" bgcolor="#2b1872">
                    <font color=#ffffff><b>RESET</b></font>
                </td>
            </tr>
        </table>
        <form method="POST" action="reset.php">
            <table id="formset">
                <tr>
                    <td>（登録済み）Eメールアドレス</td>
                    <td>
                        <input type="text" name="mail" size="40" maxlength="32" autocomplete="OFF" /><!-- ユーザID -->
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="reset">
                            <option value="pet">初めて飼ったペットの名前は？</option>
                            <option value="artist">好きなアーティストの名前は？</option>
                            <option value="food">できれば食べたくない食べ物は？</option>
                            <option value="movie">好きな映画は？</option>
                            <option value="school">通っていた小学校の名前は？</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="text" size="40" maxlength="32" autocomplete="OFF" /><!-- テキスト入力 -->
                    </td>
                </tr>
                <tr>
                    <td>新規パスワード（数字4桁）</td>
                    <td>
                        <input type="password" name="pwd" size="40" maxlength="32" autocomplete="OFF" /><!-- パスワード -->
                    </td>
                </tr>
                <tr>
                    <td>新規パスワード（確認）</td>
                    <td>
                        <input type="password" name="pwd2" size="40" maxlength="32" autocomplete="OFF" />
                        <!-- パスワード（確認） -->
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="送信" />
        </form>
    </center>
</body>

</html>