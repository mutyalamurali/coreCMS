<?php
/*
 * File: init.php
 * Project: private
 * File Created: Monday, 7th December 2020 6:42:20 pm
 * Author: Murali Mutyala (murali@itsclue.com)
 * --------------------------------------------------------------
 * Last Modified: Monday, 7th December 2020 6:43:17 pm
 * Modified By: Murali Mutyala (murali@itsclue.com>)
 * ---------------------------------------------------------------
 * Copyright 2020 ITSCLUE Technology Solutions
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

/**
 * file paths to PHP constants
 */
define('DS', DIRECTORY_SEPARATOR);

define('PRIVATE_PATH', __DIR__);

define('PUBLIC_PATH', dirname(__DIR__));

define('SHARED_PATH', PRIVATE_PATH . DS . 'shared');

//root url to a PHP constant
define('WWW_ROOT', '');

/**
 *  Loads basic functions
 */
require_once 'functions.php';

/**
 *  Database connection file
 */
require_once 'database.php';
