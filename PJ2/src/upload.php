<html>

<head>
    <title>SADE Homepage</title>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="SADEcss.css">

    <script>
        function showMyImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById("output");
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>
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
    <article class="upload-main-content">
        <h1 class="article-title">UPLOAD MY NEW PICTURE</h1>
        <section class="upload-grid">
            <div class="upload-grid-1">
                <input type="file" accept="image/*" onchange="showMyImage(this)" />
                <br/>
                <img id="output" src="" alt="image" />

            </div>
            <div class="upload-grid-2">
                <p><label for="upload-title"><i>Title:</i><br><input type="text" name="upload-title" id="upload-title" ></label></p>
                <p><label for="upload-theme"><i>Theme:</i><br><input type="text" name="upload-theme" id="upload-theme" ></label></p>
                <p><label for="upload-place"><i>Place:</i><br><input type="text" name="upload>-place" id="upload-place" placeholder="Country or City"></label></p>
                <p><label for="upload-filmer"><i>Filmer:</i><br><input type="text" name="upload-filmer" id="upload-filmer" ></label></p>
            </div>
            <div class="upload-grid-3">
                <h2><i>Description</i></h2>
                <textarea name="description" class="textarea" placeholder="Type your feeling or share here...."></textarea>
            </div>
        </section>
        <div class="uploadbutton">
            <p><input type="submit" id="upload" value="UPLOAD" onclick="location.href='MyPictures.html'"> </p>
        </div>
    </article>


    <footer class="footer">
        <img src="../images/kaiwechat.jpg" width="100px">
        <h5>Contact Me By WECHAT</h5>
    </footer>

</body>

</html>