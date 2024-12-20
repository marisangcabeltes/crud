<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM records WHERE id = :id");
$stmt->execute([':id' => $id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE records SET name = :name, email = :email WHERE id = :id");
    $stmt->execute([':name' => $name, ':email' => $email, ':id' => $id]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Record</h1>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $record['name'] ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $record['email'] ?>" required><br>
            <input type="submit" value="Update">
        </form>
        <a href="index.php" class="back-link">Back to Records</a>
    </div>
</body>
</html>
