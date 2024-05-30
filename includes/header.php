<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WEBDESIGN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WEBDESIGN</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                   
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold dark" href="login.php">LOGIN</a>
                    </li>
                    
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</body>
</html>
