<?php

/**
 * root path url
 *
 * @param String $path
 * @return String
 */
function url($path)
{
    // add leading '/' if not present
    if ($path[0] != '/') {
        $path = '/' . $path;
    }

    return WWW_ROOT . $path;
}

/**
 *  url redirection
 *
 * @param String $location
 * @return void
 */
function redirect($location)
{
    header('Location: ' . $location);
    exit;
}

/**
 *  urlencode function
 *  It uses after '?' in the url
 *
 * @param string $string
 * @return void
 */
function u($string = "")
{
    return urlencode($string);
}

/**
 *  rawurlencode function
 *  It uses before '?' in the url
 *
 * @param string $string
 * @return void
 */
function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}
