<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');

$ms = $_POST['ms'];
$id = $_POST['id'];
$pw = $_POST['pw'];

global $ms;
global $id;
$isId = 0;
$isPw = 0;

if (!is_null($ms)) {
    if (!is_null($id) && !is_null($pw)) {
        if ($ms == "m") {
            $sql_login = "SELECT mpw FROM manager WHERE mid = '" . $id . "';";
            $result_login = mysqli_query($conn, $sql_login);

            while ($row = mysqli_fetch_array($result_login)) {
                $right_pw = $row['mpw'];
            }

            if (is_null($right_pw)) {
                $isId = 1;
            } else if ($right_pw != $pw) {
                $isPw = 1;
            } else {
                header("Location: ../src/manager_enroll.php?id=$id");
            }
        } else if ($ms == "s") {
            $sql_login = "SELECT spw FROM student WHERE ssid = '" . $id . "';";
            $result_login = mysqli_query($conn, $sql_login);

            while ($row = mysqli_fetch_array($result_login)) {
                $right_pw = $row['spw'];
            }

            if (is_null($right_pw)) {
                $isId = 1;
            } else if ($right_pw != $pw) {
                $isPw = 1;
            } else {
                header("Location: ../src/student_borrow.php?id=$id");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/style.css" />
    <title>login</title>
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
            <h1 class="Title">로그인</h1>
            <div class="Inputs">
                <form class="Form" action="login.php" method="POST">
                    <input class="Textbox" type="number" name="id" placeholder="아이디" />
                    <input class="Textbox" type="password" name="pw" placeholder="비밀번호" />
                    <div class="Radios">
                        <p>관리자</p>
                        <input type="Radio" name="ms" value="m" />
                        <p>학생</p>
                        <input type="Radio" name="ms" value="s" />
                    </div>
                    <button class="Submit" type="submit">확인</button>
                    <?php
if ($isId == 1) {
    echo "<script>alert(\"wrong id\");</script>";
} else if ($isPw == 1) {
    echo "<script>alert(\"wrong pw\");</script>";
}
?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>