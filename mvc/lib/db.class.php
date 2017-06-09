<?php
class Db {
    protected $connection;

    public function __construct($host, $user, $password, $name) {
        $this->connection = new mysqli($host, $user, $password, $name);

        if(mysqli_connect_error()) {
            throw new Exception('Could not connect to DB.');
        }
    }

    public function query($sql) {
        if(! $this->connection) {
            return false;
        }

        $result = $this->connection->query($sql);
        if(mysqli_error($this->connection)) {
            throw new Exception(mysqli_error($this->connection));
        }
        // Boolean result
        if(is_bool($result)) {
            return $result;
        }
        // Return db rows
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function escape($str) {
        return mysqli_escape_string($this->connection, $str);
    }
}