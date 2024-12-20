<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM records WHERE id = :id");
$stmt->execute([':id' => $id]);

header('Location: index.php');
exit;
?>
