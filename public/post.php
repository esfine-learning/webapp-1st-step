<?php

// フォームから値を受け取り
$comment = $_POST['comment'];

// データベースへ接続し
$dsn = "mysql:host=db; dbname=laravel; charset=utf8; port=3306";
$pdo = new PDO($dsn, 'laravel', 'laravel');

// データベース接続オブジェクトに対して INSERT 文を発行する
$sql = 'INSERT INTO `comments` (`comment`, `created`) VALUES (?, NOW());';
$stmt = $pdo->prepare($sql);
$stmt->execute([$comment]);

// 登録完了後に TOP ページへ戻る
header('Location: ./index.php');
