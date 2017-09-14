<?php

class Database extends PDO
{
    protected static $instance;

    public static function getInstance($dsn = NULL, $dbname = NULL, $dbpass = NULL)
    {
        if (!self::$instance) {
            self::$instance = new Database($dsn, $dbname, $dbpass);
        }
        return self::$instance;
    }

    function __construct($dsn, $dbname, $dbpass)
    {
        parent::__construct($dsn, $dbname, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
