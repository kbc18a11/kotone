<!DOCTYPE html>
<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>schedule</title>
    <link rel="stylesheet" href="schedule.css">
</head>

<body style="background: url(背景.gif)">
    <div class="box1">
        <form name="challenge" method="POST" autocomplete="off" action="delete.php">
            <div id="date">
                <label for="form_1">予定日（削除）</label><br>
                <input type="date" id="form_1" min="1900-01-01" max="2100-12-31" name="date" required> <!-- 日付 -->
            </div>
            <div>
                <label for="form_3">　開始時刻（削除）</label>　　　　　<label for="form_4">　終了時刻（削除）</label><br>
                <input type="time" id="form_3" name="sTime" required>～
                <!-- 開始時刻 -->
                <input type="time" id="form_4" name="eTime" required> <!-- 終了時刻 -->
            </div>
            <br>
            <div id="back">
                <button type="button" onclick="history.back()" id="backButton">戻る</button>
            </div>
            <div id="report">
                <input type="submit" name="delete1" id="delete" value="削除">
            </div>
        </form>
        <br>
    </div>
</body>

</html>