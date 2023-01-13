<?php
include("functions.php");

$pdo = connect_to_db();

$sql = 'SELECT * FROM mountain WHERE deleted_at IS NULL ORDER BY mountain_id ASC';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
     
      <td>{$record["mountain_id"]}</td>
      <td>{$record["mont"]}</td>
      <td>{$record["nameKana"]}</td>
      <td>{$record["area"]}</td>
      <td>{$record["prefectures"]}</td>
      <td>{$record["latitude"]}</td>
      <td>{$record["longitude"]}</td>
      <td>{$record["happy"]}</td>
     
      <td>
      <a href='mt_edit.php?id={$record["id"]}'>編集</a>
      </td>
      <td>
       <a href='mt_delete.php?id={$record["id"]}'>削除</a>
      </td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>私の山リスト</title>
</head>

<body>
  <fieldset>
    <legend>私の山リスト</legend>
    <a href="mt_input.php">入力画面</a>
    <table>
      <thead>
        <tr>

        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>