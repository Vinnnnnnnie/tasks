<?php
//if (!isset($_SESSION))
//{
//    session_start();
//}
//$loggedIn = false;
//$username = 'NULL';
//if (isset($_SESSION['login']) && $_SESSION['login'] === true)
//{
//    $username = $_SESSION['username'];
//    $loggedIn = true;
//}
$loggedIn = false;
$username = 'charlse';
?>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vincent's Site</title>
    <link href="<?=DOC_ROOT?>css/stylesheet.css" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <h1>Tasks</h1>
        <div>
            <?php if ($loggedIn === true):?>
            <div class="nav-item p-1">
                <span>Hello <?php echo $username?></span>
            </div>
            <?php else: ?>
            <div class="nav-item p-1">
                <a class="btn btn-primary" href="http://192.168.1.124/index.php?file=signup">Sign Up</a>
            </div>
            <div class="nav-item p-1">
                <a class="btn" href="http://192.168.1.124/index.php?file=login">Sign In</a>
            </div>
            <?php endif; ?>
        </div>
    </nav>
</header>
</html>