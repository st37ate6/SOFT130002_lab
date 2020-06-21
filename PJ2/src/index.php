<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SADE</title>
    <link rel=stylesheet type="text/css" href="SADEcss.css">

</head>
<?php

function check() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dsn = "mysql:host=localhost:3306;dbname=newtravels;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "a79e7dkk");

    $sql = "SELECT * FROM traveluser
        WHERE UserName = :username AND Pass = :password";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        'username' => $username,
        'password' => $password
    ]);



    if ($statement->rowCount() === 0){
        echo'用户名和密码不正确';
    }else
        {
            $_SESSION["admin"] === true;
            echo '<script type="text/javascript">
            location.href="../HomePage.php";
</script>';
    }

}

?>

<body class="loginbody">
    <table class="logintable">

        <tr>

            <td>
                <h3>
                    <div class="logo">SADE</div>
                </h3>

                <hr class="logoline">

                <form action='' method='post' role='form'>
                    <div class ='form-group'>
                        <label for='username' class="loginusername" size="28 " maxlength="18">Username</label>&nbsp;
                        <input type='text' name='username' class='form-control'/>
                    </div>
                    <br>
                    <div class ='form-group'>
                        <label for='password' class="loginusername">Password</label>&nbsp;&nbsp;
                        <input type='password' name='password' class='form-control' size="20" maxlength="18"/>
                    </div>
                    <input class="loginbutton" type='submit' value='Login' />
                </form>
                <a class="loginlink2" href="SADESIGNUPPAGE.php">New? Create an acccount</a>
                <p class="contactus">Contact us: st37ate6@gmail.com </p>
                </p>
            </td>
        </tr>

    </table>
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])
        && $_POST['username'] !== '' && $_POST['password'] !== '') {
        echo check();
    } else echo "请输入用户名和密码";

    ?>
</body>
</html>