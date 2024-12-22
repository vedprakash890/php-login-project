<?php

namespace Lallu\DB;
use mysqli;

class DbConnect {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'lalu';
    public $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
