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

/**
 * Get all records from Table
 *
 * @param string $tblName
 * @return array
 */
function findAll($tblName)
{
    return findByQuery('SELECT * FROM ' . $tblName);
}

/**
 *  Get record from table by id
 *
 * @param string $tblName
 * @param int $id
 * @return array
 */
function findById($tblName, $id)
{
    global $db;

    $sql = 'SELECT * FROM ' . $tblName;
    $sql .= ' WHERE id = ? ';
    $sql .= ' LIMIT 1';

    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        die('Database query failed: ' . $stmt->error);
    } else {
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}
