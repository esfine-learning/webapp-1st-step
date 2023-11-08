<?php
// データベース接続オブジェクトに対して SELECT 文を発行する
$dsn = "mysql:host=db; dbname=laravel; charset=utf8; port=3306";
$pdo = new PDO($dsn, 'laravel', 'laravel');

$sql = 'SELECT * FROM `comments`;';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$comments = $stmt->fetchall();
?>

<html>
<body>
  <form method="POST" action="./post.php">
    <input type="text" name="comment">
    <input type="submit" value="投稿する">
  </form>
  <h2>投稿一覧</h2>
  <table border="1">
<?php foreach ($comments as $comment) { ?>
    <tr>
      <td><?= $comment['id'] ?></td>
      <td><?= $comment['comment'] ?></td>
      <td><?= $comment['created'] ?></td>
    </tr>
<?php } ?>
  </table>
</body>
</html>
