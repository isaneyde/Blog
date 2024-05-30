<?php
require 'config.php';

$stmt = $pdo->query('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.criado_em DESC');
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    p{
        color: white;
    }
</style>
<body style="background-image: url('img/ux.webp');">
    <?php include 'includes/header.php'; ?>

            <h2 style="color: white;">Posts Anteriores</h2>
                <div class="container">
                    <?php foreach ($posts as $post) : ?>
                        <div class="post">
                            <h3><a href="./posts/visualizar.php $post['id'] ?>"><?= htmlspecialchars($post['titulo']) ?></a></h3>
                            <p>by <?= htmlspecialchars($post['username']) ?> on <?= $post['criado_em'] ?></p>
                            <p><?= htmlspecialchars(substr($post['conteudo'], 0, 600)) ?>  </p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php include 'includes/footer.php'; ?>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>