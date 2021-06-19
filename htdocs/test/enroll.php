<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'mytest');

$sql2 = "INSERT INTO manager(mid, mname, mphone) VALUES ($_POST[id], '$_POST[name]', $_POST[phone])";
$result2 = mysqli_query($conn, $sql2);
$rr = 1;
if (result2) {
    $rr = 3;
} else {

    $rr = 4;
}
global $rr;
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
    <div>
        <button>enroll</button>
        <button>signin</button>
        <button>signeeei</button>
        <button>logout</button>
    </div>

    <div>
        here result
        <?php echo $rr ?>

    </div>
</body>

</html>