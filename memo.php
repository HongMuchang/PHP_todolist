<?php
//--------------------------
//-----投稿詳細確認画面--------
//--------------------------
require("./dbconnect.php");

//--------------------------
//URLパラメータを取得
//--------------------------
$id = $_REQUEST['id']; //安全


//数字ではないときに実行[URLパラメーターの改竄]
if (!is_numeric($id) || $id <= 0) {
    echo "1以上の数字で入力してください";
    exit();
}

//--------------------------
//1件取得
//--------------------------
$memo = $db->prepare('SELECT * FROM memos WHERE id=?'); //直接だと弱いのでprepareメソッドを用いる
$memo->execute(array($id));
$all = $memo->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center ">
                <p class="h2">詳細画面</p>
            </div>
            <div class="card-body">
                <p><?php echo $all['memo']; ?></p>
                <a href="index.php">戻る</a>

            </div>
        </div>
    </div>

</body>

</html>