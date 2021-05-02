<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>EDIT</title>
        <meta name='viewport' content='width=device-widtrh; initial-scale=1.0'>
        <link rel='stylesheet' href='CSS/normalize.css'>
        <link rel='stylesheet' href='CSS/bootstrap.css'>
        <script src='JS/jquery-3.5.1.js'></script>
        <script src='JS/bootstrap.js'></script>
        <link rel="Shortcut Icon" href="media/PUBLIC/EDIT.png" type="image/png">
    </head>
    <body>
        <?php
            if(isset($_GET['id']))
                $id = $_GET['id'];
            else if(isset($_POST['Link']))
                $id = $_POST['Link'];
            // 連接資料庫
            include('sql_open.php');
            $result = mysqli_query($link, "SELECT * FROM songs WHERE link='$id'");
            $row = mysqli_fetch_row($result);
            if(isset($_GET['action']) && $_GET['action'] == 'del'){
                $sql = "DELETE FROM songs WHERE link='$id'";
                if(mysqli_query($link, $sql)){
                    echo "<div class='alert alert-danger' role='alert'>刪除成功！</div>";
                    header("Refresh:3;url=index.php");
                }
            }else if(isset($_POST['SongName']) && chop($_POST['SongName']) != "" && isset($_POST['Singer']) && chop($_POST['Singer']) != "" && isset($_POST['Des']) && isset($_POST['Title'])){
                $sql = 'UPDATE songs SET ';
                $sql .= 'name="' . chop($_POST['SongName']) . '",';
                $sql .= 'singer="' . chop($_POST['Singer']) . '",';
                $sql .= 'title="' . chop($_POST['Title']) . '",';
                $sql .= 'descript="' . chop($_POST['Des']) . '"';
                $sql .= " WHERE link='$id'";
                if(mysqli_query($link, $sql)){
                    echo "<div class='alert alert-success' role='alert'>【" . chop($_POST['Singer']). " - " . chop($_POST['SongName']) . "】更新成功！</div>";
                    header("Refresh:3;url=index.php");
                }
            }
        ?>
        <div class='w-75 mx-auto p-5'>
            <h1 class='text-secondary'><b>編輯歌曲</b></h1>
            <form action='edit.php' method='post'>
                <div class="form-group">
                    <label for="SongName">歌名</label>
                    <input type="text" class="form-control" id="SongName" placeholder="Song Name" name='SongName' value=<?php echo '"' . $row[0]. '"'; ?>>
                </div>
                <br>
                <div class="form-group">
                    <label for="Singer">歌手</label>
                    <input type="text" class="form-control" id="Singer" placeholder="Singer" name='Singer' value=<?php echo '"' . $row[1]. '"'; ?>>
                </div>
                <br>
                <div class="form-group">
                    <label for="Title">標題</label>
                    <input type="text" class="form-control" id="Title" placeholder="Title" name='Title' value=<?php echo '"' . $row[2]. '"'; ?>>
                </div>
                <br>
                <div class="form-group">
                    <label for="Descript">敘述</label>
                    <textarea class="form-control" id="Descript" placeholder="Descript" name='Des'><?php echo $row[4] ?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="Link">Youtube 代碼</label>
                    <input readonly type="text" class="form-control" id="Link" placeholder="Youtube Code" name='Link'  value=<?php echo '"' . $row[3]. '"'; ?>>
                </div>
                <br>
                <div align="right">
                    <a href='index.php' class="btn btn-light">取消</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModal">刪除</button>
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
        <?php
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
        <!-- 確定刪除對話框 -->
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delLabel">刪除歌曲</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo "確定刪除<b>【$row[1] - $row[0]】</b>?"; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <?php echo "<a href='edit.php?id=$id&action=del' class='btn btn-danger'>刪除</a>"; ?>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>