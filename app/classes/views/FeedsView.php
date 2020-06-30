<?php

include  __DIR__ . '/../controller/FeedsController.php';
include  __DIR__ . '/../libs/RssRead.php';

class FeedsView extends FeedsController
{

    // Display all feeds stored in the database in card format
    public function displayFeeds()
    {
        $data = $this->getFeeds();

        if ($data and $data->rowCount() > 0) {

            foreach ($data as $feed) : ?>
                <div class="card mb-4 pt-3" style='position: relative'>
                    <div class="card-body">
                        <h4 class='mb-3'>
                            <a href="/single-feed.php?feed=<?php echo $feed['id'] ?>"><?php echo $feed['feed_url'] ?></a>
                        </h4>
                        <p class='bg-light' style='position: absolute;top: 0;right:0;padding: 5px 10px;'>Added: <?php echo $feed['date'] ?></p>
                        <div class="buttons ml-auto">
                            <a href="/single-feed.php?feed=<?php echo $feed['id'] ?>" class='btn btn-secondary mr-1'>View</a>
                            <a href="/feeds.php?id=<?php echo $feed['id'] ?>&edit=true" class='btn btn-info mr-1'>Edit</a>
                            <a href="/actions/delete.php?id=<?php echo $feed['id'] ?>" class='btn btn-danger'>Delete</a>
                        </div>
                    </div>
                </div>
<?php
            endforeach;
        } else {
            echo '<h2 class="text-danger">There are currenty no feeds stored, please add a feed.</h2>';
        }
    }

    // Display single feed stored in database in card format based on $id passed
    public function displaySingle($id)
    {
        $data = $this->getFeed($id);

        while ($row = $data->fetch()) {
            $id = $row['id'];
            $url = $row['feed_url'];
        }

        $RssRead = new RssRead;
        $RssRead->displayRssFeed($url);
    }
}
