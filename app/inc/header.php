<?php
include  __DIR__ . '/../classes/libs/Messages.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Feed Reader</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    // Determine current url to output current 'active' class in nav
    $url = $_SERVER['REQUEST_URI']; ?>

    <header class="header mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <a href="/" class="navbar-brand">
                <h3>RSS FeedRead</h3>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo  $url === '/' ? 'active' : '' ?> ">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item <?php echo  $url === '/feeds.php' ? 'active' : '' ?>">
                        <a href="feeds.php" class="nav-link">Feeds</a>
                    </li>
                    <li class="nav-item <?php echo  $url === '/about.php' ? 'active' : '' ?>">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <div class="main">
        <div class="container">