<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>ADMIN</title>
        <meta name='viewport' content='width=device-widtrh; initial-scale=1.0'>
        <link rel='stylesheet' href='CSS/normalize.css'>
        <link rel='stylesheet' href='CSS/bootstrap.css'>
        <script src='JS/jquery-3.5.1.js'></script>
        <script src='JS/bootstrap.js'></script>
        <link rel="Shortcut Icon" href="media/PUBLIC/ADMIN.png" type="image/png">
    </head>
    <body>
        <?php
            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                session_start();
                unset($_SESSION['Acc']);
                session_destroy();
                echo "<div class='alert alert-warning' role='alert'>登出成功！</div>";
                header("Refresh:3;url=index.php");
            }else if(isset($_POST['Acc']) && isset($_POST['PW']) && $_POST['Acc'] == 'admin' && $_POST['PW'] == '2019'){
                session_start();
                $_SESSION['Acc'] = 'admin';
                echo "<div class='alert alert-success' role='alert'>驗證成功！</div>";
                header("Refresh:3;url=index.php");
            }
        ?>
        <div class='w-50 mx-auto p-5'>
            <h1 class='text-secondary'><b>管理員驗證</b></h1>
            <form action='admin.php' method='post'>
                <div class="form-group row">
                    <label for="Acc" class="col-sm-2 col-form-label">帳號</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Acc" name="Acc">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="PW" class="col-sm-2 col-form-label">密碼</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="PW" placeholder="Password" name="PW">
                    </div>
                </div>
                <br>
                <div align="right">
                    <a href='index.php' class="btn btn-light">取消</a>
                    <button type="submit" class="btn btn-primary">驗證</button>
                </div>
            </form>
        </div>
    </body>
</html>