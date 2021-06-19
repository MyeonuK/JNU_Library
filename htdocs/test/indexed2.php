<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');
global $conn;

$sql = "SELECT * FROM student";
global $sql;

$result = mysqli_query($conn, $sql);
$test = "hellooooo";
global $test;

function printThat()
{
    global $test;
    return $test;
}

$array = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($array, $row);
    echo $row['sid'] . '<br>' . $row['sname'] . '<br>' . $row['sphone'] . '<br>' . '<br>';
}

function enrolll()
{
    $sql2 = "INSERT INTO manager(mid, mname, mphone) VALUES (1234, 'Kim', 11111)";
    $result2 = mysqli_query($conn, $sql2);
    echo $result2;
    if ($result2 == 1) {
        return 1;
    } else {
        echo "0";
        return 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="test.js"></script>
    <title>what</title>
</head>

<body>
    <button onclick="hehe()">push</button>
    <button onclick="enrolll()">enroll</button>

    <form action="enroll.php" method="post">
        mid: <input type="number" name="id" />
        mname: <input type="text" name="name" />
        mphone: <input type="number" name="phone" />
        <input type="submit" />
    </form>

    <script>
    function hehe() {
        let a = '<?php echo json_encode($array); ?>';
        obj = eval(a);
        //obj = JSON.parse(a);
        please();
    }

    function enrolll() {
        let a = '<?php echo enrolll(); ?>';
        if (a == 1) {
            alert("ok");
        } else if (a == 0) {
            alert("non");
        }
    }
    </script>
</body>

</html>