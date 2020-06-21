<?php

session_start();

function select1(){
    if (isset( $_GET['page'])){
        imageagain();
    }
    else{
        image();
    }
}
if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}
else{
    $_SESSION['page']=0;
    $_SESSION['number']=0;
}
function image()
{
    try {
        $ID=$_SESSION['id'];
        $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
        $pdo = new PDO($dsn, "root", "a79e7dkk");

        $sql = 'select ImageID, UOL from travelimagefavor where UID=:id ';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $ID);
        $statement->execute();
        if($statement->rowCount() == 0){
            echo '<h2>have no photo!</h2>';
        }
        else if($statement->rowCount()>4){
            $i=0;
            while (($row = $statement->fetch(PDO::FETCH_ASSOC))&&$i<4) {
                if($row['UOL']==0) {
                    outputSingleimg($row);
                }
                else{
                    outuserimage($row);
                }
                $i++;
            }
            $_SESSION['page']=0;
            $_SESSION['number']=$statement->rowCount();
        }
        else {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if($row['UOL']==0) {
                    outputSingleimg($row);
                }
                else{
                    outuserimage($row);
                }
            }
        }

        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function imageagain()
{
    try {
        $num=$_SESSION['page'];
        $ID=$_SESSION['id'];
        $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
        $pdo = new PDO($dsn, "root", "a79e7dkk");

        $sql = "select ImageID, UOL from travelimagefavor where UID=:id limit $num,4 ";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $ID);
        $statement->execute();
        if($statement->rowCount() == 0){
            echo '<h2>have no photo!</h2>';
        }
        else {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if($row['UOL']==0) {
                    outputSingleimg($row);
                }
                else{
                    outuserimage($row);
                }
            }
        }

        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function outputsingleimg($row){
    $id=$row['ImageID'];
    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo2 = new PDO($dsn, "root", "a79e7dkk");

    $sql2 = 'select Path,ImageID,Title,Description from  travelimage where ImageID=:imageid';
    $statement2 = $pdo2->prepare($sql2);
    $statement2->bindValue(':imageid', $id);
    $statement2->execute();
    $row2 = $statement2->fetch();
    echo '<div >';
    echo constructdetaillink($row2['ImageID']);
    echo '<img src="../travel-images/large/'.$row2['Path'].'"></a></div>';
    echo '<div><h2>'.$row2['Title'].'</h2>'  ;
    echo ' <p>'.$row2['Description'].'</p>' ;
    echo '<a href="dcollection.php?id=' . $row2['ImageID'] . '"><button onclick="">Delete</button></a>';
    echo '<hr></div>';
}
function constructdetaillink($id){
    return '<a href="图片.php?id=' . $id . '">';
}
function outuserimage($row){
    $imageid=$row['ImageID'];
    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo1 = new PDO($dsn, "root", "a79e7dkk");

    $sql1 = 'select Image, type,Title,Description,ImageID from  traveluserimage where ImageID=:imageid';
    $statement1 = $pdo1->prepare($sql1);
    $statement1->bindValue(':imageid', $imageid);
    $statement1->execute();
    $row1 = $statement1->fetch();
    echo '<div >';
    echo  detaillink($_SESSION['id'],$row1['ImageID']);
    echo '<img src="data:image/png;base64,'.base64_encode(stripslashes($row1['Image'])).'"></a></div>';
    echo '<div><h2>'.$row1['Title'].'</h2>'  ;
    echo ' <p>'.$row1['Description'].'</p>' ;
    echo '<a href="dcollection.php?id=' . $row1['ImageID'] . '"><button onclick="">Delete</button></a>';
    echo '<hr></div>';

}
function detaillink($id,$ImageID){
    return '<a href="图片1.php?id=' . $id . '&ImageID='.$ImageID.'">';
}


function Active($num){
    if ($num == $_SESSION['page']) {
        return "active";
    } else {
        return "";
    }
}
function Page($page){
    $url='我的收藏.php?page='.$page.'';
    return $url;
}
?>
<html>

<head>
    <title>SADE FAVORPAGE</title>
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
                        <li><a href="upload.php" class="nav2link">UPLOAD</a></li>
                        <li><a href="MyPictures.php" class="nav2link">MY PHOTO</a></li>
                        <li><a href="favorpage.php" class="nav2link">MY FAVORITE</a></li>
                        <li><a href="index.php" class="nav2link">LOGOUT</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
    <!--主要内容-->

    <din class="content-grid">
        <?php select1();?>
        <!--<div class="fav1">
            <a href="picdetail.html"><img src="../images/fav1.jpeg" width="250px"></a>
        </div>
        <div class="fav1intro">
            <h2><b>New NIKE Release</b></h2>
            <h5>According to the news that NIKE had released last Friday...<a href="">more</a></h5>
            <input type="checkbox" name="like" value="like" checked>FAV
        </div>

        <div class="fav2">
            <a href="picdetail.html"><img src="../images/fav1.jpeg" width="250px"></a>
        </div>
        <div class="fav2intro">
            <h2><b>New NIKE Release</b></h2>
            <h5>According to the news that NIKE had released last Friday...<a href="">more</a></h5>
            <input type="checkbox" name="like" value="like" checked>FAV
        </div>

        <div class="fav3">
            <a href="picdetail.html"><img src="../images/fav1.jpeg" width="250px"></a>
        </div>
        <div class="fav3intro">
            <h2><b>New NIKE Release</b></h2>
            <h5>According to the news that NIKE had released last Friday...<a href="">more</a></h5>
            <input type="checkbox" name="like" value="like" checked>FAV
        </div>

        <div class="fav4">
            <a href="picdetail.html"><img src="../images/fav1.jpeg" width="250px"></a>
        </div>
        <div class="fav4intro">
            <h2><b>New NIKE Release</b></h2>
            <h5>According to the news that NIKE had released last Friday...<a href="">more</a></h5>
            <input type="checkbox" name="like" value="like" checked>FAV
        </div>

        <div class="fav5">
            <a href="picdetail.html"><img src="../images/fav1.jpeg" width="250px"></a>
        </div>
        <div class="fav5intro">
            <h2><b>New NIKE Release</b></h2>
            <h5>According to the news that NIKE had released last Friday...<a href="">more</a></h5>
            <input type="checkbox" name="like" value="like" checked>FAV
        </div>-->


    </din>
    <!--页码-->
    <div class="favpage">

    </div>


    <!--悬浮功能键-->



    <footer class="footer">
        <img src="../images/kaiwechat.jpg" width="100px">
        <h5>Contact Me By WECHAT</h5>
    </footer>

</body>

</html>