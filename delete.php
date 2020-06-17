<?php
require('./dbconnect.php');

if ((isset($_REQUEST['id'])) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $memo = $db->prepare('DELETE FROM memos WHERE id=?');
    $memo->execute(array($id));
    $res = $memo->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>削除しました</p>
    <a href="index.php">戻る</a>
</body>

</html>