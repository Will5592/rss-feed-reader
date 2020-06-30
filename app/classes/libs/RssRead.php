<?php

class RssRead
{

    public function displayRssFeed($url)
    {

        // Check $URL var was passed to function, if not, echo error message and quit.
        if (!$url) {
            echo '<h4 class=text-danger>Please enter a URL </h4>';
            die();
        }

        // Check if valid RSS feed URL
        if (simplexml_load_file($url)) {
            $xml = simplexml_load_file(($url));
        } else {
            $invalidurl = true;
            echo '<h3 class="text-danger">Invalid RSS feed</h3>';
            // die();
        }

        // If RSS feed is not empty, determine outcome
        if (!empty($xml)) :

            // Output title of feed and open card div
            echo '<h1 class="mt-3 mb-4"><span class="text-success">Feed: </span>' . $xml->channel->title . '</h1>';
            echo '<div class="cards">';

            // Determine structure of feed and output accordingly (necessary due to inconsistent nature of RSS structure)

            // If feed follows normal structure with 'Item' nested within 'Channel'
            if ($xml->channel->item) :
                foreach ($xml->channel->item as $item) : ?>
                    <div class="card mb-4">
                        <?php if ($item->pubDate) : ?>
                            <div class="card-header">
                                <?php echo $item->pubDate ?>
                            </div>
                        <?php endif ?>
                        <div class="card-body">
                            <h4 class='card-title'>
                                <a class='card-link text-black' href="<?php echo $item->link ?>">
                                    <?php echo $item->title ?>
                                </a>
                            </h4>
                            <p><?php echo $item->description ?></p>
                            <a class='btn btn-secondary' href="<?php echo $item->link ?>" class="card-link">Read more</a>
                        </div>
                    </div>

                <?php
                endforeach;
            // If feed does not follow normal structure and 'Item' is located outside of 'Channel'
            else :

                foreach ($xml->item as $item) : ?>
                    <div class="card mb-4">
                        <?php if ($item->pubDate) : ?>
                            <div class="card-header">
                                <?php echo $item->pubDate ?>
                            </div>
                        <?php endif ?>
                        <div class="card-body">
                            <h4 class='card-title'>
                                <a class='card-link text-black' href="<?php echo $item->link ?>">
                                    <?php echo $item->title ?>
                                </a>
                            </h4>
                            <p><?php echo $item->description ?></p>
                            <a class='btn btn-secondary' href="<?php echo $item->link ?>" class="card-link">Read more</a>

                        </div>
                    </div>
<?php
                endforeach;
            endif;
        else :
            if (!$invalidurl) {
                echo '<h2 class="text-danger">No Feed Found</h2>';
            }
        endif;

        echo '</div>';
    }
}
