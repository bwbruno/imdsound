<?php

namespace IMDSound\Database;

use PDO;

class ConnectionCreator
{

    public static function createConnection(): PDO
    {
        
        $host = $_ENV['CONNECTION_HOST'];
        $port = $_ENV['PORT_CONTAINER'];
        $db_name = $_ENV['DB_DATABASE'];

        $connection = new PDO(
            "mysql:host=$host;port=$port;dbname=$db_name",
            'imduser',
            'root'
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
