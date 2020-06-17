<?php
//--------------------------
//-データベースに登録するページ-
//--------------------------

//--------------------------
//query=SELECT(検索)
//exec=INSERT(追加)
//fetch=(取得)
//--------------------------
require("./dbconnect.php");


//------------------------------------------------------------------
//prepareメソッド+execute=同テーブルに複数の値を入れるときの便利な書き方（追加）
//------------------------------------------------------------------


//投稿ボタンをvalueが送られてきたとき
if (@$_POST['signup']) {
    $statement = $db->prepare("INSERT INTO memos SET memo=?,create_at=NOW()");
    @$statement->bindParam(1, $_POST['memo']);
    $statement->execute();
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">


        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="form">
                <form method="post" action="#" 　>

                    <div class="card-header text-center">
                        <h1>投稿画面</h1>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="memo"></label>
                            <input type="text" class="form-control" name="memo" placeholder="投稿する内容をご記入ください" />
                        </div>
                        <button type="submit" class="btn btn-primary" name="signup" value="signup">投稿する</button>
                        <a href="index.php">投稿画面</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>