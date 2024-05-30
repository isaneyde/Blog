<?php
require '../config.php';
session_start();

/*if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}*/

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['titulo'];
    $content = $_POST['conteudo'];

    $stmt = $pdo->prepare('UPDATE posts SET titulo = ?, conteudo = ? WHERE id = ?');
    $stmt->execute([$title, $content, $id]);

    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Post</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input type="text" class="form-control" id="title" name="titulo" value="<?= htmlspecialchars($post['titulo']) ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Conteudo:</label>
                <textarea class="form-control" id="content" name="conteudo" rows="5" required><?= htmlspecialchars($post['conteudo']) ?></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
