<?php
require '../config.php';
session_start();

/*if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}*/

$stmt = $pdo->prepare('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE users.id = ?');
$stmt->execute([$_SESSION['id']]);
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
        <h2>MEUS POSTS</h2>
        <a href="criar.php" class="btn btn-primary">Criar Post</a>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Criado em</th>
                    <th>Administrar</th>
                </tr>
        
    
    

            </thead>
      
    
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?=$post['titulo'] ?></td>
                        <td><?= $post['criado_em'] ?></td>

                        <td>
                            <a href="visualizar.php?id=<?= $post['id'] ?>" class="btn btn-info">Visualizar</a>
                            <a href="editar.php?id=<?= $post['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="delectar.php?id=<?= $post['id'] ?>" class="btn btn-danger">Delectar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
    
        </table>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
</body>
</html>
