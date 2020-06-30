<?php
include  __DIR__ . '/../config/Database.php';

class FeedsController extends Database
{

    // Retrieve all feeds from the DB
    protected function getFeeds()
    {
        $sql = "SELECT * FROM feeds ORDER BY date DESC";
        $stmt = $this->connect()->query($sql);

        return $stmt;
    }

    // Retrieve single feed from the DB
    public function getFeed($id)
    {
        $sql = "SELECT * FROM feeds WHERE feeds.id = $id";
        $stmt = $this->connect()->query($sql);

        return $stmt;
    }

    // Add Feed to the DB *Prepared Statement Due to input*
    public function addFeed($url)
    {
        $sql = "INSERT INTO `feeds`(`feed_url`) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$url]);
    }

    // Delete a feed from the DB
    public function deleteFeed($id)
    {
        $sql = "DELETE FROM feeds WHERE feeds.id = $id";
        $stmt = $this->connect()->query($sql);

        return $stmt;
    }

    // Update feed details within the DB *Prepared Statement Due to input*
    public function updateFeed($id, $url)
    {
        $sql = "UPDATE feeds SET feed_url = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$url, $id]);
    }
}
