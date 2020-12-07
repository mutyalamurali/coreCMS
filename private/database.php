<?php

// Database values to PHP constants
define('DB_HOST', 'mysqldb');

define('DB_USER', 'root');

define('DB_PASSWORD', 'root');

define('DB_NAME', 'cms');

define('DB_PORT', 3306);

/**
 *  MySQL Database connection
 */
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/**
 *  checks database connection success or not
 */
if ($db->errno) {
    die('Database connection failed: ' . $db->error);
}
