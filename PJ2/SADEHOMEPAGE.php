<?php
$dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
$pdo = new PDO($dsn, "root", "a79e7dkk");

function outputimg(){
     try {
         $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
         $pdo = new PDO($dsn, "root", "a79e7dkk");


$sql = 'select ImageID, Description, Path ,Title from travelimage ORDER BY  RAND() LIMIT 6';
$result = $pdo->query($sql);

$i=0;
while ($i<6) {
$row = $result->fetch();
outputSingleimg($row);
$i++;
}
$pdo = null;
}
catch (PDOException $e){
die( $e->getMessage() );
}
}
function outputsingleimg($row){
echo '<div >';
    echo constructdetaillink($row['ImageID']);
    echo '<img src="travel-images/large/'.$row['Path'].'"></a>';
    echo '<h3>'.$row['Title'].'</h3>'  ;
    echo ' <p>'.$row['Description'].'</p>' ;
    echo '</div>';
}
function constructdetaillink($id){
return '<a href="src/html/图片.php?id=' . $id . '">';
    }

    session_start();
    function checklog()
    {

    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
    echo "<li>
                    <a href=\"\"><img src=\"images/mysade.jpeg\" width=\"30px\"></a>
                    <ul>
                        <li><a href=\"src/upload.html\" class=\"nav2link\">UPLOAD</a></li>
                        <li><a href=\"src/MyPictures.html\" class=\"nav2link\">MY PHOTO</a></li>
                        <li><a href=\"src/favorpage.html\" class=\"nav2link\">MY FAVORITE</a></li>
                        <li><a href=\"src/index.html\" class=\"nav2link\">SIGN IN</a></li>
                    </ul>
                </li>";
    }
    else{
    $_SESSION["admin"] = false;
    echo "<li><a href='../index.php'>Login</a></li>";
    }
    }
    ?>





<html>

<head>
    <title>SADE Homepage</title>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="src/SADEcss.css">
    <script type="text/javascript">
    </script>
</head>

<body>

    <!-- 页顶Logo -->
    <header class="header">
        <a href="SADEHOMEPAGE.php">
            <img src="images/logopic.jpeg" width="200px"></a>
    </header>

    <!-- 导航栏 -->
    <nav>
        <div class="nav">
            <div class="nav1">
                <a href="SADEHOMEPAGE.php"><img src="images/home.jpeg" width="30px"></a>
                <a href="src/GPS.php"><img src="images/search.jpeg" width="30px"></a>
                <a href="src/browsepage.php"><img src="images/browse.jpeg" width="30px"></a>
            </div>
            <div class="nav2">
                <?php checklog(); ?>
            </div>
        </div>
    </nav>

    <!-- 悬浮按钮 -->
    <aside>
        <div class="functionbn">
            <a href="#"><img src="images/replace.jpeg" onclick="alert('Picture Updated!')" width="50px"></a><br>
            <a href="#"><img src="images/backtotop.jpeg" width="50px"></a>
        </div>
    </aside>

    
    <main>
        <div class="bigpicture"><img src="travel-images/large/222223.jpg" class="bigpicture"></div>
        <div class="content">
            <!--            这里整理了一下，把图片和文字都放道理一个div里-->
            <?php outputimg()
            ?>
        </div>
    </main>


    <footer class="footer">
        <img src="images/kaiwechat.jpg" width="100px">
        <h5>Contact Me By WECHAT</h5>




    </footer>

</body>

</html>