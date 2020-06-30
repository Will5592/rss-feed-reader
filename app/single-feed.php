<?php
include 'classes/views/FeedsView.php';
$fv = new FeedsView;

// Load Header
include 'inc/header.php';
?>



<a class='btn btn-primary' href="/feeds.php">Back to feeds</a>

<?php
if (isset($_GET['feed'])) {
    $id = $_GET['feed'];
    $fv->displaySingle($id);
} else {
    echo 'This feed does not exist';
}


include './inc/footer.php';
?>