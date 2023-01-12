<?php
include("functions.php");

if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['prefecture']) || $_POST['prefecture'] === ''
) {
    exit('paramError');
}

$mountain_id = $_POST['mountain_id'];
$name = $_POST['name'];
$nameKana = $_POST['nameKana'];
$area = $_POST['area'];
$gsiUrl = $_POST['gsiUrl'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$prefectures = $_POST['prefectures'];


// DB接続
$pdo = connect_to_db();

$sql = 'INSERT INTO mountain(id,mountain_id, name, nameKana, area, prefecture, latitude, longitude, gsiUrl, created_at, updated_at, deleted_at) VALUES(NULL, "156", "八甲田山<大岳>" ,"はっこうださん<おおだけ>", "奥羽山脈北部（八甲田山とその周辺）", "青森県", "40.65888888888889", "140.87722222222223", "https://maps.gsi.go.jp/#15/40.65888888888889/140.87722222222223", now(), now(), NULL)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':nameKana', $nameKana, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefectures, PDO::PARAM_STR);
$stmt->bindValue(':latitude', $latitude, PDO::PARAM_STR);
$stmt->bindValue(':longitude', $longitude, PDO::PARAM_STR);
$stmt->bindValue(':gisUrl', $gisUrl, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:mt_read.php");
exit();
