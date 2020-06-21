<html>

<head>
    <title>SADE Homepage</title>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="SADEcss.css">

    <script>
        var proData = {
            "China": ["上海", "北京", "西安", "山西"],
            "United States": ["Boston", "Chicago", "Dallas", "Denver"],
            "Japan": ["Osaka", "Tokyo", "Okinawa", "Kyushu"],
            "Korea": ["Seoul", "Incheon", "Gyeongju", "Andong"]
        };

        window.onload = function() {
            var oSelectPro = document.getElementById('pro_id');
            var oSelectCity = document.getElementById('city_id');

            oSelectPro.onchange = function() {
                //获取当前选中的标签值
                var aRrayCity = proData[this.value];
                //选择后清空option
                oSelectCity.options.length = 0;
                for (var i = 0; i < aRrayCity.length; i++) {
                    var oOption = document.createElement('option');
                    oOption.innerHTML = aRrayCity[i];
                    oOption.value = aRrayCity[i];
                    oSelectCity.appendChild(oOption)
                }
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
                        <li><a href="index.php" class="nav2link">SIGN IN</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
    <!--主要内容-->
    <div class="sidebarchange">
        <table>
            <tr>
                <td>
                    <li>热门国家快速浏览
                        <ul>
                            <li>
                                <a href="" class="browselink1">China</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">United States</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">England</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">Japan</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">Korea</a>
                            </li>
                        </ul>
                    </li>
                </td>
                <td>
                    <li>热门城市快速浏览
                        <ul>
                            <li>
                                <a href="" class="browselink1">ShangHai</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">London</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">California</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">Tokyo</a>
                            </li>
                            <li>
                                <a href="" class="browselink1">Seoul</a>
                            </li>
                        </ul>
                    </li>
                </td>
            </tr>
            <tr>
                <td>
                    <form class="inputchange">
                        <input class="sidebarinput3" type="text" name="browse-search" placeholder="Search By Title...">


                </td>
                <td>
                    <input class="sidebarinput4" type="submit" name="Search" value="Search">
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <div class="browser-content">

        <div class="browser-tool">
            <form>
                <select name="province" id="pro_id" class="city-select">
            <option>---請選擇----</option>
            <option value="China">China</option>
            <option value="United States">United States</option>
            <option value="Japan">Japan</option>
            <option value="Korea">Korea</option>
        </select>
                <select name="city" id="city_id" class="city-select">
        </select>
                <input type="submit" value="Search" class="city-search">
            </form>
        </div>


        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>

        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>
        </div>
        <div>
            <a href=""><img src="../images/bgpic2.jpeg" width="100%"></a>

        </div>
    </div>



    <div class="sidebar">
        <table>
            <tr>
                <td>
                    <form>
                        <input class="sidebarinput1" type="text" name="browse-search" placeholder="Search By Title..."><br><br>
                        <input class="sidebarinput2" type="submit" name="Search" value="Search">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>热门国家快速浏览
                        <li>
                            <a href="" class="browselink">China</a>
                        </li>
                        <li>
                            <a href="" class="browselink">United States</a>
                        </li>
                        <li>
                            <a href="" class="browselink">England</a>
                        </li>
                        <li>
                            <a href="" class="browselink">Japan</a>
                        </li>
                        <li>
                            <a href="" class="browselink">Korea</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>热门城市快速浏览
                        <li>
                            <a href="" class="browselink">ShangHai</a>
                        </li>
                        <li>
                            <a href="" class="browselink">London</a>
                        </li>
                        <li>
                            <a href="" class="browselink">California</a>
                        </li>
                        <li>
                            <a href="" class="browselink">Tokyo</a>
                        </li>
                        <li>
                            <a href="" class="browselink">Seoul</a>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>







    <footer class="footer">
        <img src="../images/kaiwechat.jpg" width="100px">
        <h5>Contact Me By WECHAT</h5>
    </footer>

</body>

</html>