<?php

//データベース接続文字列
$dsn = 'mysql:host=db;dbname=PDO_memo;charset=utf8mb4'; //!!指定方法!! [mysql,サーバーのアドレス,データベースのテーブル名,文字コード]
$user = 'root'; //ユーザー名
$password = 'secret'; //パスワード
//-------データベース追加-------
try { //例外処理~エラーが出たとき例外と値を送る
    $db = new PDO($dsn, $user, $password); //情報$dbに格納
} catch (PDOException $e) { //送られてきた例外処理を$eに格納する
    echo 'DB接続失敗です' . $e->getMessage();
}