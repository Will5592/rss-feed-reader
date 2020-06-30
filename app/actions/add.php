<?php
include '../classes/controller/Feedscontroller.php';

// Init session
session_start();

$fc = new FeedsController;
$url = $_POST['url'];

$fc->addFeed($url);

$_SESSION['message'] = 'added';

// Redirect back to feeds page
header('Location: /feeds.php');
