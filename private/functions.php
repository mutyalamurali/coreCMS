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
