<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>ADD</title>
        <meta name='viewport' content='width=device-widtrh; initial-scale=1.0'>
        <link rel='stylesheet' href='CSS/normalize.css'>
        <link rel='stylesheet' href='CSS/bootstrap.css'>
        <script src='js/jquery-3.5.1.js'></script>
        <script src='js/bootstrap.js'></script>
        <link rel="Shortcut Icon" href="media/PUBLIC/ADD_C.png" type="image/png">
    </head>
    <body>
        <?php
            // 連接資料庫
            include('sql_open.php');
            $result = mysqli_query($link, "SELECT * FROM songs");
            if(isset($_POST['SongName']) && chop($_POST['SongName']) != "" && isset($_POST['Singer']) && chop($_POST['Singer']) != "" && isset($_POST['Link']) && chop($_POST['Link']) != "" && isset($_POST['Des']) && isset($_POST['Title'])) {
                $sql = 'INSERT INTO songs VALUES(';
                $sql .= '"' . chop($_POST['SongName']) . '",';
                $sql .= '"' . chop($_POST['Singer']) . '",';
                $sql .= '"' . chop($_POST['Title']) . '",';
                $sql .= '"' . chop($_POST['Link']) . '",';
                $sql .= '"' . chop($_POST['Des']) . '",';
                $sql .= time() . ')';
                if(mysqli_query($link, $sql)){
                    echo "<div class='alert alert-primary' role='alert'>【" . chop($_POST['Singer']). " - " . chop($_POST['SongName']) . "】新增成功！</div>";
                    header("Refresh:3;url=index.php");
                }
            }
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
        <div class='w-75 mx-auto p-5'>
            <h1 class='text-primary'><b>新增歌曲</b></h1>
            <form action='add.php' method='post'>
                <div class="form-group">
                    <label for="SongName">歌名</label>
                    <input type="text" class="form-control" id="SongName" placeholder="Song Name" name='SongName'>
                </div>
                <br>
                <div class="form-group">
                    <label for="Singer">歌手</label>
                    <input type="text" class="form-control" id="Singer" placeholder="Singer" name='Singer'>
                </div>
                <br>
                <div class="form-group">
                    <label for="Title">標題</label>
                    <input type="text" class="form-control" id="Title" placeholder="Title" name='Title'>
                </div>
                <br>
                <div class="form-group">
                    <label for="Descript">敘述</label>
                    <textarea class="form-control" id="Descript" placeholder="Descript" name='Des'></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="Link">Youtube 代碼</label>
                    <input type="text" class="form-control" id="Link" placeholder="Youtube Code" name='Link'>
                </div>
                <br>
                <div align="right">
                    <a href='index.php' class="btn btn-light">取消</a>
                    <button type="submit" class="btn btn-primary">新增</button>
                </div>
            </form>
        </div>
    </body>
</html>