<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');

$id = $_GET['id'];
$bid = $_POST['bid'];
$bname = $_POST['bname'];
$date = date('Y-m-d');
$endDate = date('Y-m-d', strtotime("+14 days"));

if (!is_null($bid)) {
    $sql_blist = "INSERT INTO borrow_list(bid, ssid, blday, blreturn) VALUES ('" . $bid . "', '" . $id . "','" . $date . "','" . $endDate . "')";
    $result_blist = mysqli_query($conn, $sql_blist);

    $sql_b = "INSERT INTO borrow(ssid, bid, bname) VALUES ('" . $id . "','" . $bid . "','" . $bname . "')";
    $result_b = mysqli_query($conn, $sql_b);

    if ($result_blist && $result_b) {
        echo "<script>alert(\"도서 대출 성공\");</script>";
    } else {
        echo "<script>alert(\"도서 대출 실패\");</script>";
    }
}

$array = array();
$sql_getbook = "SELECT * FROM book";
$result_getbook = mysqli_query($conn, $sql_getbook);

while ($row = mysqli_fetch_array($result_getbook)) {
    array_push($array, $row);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/style.css" />
    <title>student</title>
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
            <h1 class="Title">도서 대출하기</h1>
            <div class="Content_scroll">
                <div class="Menus">
                    <form action="../src/student_borrow.php?id=<?php echo $id; ?>" method="POST">
                        <button class="Menu" type="submit">대출하기</button>
                    </form>
                    <form action="../src/student_log.php?id=<?php echo $id; ?>" method="POST">
                        <button class="Menu" type="submit">대출 기록</button>
                    </form>
                </div>
                <div class="Inputs">
                    <form action="../src/student_borrow.php?id=<?php echo $id; ?>" method="POST">
                        <input class="Textbox" type="number" name="bid" placeholder="도서 번호" />
                        <input class="Textbox" type="text" name="bname" placeholder="도서명" />
                        <button class="Submit" type="submit">확인</button>
                    </form>
                </div>

                <article class="Article">
                    <div class="ItemTitle">
                        <div>도서 번호</div>
                        <div>도서명</div>
                        <div>장르</div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <script>
    let a = '<?php echo json_encode($array); ?>';
    let bookList = eval(a);
    console.log(bookList);

    let $article = document.getElementsByClassName("Article")[0];
    for (let book of bookList) {
        let $item = document.createElement("div");
        $item.className = "Item";
        $item.innerHTML = `
  <div>${book.bid}</div>
  <div>${book.bname}</div>
  <div>${book.bsub}</div>`;

        $article.appendChild($item);
    }
    </script>
</body>

</html>