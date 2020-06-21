<html>

<head>
    <meta charset="UTF-8">
    <title>SADE SignUp Page</title>
    <link rel=stylesheet type="text/css" href="SADEcss.css">
    <script src="../JS/jq/jquery-3.4.1/jquery-3.4.1.min.js"></script>

</head>

<body class="body">
    <table class="signuptable" border="2">

        <tr>

            <td align="center">
                <h3>
                    <div class="logo">
                        SADE
                    </div>
                </h3>
                <hr class="logoline">
                <div class="title1">I'M NEW...</div>
                <div class="title2">SIGN UP NOW</div>

             <form method="post">
                <div class="signupinput">
                    <div class="form">
                        <small id="name1">请输入用户名</small>
                    <p><input class="signupinput1" type="text" name="username" id="username" autocomplete="off" required onblur="account();check()" onkeyup="account();check()" size="45" style="height: 40px;" placeholder="Your Username(Max. 12 character)" maxlength="12 " /></p>
                    </div>
                    <div class="form">
                        <small id="mail1">请输入邮箱</small>
                    <p><input class="signupinput1" type="text" name="useremail"  id="useremail" autocomplete="off" required onblur="email();check()" onkeyup="email();check()" size="45" style="height: 40px;" placeholder="Enter your EMAIL " /></p>
                    </div>
                    <div class="form">
                        <small id="psw1">请输入密码</small>
                            <p><input class="signupinput1" type="password" name="password" id="password" autocomplete="off" required onblur="psw();check()" onkeyup="psw();check()" size="45" style="height: 40px;" placeholder="Your Password(Min. 8 character)" maxlength="16 " /></p>
                    </div>
                    <div class="form">
                        <small id="psw2">请再次输入密码</small>
                        <p><input class="signupinput1" type="password" name="password1" id="password1" autocomplete="off" required onblur="psw1();check()" onkeyup="psw1();check()" size="45" style="height: 40px;" placeholder="Confirm your password" maxlength="16" /></p>
                    </div>

                    <div class="form"> <p><input class="createaccountbotton" type="submit" id="submit" value="CREATE AN ACCOUNT" disabled="disabled"> </p>
                    </div>

                </div>
             </form>
                <p><input class="createaccountbotton" type="submit" id="backtologin" value="BACK TO LOGIN" onclick="location='../index.php'"> </p>

                </p>
            </td>
        </tr>

    </table>
    <script>
        var flags = [false,false,false,false];
        /*邮箱正则*/
        var RegEmail = /[\w]+(.[\w]+)*@[\w]+(.[\w])+/;
        /*用户名正则*/
        var Tname =/^[0-9a-zA-Z_]{1,}$/
        /*用户名检验*/
        function account(){

            var account = $("#username").val();
            var option = document.getElementById("name1");
            option.innerHTML="";
            var textNode = document.createTextNode("用户名格式错误！");
            var textNode1 = document.createTextNode("用户名格式正确！");
            var textNode2 = document.createTextNode("请输入用户名");
            if(account==""){
                option.appendChild(textNode2);
                flags[0] = false;
            }
            else if(!Tname.test(account)) {
                option.appendChild(textNode);
                flags[0] = false;
            }
            else{
                option.appendChild(textNode1);
                flags[0] = true;
            }

        }
        /*邮箱检验*/
        function email(){

            var email = $("#useremail").val();
            var option = document.getElementById("mail1");
            option.innerHTML="";
            var textNode = document.createTextNode("邮箱格式错误！");
            var textNode1 = document.createTextNode("邮箱格式正确！");
            var textNode2 = document.createTextNode("请输入邮箱");
            if(email==""){
                option.appendChild(textNode2);
                flags[1] = false;
            }
            else if(!RegEmail.test(email)) {
                option.appendChild(textNode);
                flags[1] = false;
            }
            else{
                option.appendChild(textNode1);
                flags[1] = true;
            }

        }
        /*密码检验*/
        function psw(){

            var psw1 = $("#password").val();
            var option = document.getElementById("psw1");
            option.innerHTML="";
            var textNode = document.createTextNode("密码过于简单！");
            var textNode1 = document.createTextNode("密码格式正确！");
            var textNode2 = document.createTextNode("请输入密码");
            if(psw1==""){
                option.appendChild(textNode2);
                flags[2] = false;
            }
            else if(psw1.length<6) {
                option.appendChild(textNode);
                flags[2] = false;
            }
            else{
                option.appendChild(textNode1);
                flags[2] = true;
            }

        }
        /*再次输入密码检验*/
        function psw1() {

            var psw2=$("#password1").val();
            var option = document.getElementById("psw2");
            option.innerHTML="";
            var textNode = document.createTextNode("密码不一致！");
            var textNode1 = document.createTextNode("密码格式正确！");
            var textNode2 = document.createTextNode("请再次输入密码");
            if(psw2==""){
                option.appendChild(textNode2);
                flags[3] = false;
            }
            else if(psw2!=$("#password").val()){
                option.appendChild(textNode);
                flags[3] = false;
            }
            else {
                flags[3] = true;
                option.appendChild(textNode1);
            }

        }
        function check() {
            for (var i=0;i<4;i++) {
                if (!flags[i]) {
                    $("#submit").attr("disabled", "disabled");
                    break;
                }
                else {
                    $("#submit").removeAttr("disabled");
                }
            }

        }
    </script>
    <?php

    function checkmail(){
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
                $pdo = new PDO($dsn, "root", "a79e7dkk");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'select Username from traveluser WHERE Username=:user';

                $statement = $pdo->prepare($sql);
                $statement->bindValue(':user', $_POST['username']);
                $statement->execute();

                $sql1 = 'INSERT INTO traveluser VALUES(null,:email,:user,:psw,null ,null,null)';
                $statement1 = $pdo->prepare($sql1);

                $statement1->bindValue(':email',$_POST['useremail']);
                $statement1->bindValue(':psw',$_POST['password']);
                $statement1->bindValue(':user', $_POST['username']);

                if ($statement->rowCount() > 0) {

                    echo "<script type='text/javascript'>alert('用户名已存在！');</script>";
                }
                else{

                    $statement1->execute();
                    echo "<script type='text/javascript'>alert('注册成功！');location.href='../index.php';</script>";
                }
                $pdo = null;
            }
        }
        catch (PDOException $e){
            die( $e->getMessage() );
        }
    }
    checkmail();
?>

</body>

</html>