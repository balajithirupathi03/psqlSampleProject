<?php

require_once 'Config/MysqlConnectionConfig.php';

class MysqlConnector
{
    public function getConnection()
    {
        $db_connection = pg_connect("host=localhost dbname=ecommerce user=postgres password=aspire@123");
        if (!$db_connection) {
            die('Could not connect: ' . pg_last_error($db_connection));exit;
        }
        //echo 'success';
        return $db_connection;
    }
}
