<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');

$id = $_GET['id'];

$array = array();
$sql_getlog = "SELECT * FROM borrow_list WHERE ssid='" . $id . "'";
$result_getlog = mysqli_query($conn, $sql_getlog);

while ($row = mysqli_fetch_array($result_getlog)) {
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
            <h1 class="Title">대출 기록</h1>
            <div class="Content_scroll">
                <div class="Menus">
                    <form action="../src/student_borrow.php?id=<?php echo $id; ?>" method="POST">
                        <button class="Menu" type="submit">대출하기</button>
                    </form>
                    <form action="../src/student_log.php?id=<?php echo $id; ?>" method="POST">
                        <button class="Menu" type="submit">대출기록</button>
                    </form>
                </div>
                <article class="Article">
                    <div class="ItemTitle">
                        <div>도서 번호</div>
                        <div>대출일</div>
                        <div>반납일</div>
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
  <div>${book.blday}</div>
  <div>${book.blreturn}</div>`;

        $article.appendChild($item);
    }
    </script>

</body>

</html>