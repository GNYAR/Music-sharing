<?php
    session_start();
    $acc = '';
    if(isset($_SESSION['Acc']))
        $acc = $_SESSION['Acc'];
    if($acc == 'admin'){
        echo '<a class="float-end" style="margin-top: 7px" href="admin.php?action=logout" title="LogOut"><img src="media/PUBLIC/LOGOUT.png" height="35" width="35"></a>';
        echo '<span class="float-end">　　</span>';
        echo '<a class="float-end" href="add.php" title="Add"><img src="media/PUBLIC/ADD_C.png" height="50" width="50"></a>';
    }else{
        echo '<a class="float-end" href="admin.php" title="Admin"><img src="media/PUBLIC/ADMIN.png" height="50" width="50"></a>';
    }
    echo "<h2 align='center'><img src='media/INDEX/ear.png' height='30' width='30' style='margin-bottom:10px'><b> 歌曲推薦</b></h2>";
    // 頁數設定
    $per_page = 9;
    if(isset($_GET['Pages']))
        $pages = $_GET['Pages'];
    else
        $pages = 1;
    // 連接資料庫
    include('sql_open.php');
    // 查詢所有資料
    $result = mysqli_query($link, "SELECT * FROM songs ORDER BY time DESC");
    // 筆數
    $num_records = mysqli_num_rows($result);
    // 頁數
    $num_pages = ceil($num_records / $per_page);
    // 指標
    $ptr = ($pages - 1) * $per_page;
    mysqli_data_seek($result, $ptr);
    // 印出資料
    echo "<div class='container' align='center'>";
    echo "<div class='row' align='left'>";
    for ($i = 0; $i < $per_page; $i++){
        if($row = mysqli_fetch_row($result)) {
            echo "<div class='col p-3'  style='margin-bottom: 50px'><div class='card' style='width: 400px;'>";
            echo "<div class='card-body'>";
            echo "<iframe width='368' height='220' src='https://www.youtube.com/embed/$row[3]' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            echo "<h5 class='card-title text-primary'>";
            if($acc == 'admin')
                echo "<a href='edit.php?id=$row[3]' title='Edit'><img src='media/PUBLIC/EDIT.png' height='20' width='20'></a> ";
            echo "<b>$row[0]</b>";
            echo "</h5>";
            echo "<h6 class='card-subtitle mb-2 text-muted'>$row[1]</h6>";
            if(chop($row[2]) != "")
                echo "<p class='card-text' style='color: darkred'>$row[2]</p>";
            if(chop($row[4]) != "")
                echo nl2br("<p class='overflow-auto' style='height: 70px'>$row[4]</p>");
            echo "</div></div></div>";
        }
    }
    echo "</div></div>";
                
    // GET 頁數連結
    echo "<nav class='float-none' align='center'><ul class='pagination justify-content-center'>";
    if($pages > 1)
        echo "<li class='page-item'><a class='page-link' href='index.php?Pages=".($pages - 1)."'>&laquo;</a></li>";
    else
        echo "<li class='page-item disabled'><a class='page-link' href='index.php?Pages=".($pages - 1)."'>&laquo;</a></li>";
    for($i = 1; $i <= $num_pages; $i++)
        if($i == $pages)
            echo "<li class='page-item active'><a class='page-link' href='index.php?Pages=$i'>$i</a></li>";    
        else
            echo "<li class='page-item'><a class='page-link' href='index.php?Pages=$i'>$i</a></li>";
    if($pages < $num_pages)
        echo "<li class='page-item'><a class='page-link' href='index.php?Pages=".($pages + 1)."'>&raquo;</a></li>";
    else
        echo "<li class='page-item disabled'><a class='page-link' href='index.php?Pages=".($pages + 1)."'>&raquo;</a></li>";
    echo "</ul>Number of Songs：$num_records</nav>";
    // 關閉資料庫
    mysqli_free_result($result);
    mysqli_close($link);
?>