<?php
require 'config.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    $_SESSION['id'] = $user['id'];
    if ($username == $user["username"] && $password == $user['password']) {

        header('Location: posts/dashboard.php');
    } else {
        $error = 'Nome de usuario ou password invalidos';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
</head>

<body style="background-image: url('./img/img1.webp')">
    <div class="container col-md-5 mt-5">
        <h2 class="text-white text-center">Login</h2>
        <?php if (isset($error)) : ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group text-white">
                <label for="username">Username:</label>
                <input type="text" class="form-control " id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div><br>
            <button type="submit" class="btn btn-primary text-white">Entrar</button>
            <button type="reset" class="btn btn-primary text-white">Limpar</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
</body>

</html>