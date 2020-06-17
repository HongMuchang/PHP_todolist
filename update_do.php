<?php
require("./dbconnect.php");

$statement = $db->prepare("UPDATE memos SET memo=? WHERE id=?");
$res = $statement->execute(array($_POST['memo'], $_POST['id']));



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>メモを変更しました。</p>
    <a href="index.php">戻る</a>
</body>

</html>