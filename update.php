<?php
require("./dbconnect.php");



//--------------------------
//編集画面の元内容の表示
//--------------------------
if ((isset($_REQUEST['id'])) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];


    $memo = $db->prepare('SELECT * FROM memos WHERE id=?');
    $memo->execute(array($id));
    $res = $memo->fetch();

    echo '<pre>';
    var_dump($res);
    echo '</pre>';
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
</head>

<body>


    <div class="container">
        <div class="card">
            <div class="form">
                <form method="post" action="update_do.php" 　>

                    <div class="card-header text-center">
                        <h1>編集画面</h1>
                    </div>

                    <div class="card-body">
                        <div class="form-group text-center">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <textarea name="memo" cols="50" rows="10" class=""><?php echo $res['memo']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary update-byn" name="signup"
                            value="signup">投稿する</button>
                        <a href="index.php">投稿画面</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>