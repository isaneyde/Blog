<?php
require '../config.php';
session_start();

/*if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}*/

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM posts WHERE id = ?');
$stmt->execute([$id]);

header('Location: dashboard.php');
?>
