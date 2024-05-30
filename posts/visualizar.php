<?php
require '../config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch();


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['titulo']) ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 id="titulo"><?= htmlspecialchars($post['titulo']) ?></h2>
        <p id="conteudo"><?= htmlspecialchars($post['conteudo']) ?></p>
        <p>Posted by <?= htmlspecialchars($post['username']) ?> on <?= $post['criado_em'] ?></p>

        
       

      
    </div>
</body>
</html>
