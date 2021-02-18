<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>register</title>
    <link rel="stylesheet" href="register.css">
    <h1>kotone</h1>
</head>

<body>
    <center>
        <table width="100%">
            <tr>
                <td align="center" bgcolor="#2b1872">
                    <font color=#ffffff><b>REGISTER</b></font>
                </td>
            </tr>
        </table>
        <form method="POST" action="register.php">
            <table id="formset">
                <tr>
                    <td>アカウント名</td>
                    <td>
                        <input type="text" name="name" size="40" maxlength="32" autocomplete="OFF" /><!-- 名前 -->
                    </td>
                </tr>
                <tr>
                    <td>Eメールアドレス</td>
                    <td>
                        <input type="text" name="mail" size="40" maxlength="32" autocomplete="OFF" /><!-- メールアドレス -->
                    </td>
                </tr>
                <tr>
                    <td>パスワード（数字4桁）</td>
                    <td>
                        <input type="password" name="pwd" size="40" maxlength="32" autocomplete="OFF" /><!-- パスワード -->
                    </td>
                </tr>
                <tr>
                    <td>パスワード（確認）</td>
                    <td>
                        <input type="password" name="pwd2" size="40" maxlength="32" autocomplete="OFF" />
                        <!-- パスワード（確認） -->
                    </td>
                </tr>

                <tr>
                    <td>パスワード（リセット時の質問）</td>
                    <td>
                        <select name="reset">
                            <option value="pet">初めて飼ったペットの名前は？</option>
                            <option value="artist">好きなアーティストの名前は？</option>
                            <option value="food">嫌いな食べ物は？</option>
                            <option value="movie">好きな映画は？</option>
                            <option value="school">通っていた小学校の名前は？</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="text" size="40" maxlength="32" autocomplete="OFF" /><!-- テキスト入力 -->
                    </td>
                </tr>

            </table>
            <br>
            <input type="submit" value="登録">
        </form>
    </center>
</body>

</html>