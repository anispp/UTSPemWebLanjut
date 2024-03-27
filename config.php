<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'ecommerce_database';
    public $connection;

    // Menghubungkan ke database
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Koneksi ke database gagal: " . $this->connection->connect_error);
        }
    }

    // Mendapatkan koneksi ke database
    public function getConnection() {
        return $this->connection;
    }
}
?>