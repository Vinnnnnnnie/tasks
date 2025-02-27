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
$css_changed = filemtime(APP_ROOT . '/public/css/stylesheet.css');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vincent's Site</title>
    <link href="<?=DOC_ROOT?>/public/css/stylesheet.css?version=<?=$css_changed?>" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <h1>Tasks</h1>
        <div>
            <?php if ($loggedIn === true):?>
            <div>
                <span>Hello <?php echo $username?></span>
            </div>
            <?php else: ?>
            <a>Sign Up</a>
            <a>Sign In</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
</html>