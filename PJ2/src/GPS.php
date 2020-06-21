<?php
$dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
$pdo = new PDO($dsn, "root", "a79e7dkk");

session_start();

function checkSearch(){
    if (isset($_POST['search'])){
        if ($_POST['search']=='title'){
            searchBytitle();
        }
        else {
            searchBydes();
        }
    }
    else if(isset($_GET['title1'])){
        searchBytitleagain();
    }
    else if(isset($_GET['des'])){
        searchBydesagain();
    }
    else{
        echo '<h3>No result!</h3>';
    }
}
$GLOBALS['search']='';
if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}
else{
    $_SESSION['page']=0;
    $_SESSION['number']=0;
}

function searchBytitle(){
    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "a79e7dkk");

    $sql = 'select Path,ImageID,Title,Description  from  travelimage where Title LIKE "%'.$_POST['title'].'%"';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if ($statement->rowCount()==0){
        echo '<h3>Search no result!</h3>';
    }
    else if($statement->rowCount()>4){
        $i=0;
        while (($row = $statement->fetch())&&$i<4) {
            outPutImage($row);
            $i++;
        }
        $_SESSION['page']=0;
        $_SESSION['number']=$statement->rowCount();
        $GLOBALS['search']='title1='.$_POST['title'].'';
    }
    else {
        while ($row = $statement->fetch()) {
            outPutImage($row);
        }
    }
    $pdo=null;
}
function searchBytitleagain(){
    $num=$_SESSION['page']*4;
    $GLOBALS['search']='title1='.$_GET['title1'].'';
    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "a79e7dkk");

    $sql = 'select Path,ImageID,Title,Description  from  travelimage where Title LIKE "%'.$_GET['title1'].'%"';
    $sql = $sql . "LIMIT $num,4";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if ($statement->rowCount()==0){
        echo '<h3>Search no result!</h3>';
    }
    else {
        while ($row = $statement->fetch()) {
            outPutImage($row);
        }
    }
    $pdo=null;
}
function searchBydes(){
    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "a79e7dkk");

    $sql = 'select Path,ImageID,Title,Description  from  travelimage where Description LIKE "%'.$_POST['description'].'%"';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if ($statement->rowCount()==0){
        echo '<h3>Search no result!</h3>';
    }
    else if($statement->rowCount()>4){
        $i=0;
        while (($row = $statement->fetch())&&$i<4) {
            outPutImage($row);
            $i++;
        }
        $_SESSION['page']=0;
        $_SESSION['number']=$statement->rowCount();
        $GLOBALS['search']='des='.$_POST['description'].'';
    }
    else {
        while ($row = $statement->fetch()) {
            outPutImage($row);
        }
    }
    $pdo=null;
}
function searchBydesagain(){
    $num=$_SESSION['page']*4;
    $GLOBALS['search']='des='.$_GET['des'].'';
    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "a79e7dkk");

    $sql = 'select Path,ImageID,Title,Description  from  travelimage where Description LIKE "%'.$_GET['des'].'%"';
    $sql = $sql . "LIMIT $num,4";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if ($statement->rowCount()==0){
        echo '<h3>Search no result!</h3>';
    }
    else {
        while ($row = $statement->fetch()) {
            outPutImage($row);
        }
    }
    $pdo=null;
}

function outPutImage($row){
    echo '<div><a href="图片.php?id=' . $row['ImageID'] . '"><img src="../travel-images/medium/'.$row['Path'].'"></a> </div>';
    echo '<div><h2>'.$row['Title'].'</h2>';
    echo '<p>'.$row['Description'].'</p><hr></div>';
}

?>

<html>

<head>
    <title>SADE Homepage</title>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="SADEcss.css">
</head>

<body>
    <!-- 页顶Logo -->
    <header class="header">
        <a href="../HomePage.php">
            <img src="../images/logopic.jpeg" width="200px"></a>
    </header>

    <!-- 导航栏 -->
    <nav>
        <div class="nav">
            <div class="nav1">
                <a href="../HomePage.php"><img src="../images/home.jpeg" width="30px"></a>
                <a href="GPS.php"><img src="../images/search.jpeg" width="30px"></a>
                <a href="browsepage.php"><img src="../images/browse.jpeg" width="30px"></a>
            </div>
            <div class="nav2">
                <li>
                    <a href=""><img src="../images/mysade.jpeg" width="30px"></a>
                    <ul>
                        <li><a href="upload.html" class="nav2link">UPLOAD</a></li>
                        <li><a href="MyPictures.html" class="nav2link">MY PHOTO</a></li>
                        <li><a href="favorpage.html" class="nav2link">MY FAVORITE</a></li>
                        <li><a href="index.php" class="nav2link">LOGOUT</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <article class="searcharticle">
        <form method="post" action="GPS.php">
            <input type="radio" name="search"  checked="checked" value="title">Search By Title &emsp;
            <input type="text" name="title" placeholder="Enter your keyword..."  class="searcharticle-input">
            <input type="radio" name="search" value="description">Search By Description
            <input type="text" name="description" id="des" placeholder="Enter your keyword..."  class="searcharticle-input"><br><br>
                <input type="submit" name="gosearch " value="Filter " id="submit "  class="searcharticle-bn ">
            </div>
        </form>
        <br><br>
        <section class="searchgrid ">
            <?php checkSearch(); ?>
        </section>
    </article>


    <aside>
        <div class="functionbn ">
            <a href="# "><img src="../images/replace.jpeg " onclick="alert( 'ERROR') " width="50px "></a><br>
            <a href="# "><img src="../images/backtotop.jpeg " width="50px "></a>
        </div>
    </aside>
    <footer class="footer ">
        <img src="../images/kaiwechat.jpg " width="100px ">
        <h5>Contact Me By WECHAT</h5>
    </footer>

</body>

</html>