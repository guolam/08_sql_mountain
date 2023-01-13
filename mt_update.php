<?php
include("functions.php");

if (
    !isset($_POST['id']) || $_POST['id'] === ''
) {
    exit('paramError');
}

$id = $_POST['id'];
$mountain_id = $_POST['mountain_id'];
$mont = $_POST['mont'];
$nameKana = $_POST['nameKana'];
$area = $_POST['area'];
$prefectures = $_POST['prefectures'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$happy = $_POST['happy'];


// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'UPDATE mountain SET mountain_id=:mountain_id, mont=:mont, nameKana=:nameKana, area=:area, prefectures=:prefectures, latitude=:latitude,longitude=:longitude,happy=:happy,updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);
$stmt->bindValue(':mont', $mont, PDO::PARAM_STR);
$stmt->bindValue(':nameKana', $nameKana, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':prefectures', $prefectures, PDO::PARAM_STR);
$stmt->bindValue(':latitude', $latitude, PDO::PARAM_STR);
$stmt->bindValue(':longitude', $longitude, PDO::PARAM_STR);
$stmt->bindValue(':happy', $happy, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:mt_read.php");
exit();
