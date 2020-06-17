<?php
//--------------------------
//-------覧表示ページ---------
//--------------------------
require("./dbconnect.php");


//--------------------------
//------ページネーション-------
//--------------------------

//ページが指定されていた場合
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    //URLパラメーターを省略した場合
    $page = 1;
}
$start = 5 * ($page - 1);

//降順に並び替え,ページング
$memo = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?,5');
$memo->bindParam(1, $start, PDO::PARAM_INT);
$memo->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">

            <div class="card-header text-center fontsize">
                <p>投稿一覧(index.php)</p>

            </div>
            <p><a href="input_do.php">投稿画面</a></p>
            <!-- 全件取得=取得したらfalseが帰ってくる  -->
            <?php while ($all = $memo->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="card-body">
                <div class="content">
                    <div class="content-left">
                        <p>
                            <!--表示文字制限、投稿内容、日時の表示-->
                            <a　href="memo.php?id=<?php echo $all['id']; ?>"><?php echo mb_substr($all['memo'], 0, 30); ?></a>
                        </p>
                        <time><?php echo $all['create_at']; ?></time>
                    </div>

                    <!-- 編集、削除 -->
                    <div class="content-right">
                        <button type="button" class="btn btn-success btn-form btn-sm "> <a style="color: aliceblue;"
                                href="update.php?id=<?php echo $all['id']; ?>">編集する</a></button>
                        <button type="button" class="btn btn-danger btn-form btn-sm "> <a style="color: aliceblue;"
                                href="delete.php?id=<?php echo $all['id']; ?>">削除</a></button>

                    </div>
                </div>
                <hr>
                <!-- ページの切り替え -->

            </div>
            <?php endwhile; ?>
        </div>
    </div>

    </div>
    <!-- ページング表示 -->
    <div class="pageing text-center">
        <?php if ($page >= 2) : ?>
        <a href="index.php?page=<?php echo $page - 1; ?>"><?php echo $page - 1; ?>ページ目</a>
        <?php endif; ?>
        |
        <?php
        $count = $db->query('SELECT COUNT(*) as cnt FROM memos');
        $count = $count->fetch();
        $max_page = ceil($count['cnt'] / 5);
        if ($page < $max_page) :
        ?>
        <a href="index.php?page=<?php echo $page + 1; ?>"><?php echo $page + 1; ?>ページ目</a>
        <?php endif; ?>
</body>

</html>