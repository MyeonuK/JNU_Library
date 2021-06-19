<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');

$id = $_GET['id'];
$bid = $_POST['bid'];
$bname = $_POST['bname'];
$bsub = $_POST['bsub'];

if (!is_null($bid) && !is_null($bname)) {
    $sql_book = "INSERT INTO book(bid, bname, bsub) VALUES ('" . $bid . "', '" . $bname . "','" . $bsub . "')";
    $result_book = mysqli_query($conn, $sql_book);

    $sql_manage = "INSERT INTO manage(mid, bid) VALUES ('" . $id . "','" . $bid . "')";
    $result_manage = mysqli_query($conn, $sql_manage);

    if ($result_book && $result_manage) {
        echo "<script>alert(\"등록 성공\");</script>";
    } else {
        echo "<script>alert(\"등록 실패\");</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/style.css" />
    <title>manager</title>
</head>

<body>
    <div class="Nav">
        <a href="../index.php" class="Logo">JNU Library</a>
    </div>
    <div class="Img_container">
        <img src="../img/home.jpeg" alt="">
    </div>
    <div class="Center_container">
        <div class="Center_content">
            <h1 class="Title">도서 등록</h1>
            <div class="Inputs">
                <form action="../src/manager_enroll.php?id=<?php echo $id; ?>" method="POST">
                    <input class="Textbox" type="number" name="bid" placeholder="도서 번호" />
                    <input class="Textbox" type="text" name="bname" placeholder="도서명" />
                    <input class="Textbox" type="text" name="bsub" placeholder="장르" />
                    <button class="Submit" type="submit">확인</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>