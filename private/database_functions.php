<?php

/**
 *  check sql query and stop page loads
 *  if not results
 *
 * @return void
 */
function confirm_query()
{
    global $db;
    die('Database query failed: ' . $db->error);
}

/**
 *  Get results using sql query
 *
 * @param String $sql
 * @return Array or void
 */
function findByQuery($sql)
{
    global $db;

    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        confirm_query();
    } else {
        $stmt->execute();
        $result = $stmt->get_result();

        $result_arr = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $result_arr[] = $row;
            }
            return $result_arr;
        } else {
            die('No results found');
        }
    }
}
