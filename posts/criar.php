<?php
require '../config.php';
session_start();

/*if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['id'];

    $stmt = $pdo->prepare('INSERT INTO posts (user_id, titulo, conteudo) VALUES (?, ?, ?)');
    $stmt->execute([$user_id, $title, $content]);

    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Criar Post</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Conteudo</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Criar</button><br>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
</body>
</html>
