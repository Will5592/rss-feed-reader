<?php
// Load Header
include 'inc/header.php';
?>

<h1>About</h1>
<br>

<div class="info">
    <p><strong>Version:</strong> 1.0.0</p>

    <p>This small app allows you read and store RSS feeds.</p>
    <p>You can temporarily/quickly view RSS feeds on the homepage by entering an RSS URL into the form </p>

    <p><strong>OR</strong>
    </p>

    <p>You can save, view, update and delete (CRUD) RSS URLs via the <a href="/feeds.php">feeds</a> page</p>

    <p>Some example feeds that can be used to test the application are:</p>
    <ul>
        <li>https://www.php.net/news.rss</li>
        <li>https://www.aljazeera.com/xml/rss/all.xml</li>
        <li>https://www.nytimes.com/svc/collections/v1/publish/https://www.nytimes.com/section/world/rss.xml</li>
        <li>https://feeds.megaphone.fm/ADL9840290619</li>
        <li>http://feeds.bbci.co.uk/news/rss.xml?edition=uk</li>
        <li>http://rss.slashdot.org/Slashdot/slashdot</li>
    </ul>
</div>

<?php include 'inc/footer.php'; ?>