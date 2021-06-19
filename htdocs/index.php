<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/style.css" />
    <script src="../src/test.js"></script>
    <title>main</title>
</head>

<body>
    <nav class="Nav">
        <a href="../index.php" class="Logo">JNU Library</a>
        <div class="btnDiv">
            <form action="../src/login.php" method="POST">
                <button type="submit" class="Button">로그인</button>
            </form>
            <form action="../src/join.php" method="POST">
                <button type="submit" class="Button">회원가입</button>
            </form>
        </div>
    </nav>
    <div class="Img_container">
        <img src="../img/home.jpeg" alt="">
    </div>

</body>

</html>