<?php
include './classes/libs/RssRead.php';

// Load Header
include 'inc/header.php';
?>


<div class="container">
    <form class='border-bottom border-secondary p-3 mb-4' action="" method='post'>
        <div class="form-group">
            <input class='form-control' type="text" name='feed' placeholder='Enter RSS Feed'>
        </div>
        <input class='btn btn-primary mb-3' type="submit" value="Parse Feed">
    </form>
    <!-- Working Option -->
    <?php

    if (isset($_POST['feed'])) :

        $url = $_POST['feed'];
        $urlClean = strip_tags($url);
        $RssRead = new RssRead;

        $RssRead->displayRssFeed($url);

    else :
        echo '<h3 class="text-danger">No Feeds Found. Please submit an RSS URL above.</h3>';
    endif;

    ?>

</div>

<?php
include './inc/footer.php';
