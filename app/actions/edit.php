<?php
include '../classes/controller/Feedscontroller.php';

// Init session
session_start();

$fc = new FeedsController;

$id = $_POST['id'];
$url = $_POST['url'];


$fc->updateFeed($id, $url);

$_SESSION['message'] = 'updated';

// Redirect back to feeds page
header('Location: /feeds.php');
