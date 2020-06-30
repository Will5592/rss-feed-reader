<?php
include '../classes/controller/Feedscontroller.php';

// Init session
session_start();

$fc = new FeedsController;
$id = $_GET['id'];

$fc->deleteFeed($id);

$_SESSION['message'] = 'deleted';

// Redirect back to feeds page
header('Location: /feeds.php');
