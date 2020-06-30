<?php

class Database
{

    private $serverName;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect()
    {
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->dbname = "rss_feeds";
        $this->charset = "utf8mb4";

        try {
            $dsn = 'mysql:host=' . $this->serverName . ';dbname=' . $this->dbname . ';charset=' . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed :" . $e->getMessage();
        }
    }
}
