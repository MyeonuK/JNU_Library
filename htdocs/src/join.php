<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');

$ssid = $_POST['ssid'];
$spw = $_POST['spw'];
$sname = $_POST['sname'];
$sphone = $_POST['sphone'];

if (!is_null($ssid) && !is_null($spw)) {
    $sql_join = "INSERT INTO student(ssid, spw, sname, sphone) VALUES ('" . $ssid . "', '" . $spw . "','" . $sname . "','" . $sphone . "')";
    $result_join = mysqli_query($conn, $sql_join);

    if ($result_join) {
        echo "<script>alert(\"join success\");</script>";
    } else {
        echo "<script>alert(\"join failed\");</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/style.css" />
    <title>signup</title>
</head>

<body>
    <div class="Nav">
        <a href="../index.php" class="Logo">JNU Library</a>
        <div class="btnDiv">
            <form action="../src/login.php" method="POST">
                <button type="submit" class="Button">로그인</button>
            </form>
            <form action="../src/join.php" method="POST">
                <button type="submit" class="Button">회원가입</button>
            </form>
        </div>
    </div>
    <div class="Img_container">
        <img src="../img/home.jpeg" alt="">
    </div>
    <div class="Center_container">

        <div class="Center_content">
            <h1 class="Title">회원가입</h1>
            <div class="Inputs">
                <form action="../src/join.php" method="POST">
                    <input class="Textbox" type="number" name="ssid" placeholder="아이디" />
                    <input class="Textbox" type="password" name="spw" placeholder="비밀번호" />
                    <input class="Textbox" type="text" name="sname" placeholder="이름" />
                    <input class="Textbox" type="text" name="sphone" placeholder="전화번호" />
                    <button class="Submit" type="submit">확인</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>