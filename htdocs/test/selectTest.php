<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'root',
  'mytest');

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
  echo $row['sid'].'<br>'.$row['sname'].'<br>'.$row['sphone'].'<br>'.'<br>';
}
?>