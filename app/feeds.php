<?php

include 'classes/views/FeedsView.php';
$fv = new FeedsView();

// Init session
session_start();

// Load Header
include 'inc/header.php';

// Output message to user if relevant $_SESSION var exists
$messsages = new Messages;
$messsages->showMessage();

?>

<h1 class='mb-3'>Feeds</h1>

<?php

// ## Determine if in edit mode and display feeds.php accordingly

// Initialise Edit mode to false
$editMode = false;

// Check if $_GET is set and in edit mode
if (isset($_GET['edit']) and $_GET['edit'] === 'true') {

    $id = $_GET['id'];

    // Set edit mode to true
    $editMode = true;

    // Call single row from database === to $id, store column values in vars
    $data = $fv->getFeed($id);
    $row = $data->fetch();
    $id = $row['id'];
    $feed_url = $row['feed_url'];

    // Echo h3 to notify user which feed they are editing
    echo '<h3 class="ml-3 text-danger">You are currently editing feed #' . $id . '</h3>';
}

?>

<form class='border-bottom border-secondary p-3 mb-4' action="/actions/<?php echo $editMode ? 'edit' : 'add' ?>.php" method='post'>
    <div class="form-group">
        <input class='form-control' type="text" name='url' placeholder='Enter RSS Feed' value='<?php echo $editMode ? $feed_url : '' ?>' required>
        <input type="text" name='id' value='<?php echo $id ?>' readonly hidden>
    </div>
    <input class='btn <?php echo $editMode ? 'btn-info' : 'btn-primary' ?> mb-3' type="submit" value="<?php echo $editMode ? 'Update' : 'Add' ?>">
    <?php if ($editMode) : ?>
        <a class='btn btn-danger mb-3 ml-1' href="/feeds.php">Cancel</a>
    <?php endif ?>
</form>

<div class="feeds">
    <?php $fv->displayFeeds(); ?>
</div>


<?php
include './inc/footer.php';
